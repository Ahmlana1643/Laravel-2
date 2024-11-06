<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Services\Frontend\CategoryService;

class HomeController extends Controller
{
    public function __construct
    (
        private CategoryService $categoryService
    ){}
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
            ->where('published', true)
            ->where('is_confirm', true)
            ->orderBy('views', 'desc')
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

        $popularArticles = Article::with('category:id,name')
        ->select('id', 'category_id', 'title', 'slug', 'image', 'views', 'is_confirm', 'published', 'published_at')
        ->orderBy('views', 'desc')
        ->where('published', true)
        ->where('is_confirm', true)
        ->limit(4)
        ->get();

        $latestArticles = Article::with('category:id,name','user:id,name')
        ->select('id', 'category_id', 'title', 'slug','user_id', 'published', 'is_confirm', 'views', 'image', 'published_at')
        ->orderBy('published_at', 'desc')
        ->where('published', true)
            ->where('is_confirm', true)
            ->limit(4)
            ->get();

        $categories = $this->categoryService->randomCategory();

        return view('frontend.home.index', [
            'main_post' => $main_post,
            'top_view' => $top_view,
            'main_post_all' => $main_post_all,
            'latestArticles' => $latestArticles,
            'categories' => $categories,
            'popularArticles' => $popularArticles
        ]);
    }
}
