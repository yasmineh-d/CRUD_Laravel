<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function store(StoreArticleRequest $request) //création d’un article
    {
        $article = Article::create($request->validated());

        return redirect()
            ->route('articles.edit', $article)
            ->with('success', 'Article créé avec succès.');
    }

    public function update(UpdateArticleRequest $request, Article $article)//mise à jour d’un article
    {
        $article->update($request->validated());

        return redirect()
            ->route('articles.edit', $article)
            ->with('success', 'Article mis à jour.');
    }
}
