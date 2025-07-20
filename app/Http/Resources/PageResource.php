<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $locale = $request->input('locale') ?? app()->getLocale();

        $collection = [
            'title' => $this->getTranslation('title', $locale),
            'slug'  => $this->slug,
            'content' => $this->getTranslation('content', $locale),
            'meta_title' => $this->getTranslation('meta', $locale)['title'] ?? '',
            'meta_desc' => $this->getTranslation('meta', $locale)['description'] ?? '',
            'is_published' => $this->is_published,
            'created_at' => $this->created_at?->toDateTimeString(),
        ];

        return [
            'current_page' => $this->currentPage(),
            'data' => $collection,
            'first_page_url' => $this->url(1),
            'from' => $this->firstItem(),
            'last_page' => $this->lastPage(),
            'last_page_url' => $this->url($this->lastPage()),
            'next_page_url' => $this->nextPageUrl(),
            'path' => $this->path(),
            'per_page' => $this->perPage(),
            'prev_page_url' => $this->previousPageUrl(),
            'to' => $this->lastItem(),
            'total' => $this->total(),
        ];
    }
}
