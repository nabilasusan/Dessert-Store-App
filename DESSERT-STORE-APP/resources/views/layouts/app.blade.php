<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ config('app.name','DessertApp') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-50 via-rose-50 to-orange-50 text-slate-800">
  <nav class="sticky top-0 z-30 bg-white/70 backdrop-blur border-b border-white">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="{{ route('desserts.index') }}" class="font-extrabold text-lg">
        🍰 DessertApp
      </a>

      <div class="flex items-center gap-3">
        <a class="text-sm font-semibold hover:text-rose-700" href="{{ route('desserts.index') }}">Desserts</a>
        <a class="text-sm font-semibold hover:text-rose-700" href="{{ route('favorites.index') }}">Favorites</a>

        @if(auth()->user()->isAdmin())
          <a class="text-sm font-semibold hover:text-rose-700" href="{{ route('categories.index') }}">Categories</a>
        @endif

        <span class="text-sm text-slate-600 hidden sm:inline">
          Hi, {{ auth()->user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="text-sm font-bold px-3 py-1.5 rounded-xl bg-slate-900 text-white hover:bg-slate-950">
            Logout
          </button>
        </form>
      </div>
    </div>
  </nav>

  <main class="max-w-7xl mx-auto px-4 py-6">
    @if(session('success'))
      <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 text-sm">
        {{ session('success') }}
      </div>
    @endif

    @yield('content')
  </main>
</body>
</html>