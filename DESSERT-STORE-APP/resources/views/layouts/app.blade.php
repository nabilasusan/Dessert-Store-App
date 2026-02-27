<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', config('app.name','DessertApp'))</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen text-slate-800">
  {{-- Background --}}
  <div class="fixed inset-0 -z-10 bg-gradient-to-br from-amber-50 via-rose-50 to-orange-50"></div>
  <div class="fixed inset-0 -z-10 opacity-[0.35]"
       style="background-image: radial-gradient(circle at 1px 1px, rgba(15,23,42,.12) 1px, transparent 0);
              background-size: 22px 22px;"></div>

  {{-- Navbar --}}
  <nav class="sticky top-0 z-40 border-b border-white/60 bg-white/70 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        {{-- Brand --}}
        <a href="{{ route('desserts.index') }}" class="flex items-center gap-2 font-extrabold tracking-tight">
          <span class="grid h-9 w-9 place-items-center rounded-xl bg-gradient-to-br from-rose-500 to-orange-400 text-white shadow-sm">
            🍰
          </span>
          <span class="text-lg">{{ config('app.name','DessertApp') }}</span>
        </a>

        {{-- Menu --}}
        <div class="flex items-center gap-2 sm:gap-3">
          <a href="{{ route('desserts.index') }}"
             class="rounded-xl px-3 py-2 text-sm font-semibold hover:bg-white/70 hover:text-rose-700">
            Desserts
          </a>

          <a href="{{ route('favorites.index') }}"
             class="rounded-xl px-3 py-2 text-sm font-semibold hover:bg-white/70 hover:text-rose-700">
            Favorites
          </a>

          {{-- Profile (simple dropdown without JS) --}}
          <div class="relative">
            <details class="group">
              <summary class="list-none cursor-pointer rounded-xl px-3 py-2 hover:bg-white/70">
                <div class="flex items-center gap-2">
                  <div class="h-9 w-9 rounded-full bg-slate-900 text-white grid place-items-center text-sm font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                  </div>
                  <div class="hidden sm:block leading-tight">
                    <div class="text-sm font-semibold">Hi, {{ auth()->user()->name }}</div>
                    <div class="text-xs text-slate-500">{{ auth()->user()->email ?? '' }}</div>
                  </div>
                  <svg class="ml-1 hidden sm:block h-4 w-4 text-slate-500 group-open:rotate-180 transition"
                       viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
                  </svg>
                </div>
              </summary>

              <div class="absolute right-0 mt-2 w-56 overflow-hidden rounded-2xl border border-white/60 bg-white/90 backdrop-blur shadow-lg">
                <div class="px-4 py-3">
                  <div class="text-sm font-semibold">{{ auth()->user()->name }}</div>
                  <div class="text-xs text-slate-500 truncate">{{ auth()->user()->email ?? '' }}</div>
                </div>
                <div class="h-px bg-red-200/60"></div>

                <form method="POST" action="{{ route('logout') }}" class="p-2">
                  @csrf
                  <button type="submit"
                          class="w-full rounded-xl bg-slate-900 px-3 py-2 text-sm font-bold text-white hover:bg-slate-950">
                    Logout
                  </button>
                </form>
              </div>
            </details>
          </div>
        </div>
      </div>
    </div>
  </nav>

  {{-- Header / Hero mini --}}
  <header class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-8">
    <div class="overflow-hidden rounded-3xl border border-white/60 bg-white/60 backdrop-blur shadow-sm">
      <div class="p-6 sm:p-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
          <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900">
              Temukan dessert favoritmu 🍮
            </h1>
            <p class="mt-1 text-sm sm:text-base text-slate-600">
              Jelajahi menu manis, simpan ke favorit, dan nikmati rekomendasi setiap hari.
            </p>
          </div>

          {{-- Slot search/filter (optional) --}}
          @hasSection('topbar')
            <div class="w-full sm:w-[420px]">
              @yield('topbar')
            </div>
          @else
            <div class="w-full sm:w-[420px]">
              <div class="rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 text-sm text-slate-600">
                Tips: klik ❤️ untuk simpan dessert ke Favorites.
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </header>

  {{-- Main --}}
  <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
    @if(session('success'))
      <div class="mb-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 text-sm">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div class="mb-4 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800 text-sm">
        {{ $errors->first() }}
      </div>
    @endif

    {{-- Content container --}}
    <div class="rounded-3xl border border-white/60 bg-white/60 backdrop-blur shadow-sm p-5 sm:p-6">
      @yield('content')
    </div>
  </main>

  <footer class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-10">
    <div class="text-center text-xs text-slate-500">
      © {{ date('Y') }} {{ config('app.name','DessertApp') }} — dibuat dengan ❤️
    </div>
  </footer>
</body>
</html>