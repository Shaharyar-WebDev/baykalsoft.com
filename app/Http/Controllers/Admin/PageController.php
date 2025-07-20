<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\ResponseCache\Facades\ResponseCache;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $locale = $request->input('locale', app()->getLocale());
            $search = $request->input('search');
            $perPage = $request->input('perPage', 10);
            $sortBy = $request->input('sortBy', 'created_at');
            $sortDir = $request->input('sortDir', 'desc');

            $sortableMap = [
                'title' => "JSON_UNQUOTE(JSON_EXTRACT(title, '$.\"{$locale}\"'))",
                'meta_title' => "JSON_UNQUOTE(JSON_EXTRACT(meta, '$.\"{$locale}\".title'))",
                'meta_description' => "JSON_UNQUOTE(JSON_EXTRACT(meta, '$.\"{$locale}\".description'))",
                'slug' => 'slug',
                'content' => "JSON_UNQUOTE(JSON_EXTRACT(content, '$.\"{$locale}\"'))",
                'status' => 'is_published',
                'created_at' => 'created_at',
            ];

            $query = Page::query()
                ->select(['id', 'slug', 'title', 'meta', 'is_published', 'content', 'created_at']);

            $statusSearch = null;

            $searchLower = strtolower($search);

            if (str_starts_with($searchLower, 'pub')) {
                $statusSearch = 1;
            }
            // Match "not", "not pub", etc.
            elseif (str_starts_with($searchLower, 'not')) {
                $statusSearch = 0;
            }

            if (!empty($search)) {
                $query->where(function ($q) use ($search, $locale, $statusSearch) {
                    $q->orWhere('slug', 'like', "%$search%")
                        ->orWhere('is_published', $statusSearch)
                        ->orWhereDate('created_at', 'like', "%$search%")
                        ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(title, '$.\"{$locale}\"')) LIKE ?", ["%$search%"])
                        ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(content, '$.\"{$locale}\"')) LIKE ?", ["%$search%"])
                        ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.\"{$locale}\".title')) LIKE ?", ["%$search%"])
                        ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.\"{$locale}\".description')) LIKE ?", ["%$search%"]);
                });
            }

            if (array_key_exists($sortBy, $sortableMap)) {
                $query->orderByRaw("{$sortableMap[$sortBy]} " . ($sortDir === 'desc' ? 'DESC' : 'ASC'));
            }

            $pages = $query->paginate($perPage);

            $pages->getCollection()->transform(function ($page) use ($locale) {
                return [
                    'id' => $page->id,
                    'slug' => $page->slug,
                    'title' => $page->getTranslation('title', $locale),
                    'content' => Str::limit(strip_tags($page->getTranslation('content', $locale)), 200),
                    'meta_title' => $page->getTranslation('meta', $locale)['title'] ?? '',
                    'meta_description' => $page->getTranslation('meta', $locale)['description'] ?? '',
                    'status' => $page->is_published ? __('table.pages.published') : __('table.pages.not_published'),
                    'created_at' => $page->created_at->format('Y-m-d'),
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Fetched Successfully',
                'data' => $pages,
            ], 200);
        }

        return view('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $this->validatePage($request);

        Page::create($data);


        session()->flash('response', [
            'status' => 'success',
            'message' => __('messages.created'),
        ]);

        return back();
    }

    private function validatePage(Request $request)
    {
        return $request->validate([
            'slug' => 'required',

            'title' => 'required|array',
            'title.en' => 'nullable|string|max:255',
            'title.tr' => 'nullable|string|max:255',
            'title.ur' => 'nullable|string|max:255',

            'content' => 'nullable|array',
            'content.en' => 'nullable|string',
            'content.tr' => 'nullable|string',
            'content.ur' => 'nullable|string',

            'meta' => 'nullable|array',
            'meta.en.title' => 'nullable|string|max:255',
            'meta.en.description' => 'nullable|string|max:500',
            'meta.tr.title' => 'nullable|string|max:255',
            'meta.tr.description' => 'nullable|string|max:500',
            'meta.ur.title' => 'nullable|string|max:255',
            'meta.ur.description' => 'nullable|string|max:500',

            'is_published' => 'nullable|boolean',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $data = $this->validatePage($request);

        $page = Page::findOrFail($id);
        $page->update($data);

        if($request->filled('is_published')){
            $page->is_published = true;
            $page->save();
        }else{
            $page->is_published = false;
            $page->save();
        }

        ResponseCache::clear();

        session()->flash('response', [
            'status' => 'success',
            'message' => __('messages.updated')
        ]);

        return redirect()->route('admin.pages.edit', $page->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
