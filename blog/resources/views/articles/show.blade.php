@extends('layouts.app')

@section('content')
    <div class="card">
        <h2>{{ $articles['title']}}</h2>
        <p><a href="{{ route('articles.index') }}">Retour à la liste</a></p>
        <ul>
            <li>Aiteur: {{ $articles['author'] }}</li>
            <li>Aiteur: <code>{{ $articles['slug'] }}</code></li>
            <li>Aiteur: {{ $articles['views'] }}</li>
        </ul>
</div>
@endsection
