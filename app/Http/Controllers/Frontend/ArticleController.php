<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show(string $slug)
    {
        // elequent
        $article = Article::with('category:id,name,slug', 'user:id,name', 'tags:id,name')
        ->where('slug', $slug)
        ->first();

        if (!$article) {
            return view('frontend.custom-error.404', [
                'url' => url('/article/' . $slug),
            ]);
        }

        return view('frontend.articles.show', [
            'article' => $article
        ]);
    }
}
