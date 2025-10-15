@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">{{ $title }}</h1>

    <form class="w-75 mx-auto">
        <div class="mb-3">
            <label for="name" class="form-label">Nom complet</label>
            <input type="text" id="name" class="form-control" placeholder="Entrez votre nom">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" id="email" class="form-control" placeholder="exemple@email.com">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" class="form-control" rows="4" placeholder="Votre message..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
    </form>
</div>
@endsection
