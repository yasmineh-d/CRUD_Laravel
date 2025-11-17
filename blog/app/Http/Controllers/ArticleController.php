<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\RedirectResponse;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $articles = Article::latest('id')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] ??= Str::slug($data['title']);
        Article::create($data);

        return redirect()->route('articles.index')->with('status', '✅ Article créé avec succès.');
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $data= $request->validated();
        $data['slug']= $data['slug'] ?: Str::slug($data['title']);
        $article->update($data);

        return redirect()->route('articles.index')->with('status', '✏️ Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article):redirectResponse
    {
        $article->delete();
        return redirect()->route('articles.index')->with('status', '🗑️ Article supprimé avec succès.');
    }
}