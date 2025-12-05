@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">📝 Gestion des Articles</h4>
                        @can('create-article')
                            <a href="{{ route('articles.create') }}" class="btn btn-primary">
                                ➕ Nouvel Article
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($articles->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titre</th>
                                            <th>Slug</th>
                                            <th>Auteur</th>
                                            <th>Vues</th>
                                            <th>Publié</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($articles as $article)
                                            <tr>
                                                <td>{{ $article->id }}</td>
                                                <td>{{ $article->title }}</td>
                                                <td><code>{{ $article->slug }}</code></td>
                                                <td>
                                                    @if($article->user_id)
                                                        <span class="badge bg-info">ID: {{ $article->user_id }}</span>
                                                    @else
                                                        <span class="badge bg-secondary">Non assigné</span>
                                                    @endif
                                                </td>
                                                <td>{{ $article->views ?? 0 }}</td>
                                                <td>
                                                    @if($article->published)
                                                        <span class="badge bg-success">✓ Publié</span>
                                                    @else
                                                        <span class="badge bg-warning">✗ Brouillon</span>
                                                    @endif
                                                </td>
                                                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('articles.edit', $article) }}"
                                                            class="btn btn-sm btn-warning">
                                                            ✏️ Éditer
                                                        </a>

                                                        @can('delete-article', $article)
                                                            <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                                                class="d-inline"
                                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    🗑️ Supprimer
                                                                </button>
                                                            </form>
                                                        @else
                                                            <button class="btn btn-sm btn-secondary" disabled
                                                                title="Vous ne pouvez pas supprimer cet article">
                                                                🔒 Supprimer
                                                            </button>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                {{ $articles->links() }}
                            </div>
                        @else
                            <div class="alert alert-info">
                                📭 Aucun article pour le moment.
                                @can('create-article')
                                    <a href="{{ route('articles.create') }}">Créer le premier article</a>
                                @endcan
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection