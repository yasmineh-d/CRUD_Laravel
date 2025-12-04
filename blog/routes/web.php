<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Route test
Route::get('/ping', fn() => 'pong');

// Routes nommées avec contrôleur
Route::get('/', [PageController::class, 'home'])->name('welcome');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');

// Mini-routes articles (mockées pour l’instant)
Route::get('/articles', [PageController::class, 'articles'])->name('articles.index');
Route::get('/articles/{slug}', [PageController::class, 'show'])->name('articles.show');

// Nouvelle route contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');


Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');


