<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Article;

class PageController extends Controller
{
    private array $ARTICLES = [
        ['id'=>1,'title'=>'Intro Laravel','slug'=>'intro-laravel','views'=>120,'author'=>'Amina'],
        ['id'=>2,'title'=>'PHP 8 en pratique','slug'=>'php-8-en-pratique','views'=>300,'author'=>'Yassine'],
        ['id'=>3,'title'=>'Composer & Autoload','slug'=>'composer-autoload','views'=>90,'author'=>'Sara'],
    ];

    public function home(): View
    {
        return view('home', ['title' => 'Bienvenue sur le Blog Solicode']);
    }

    public function about(): View
    {
        return view('about', ['title' => 'À propos du projet']);
    }

    public function articles(): View
    {
        $articles = Article::paginate(10); // 10 articles par page
        return view('articles.index', [
            'articles' => $articles,
            'title'    => 'Tous les articles'
        ]);
    }

    public function show(string $slug): View
    {
        $article = collect($this->ARTICLES)->firstWhere('slug', $slug);
        abort_unless($article, 404);
        return view('articles.show', [
            'title'   => $article['title'],
            'article' => $article,
        ]);
    }
    public function contact(): \Illuminate\View\View
{
    return view('contact', [
        'title' => 'Contactez-nous'
    ]);
}

}
