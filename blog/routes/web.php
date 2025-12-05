<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => redirect()->route('articles.index'));
Route::resource('articles', ArticleController::class)->except(['show']);

// Routes statiques
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


//  http://localhost:8000/ping



// -----------------------

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PageController;
// use App\Http\Controllers\ArticleController;

// // Home
// Route::get('/', [PageController::class, 'home'])->name('home');

// // Static pages
// Route::get('/a-propos', [PageController::class, 'about'])->name('about');
// Route::get('/contact',  [PageController::class, 'contact'])->name('contact');

// // Articles
// Route::resource('articles', ArticleController::class)->parameters([
//     'articles' => 'slug'
// ]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');


Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/admin', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

//     // Exemple : route future pour gérer les articles en admin
//     // Route::get('/admin/articles', [ArticleAdminController::class, 'index'])
//     //     ->name('admin.articles.index');
// });