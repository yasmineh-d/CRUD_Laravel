<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;


class ArticleController extends Controller
{

    public function index(): View
    {
        $articles = Article::latest('id')->paginate(5);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        if (!Gate::allows('create-article')) {
            abort(403);
        }
        $data = $request->validated();
        $data['slug'] ??= Str::slug($data['title']);
        $data['user_id'] = auth()->id(); // Assigner l'utilisateur connecté
        Article::create($data);

        return redirect()->route('admin.articles.index')->with('status', '✅ Article créé avec succès.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $article->update($data);

        return redirect()->route('admin.articles.index')->with('status', '✏️ Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): redirectResponse
    {
        if (!Gate::allows('delete-article', $article)) {
            abort(403);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('status', '🗑️ Article supprimé avec succès.');
    }
}