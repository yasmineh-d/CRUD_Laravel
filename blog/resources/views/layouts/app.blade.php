<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>{{ $title ?? config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    body{
      font-family:system-ui, -apple-system, Segoe UI, Roboto, Ubuntu;
      max-width:760px;
      margin:32px auto;
      padding:0 16px;
    }
    nav a{
      margin-right:12px;
      text-decoration:none;
    }
    .active{
      font-weight:700;
      text-decoration:underline;
    }
    .card{
      padding:16px;
      border:1px solid #eee;
      border-radius:12px;
      margin-bottom:16px;
    }
  </style>
</head>

<body>
  <main style="max-width:760px;margin:2rem auto;padding:1rem;">

    {{-- Message de succès --}}
    @if (session('status'))
      <div style="padding:.75rem;background:#e6ffed;border:1px solid #86efac;margin-bottom:1rem;">
        {{ session('status') }}
      </div>
    @endif

    {{-- Erreurs globales --}}
    @if ($errors->any())
      <div style="padding:.75rem;background:#ffe6e6;border:1px solid #f87171;margin-bottom:1rem;">
        <strong>Veuillez corriger les erreurs suivantes :</strong>
        <ul style="margin:.5rem 0 0 1rem;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </main>
</body>
</html>
