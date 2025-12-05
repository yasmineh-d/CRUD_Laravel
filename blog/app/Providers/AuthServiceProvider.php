<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Article;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Gate::define('create-article', function ($user) {
        // Auteur = is_admin = false → peut créer
        // Admin  = is_admin = true  → ne peut pas créer
        return $user->is_admin === false;
       });

       Gate::define('delete-article', function ($user, Article $article) {
        // Admin → peut tout supprimer
         if ($user->is_admin) {
          return true;
         }
        // Auteur → peut supprimer seulement ses propres articles
         return $article->user_id === $user->id;
        });

    }
}