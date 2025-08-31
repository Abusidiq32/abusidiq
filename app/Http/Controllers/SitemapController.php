<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [];

        // Static pages
        $urls[] = ['loc' => URL::to('/'), 'lastmod' => now()];
        $urls[] = ['loc' => route('blog'), 'lastmod' => now()];

        // Blog categories
        foreach (BlogCategory::all() as $cat) {
            $urls[] = ['loc' => route('blog.category', $cat->slug), 'lastmod' => $cat->updated_at ?? now()];
        }

        // Blog posts (published only)
        foreach (Blog::where('status','published')->latest()->get() as $post) {
            $urls[] = ['loc' => route('blog.details', $post->slug), 'lastmod' => $post->updated_at ?? $post->created_at];
        }

        $xml = view('sitemap', compact('urls'))->render();
        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
