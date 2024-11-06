<?php

namespace App\Http\Services\Frontend;

use App\Models\Article;

class ArticleService
{
    public function getFirstBy(string $column, string $value, bool $relation = false)
    {
        if ($relation == true) {
            // elequent
            $article = Article::with('category:id,name,slug', 'user:id,name', 'tags:id,slug,name')
            ->where($column, $value)
            ->first();
        }else{
            $article = Article::where($column, $value)->first();
        }

        return $article;
    }

    public function all()
    {
        $article = Article::with('category:id,name,slug', 'user:id,name')
        ->select(['id', 'title', 'slug', 'category_id', 'user_id', 'published', 'is_confirm', 'published_at', 'views', 'image'])
        ->where('published', true)
        ->where('is_confirm', true)
        ->simplePaginate(6);

        return $article;
    }

    public function search(string $keyword)
    {
        $article = Article::with('category:id,name,slug', 'user:id,name')
        ->select(['id', 'title', 'slug', 'category_id', 'user_id', 'published', 'is_confirm', 'published_at', 'views', 'image'])
        ->where('published', true)
        ->where('is_confirm', true)
        ->where('title', 'like', '%' . $keyword . '%')
        ->simplePaginate(6);

        return $article;
    }

    public function showByCategory(string $category)
    {
        $articles = Article::with('category:id,name,slug', 'user:id,name')
        ->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        })
        ->where('published', true)
        ->where('is_confirm', true)
        ->latest()
        ->paginate(6);

        return $articles;
    }

    public function showByTag(string $tag)
    {
        $articles = Article::with('tags:id,name,slug', 'user:id,name')
        ->whereHas('tags', function ($query) use ($tag) {
            $query->where('slug', $tag);
        })
        ->where('published', true)
        ->where('is_confirm', true)
        ->latest()
        ->paginate(6);

        return $articles;
    }

    public function relatedArticle(string $slug)
    {
        // elequent
        $article = Article::where('slug', $slug)->firstOrFail();

        $related_article = Article::where('published', true)
        ->where('is_confirm', true)
        ->where('id', '!=', $article->id)
        ->where('category_id', $article->category_id)
        ->limit(2)
        ->get(['id', 'title', 'slug', 'image', 'published_at']);

        return $related_article;
    }

    public function popularArticles()
    {
        // article terpopuler
        $articles = Article::with('category:id,name')
        ->select('id', 'category_id', 'title', 'slug', 'image', 'views', 'is_confirm', 'published', 'published_at')
        ->orderBy('views', 'desc')
        ->where('published', true)
        ->where('is_confirm', true)
        ->limit(4)
        ->get();

        return $articles;
    }
}
