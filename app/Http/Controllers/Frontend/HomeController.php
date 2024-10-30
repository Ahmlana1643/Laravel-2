<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // article terbaru
        $main_post = Article::with('category:id,name', 'user:id,name')
        ->select('id', 'user_id', 'category_id', 'title', 'slug', 'content', 'image', 'views', 'is_confirm', 'published')
        ->latest()
        ->where('published', true)
        ->where('is_confirm', true)
        ->first();

        // article terpopuler
        $top_view = Article::with('category:id,name', 'tags:id,name')
        ->select('id', 'category_id', 'title', 'slug', 'content', 'image', 'views', 'is_confirm', 'published')
        ->orderBy('views', 'asc')
        ->where('published', true)
        ->where('is_confirm', true)
        ->first();

        // article terbaru semua category
        $main_post_all = Article::with('category:id,name')
        ->select('id', 'category_id', 'title', 'slug', 'image', 'views', 'is_confirm', 'published')
        ->latest()
        ->where('published', true)
        ->where('is_confirm', true)
        ->where('id', '!=', $main_post->id)
        ->limit(6) //membatasi
        // ->take(6) //mengambil
        ->get();

        return view('frontend.home.index', [
            'main_post' => $main_post,
            'top_view' => $top_view,
            'main_post_all' => $main_post_all
        ]);
    }
}
