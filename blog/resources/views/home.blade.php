@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @auth
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>Bienvenue, {{ Auth::user()->name }} !</h4>
                        <p>Vous êtes connecté(e) avec succès.</p>
                        
                        <hr>
                        
                        <h5>Navigation rapide :</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('articles.index') }}" class="text-decoration-none">📝 Voir les articles</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('about') }}" class="text-decoration-none">ℹ️ À Propos</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('contact') }}" class="text-decoration-none">📧 Contact</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="card-header">Accès Restreint</div>
                    <div class="card-body">
                        <p>Vous devez être connecté pour accéder à cette page.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection