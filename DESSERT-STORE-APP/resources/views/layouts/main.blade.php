<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title','Dessert Store')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-rose-50 via-white to-orange-50 text-slate-800">

  <!-- Navbar -->
  <nav class="sticky top-0 z-50 bg-white/70 backdrop-blur border-b border-white">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
      <a href="{{ route('landing') }}" class="flex items-center gap-2 font-extrabold tracking-tight text-slate-900">
        <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-rose-500 to-orange-400 text-white shadow">
          🍰
        </span>
        <span>DessertApp</span>
      </a>

      <div class="flex items-center gap-2 sm:gap-3">
        <a href="{{ route('desserts.index') }}"
           class="hidden sm:inline-flex px-3 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">
          Desserts
        </a>

        @auth
          <a href="{{ route('dashboard') }}"
             class="px-3 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">
            Dashboard
          </a>

          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button class="px-3 py-2 rounded-xl text-sm font-semibold text-rose-600 hover:bg-rose-50">
              Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}"
             class="px-3 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">
            Login
          </a>
          <a href="{{ route('register') }}"
             class="px-4 py-2 rounded-xl text-sm font-bold text-white shadow bg-gradient-to-r from-rose-500 to-orange-400 hover:opacity-95">
            Register
          </a>
        @endauth
      </div>
    </div>
  </nav>

  <!-- Content -->
  <main class="max-w-6xl mx-auto px-4">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="max-w-6xl mx-auto px-4 py-10 text-center text-sm text-slate-500">
    © {{ date('Y') }} DessertApp • Sweet & Simple 🍮
  </footer>

</body>
</html>