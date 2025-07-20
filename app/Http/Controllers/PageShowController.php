<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug)
    {
        $locale = App::getLocale();

        $page = Page::where("slug", $slug)->where('is_published', true)->firstOrFail();

        return view('shop.page', compact('page'));
    }
}
