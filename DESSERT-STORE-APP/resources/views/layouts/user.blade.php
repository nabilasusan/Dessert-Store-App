<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', config('DessertApp'))</title>

  {{-- Bootstrap + Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root{
      --ds-primary:#ff3b6b;
      --ds-dark:#0f172a;
    }
    body{
      background: radial-gradient(1200px 500px at 15% 5%, rgba(255,59,107,.20), transparent 55%),
                  radial-gradient(900px 450px at 85% 15%, rgba(255,170,0,.15), transparent 55%),
                  linear-gradient(135deg,#fff7ed 0%, #fff1f2 35%, #fff 100%);
      min-height:100vh;
    }
    .navbar-glass{
      background: rgba(255,255,255,.75) !important;
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,.7);
    }
    .brand-badge{
      width:38px;height:38px;
      display:grid;place-items:center;
      border-radius:14px;
      background: linear-gradient(135deg, var(--ds-primary), #ff8a00);
      color:#fff;
      box-shadow: 0 10px 30px rgba(255,59,107,.18);
    }
    .hero-card{
      border: 1px solid rgba(255,255,255,.85);
      background: rgba(255,255,255,.78);
      backdrop-filter: blur(10px);
      border-radius: 22px;
      box-shadow: 0 20px 50px rgba(15,23,42,.08);
    }
    .content-card{
      border: 1px solid rgba(255,255,255,.85);
      background: rgba(255,255,255,.78);
      backdrop-filter: blur(10px);
      border-radius: 22px;
      box-shadow: 0 20px 50px rgba(15,23,42,.06);
    }
    .btn-primary{
      background: var(--ds-primary);
      border-color: var(--ds-primary);
    }
    .btn-primary:hover{ filter: brightness(.95); }
    .nav-pill{
      border-radius: 14px;
      font-weight: 700;
    }
    .nav-pill.active{
      background: var(--ds-primary) !important;
      color:#fff !important;
      box-shadow: 0 12px 30px rgba(255,59,107,.18);
    }
    .dropdown-menu{
      border-radius: 16px;
      border: 1px solid rgba(15,23,42,.08);
      box-shadow: 0 20px 50px rgba(15,23,42,.12);
    }
    .avatar{
      width:38px;height:38px;border-radius:50%;
      display:grid;place-items:center;
      background: var(--ds-dark);
      color:#fff;font-weight:800;
    }
  </style>
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-glass sticky-top">
    <div class="container py-2">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-extrabold" href="{{ route('desserts.index') }}">
        <span class="brand-badge">🍰</span>
        <span class="fw-bold">{{ config('app.name','DessertApp') }}</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navUser">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navUser">
        @php
          $isDesserts = request()->routeIs('desserts.*');
          $isFav = request()->routeIs('favorites.*');
        @endphp

        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
          <li class="nav-item">
            <a class="nav-link px-3 py-2 nav-pill {{ $isDesserts ? 'active text-white' : '' }}"
               href="{{ route('desserts.index') }}">
              <i class="bi bi-cup-straw me-1"></i> Desserts
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link px-3 py-2 nav-pill {{ $isFav ? 'active text-white' : '' }}"
               href="{{ route('favorites.index') }}">
              <i class="bi bi-heart-fill me-1"></i> Favorites
            </a>
          </li>

          {{-- Dropdown profile --}}
          <li class="nav-item dropdown ms-lg-2">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 px-2"
               href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span>
              <span class="d-none d-lg-inline">
                <div class="fw-bold lh-1">{{ auth()->user()->name }}</div>
                <div class="text-muted small lh-1">{{ auth()->user()->email ?? '' }}</div>
              </span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end p-2">
              <li class="px-2 pb-2">
                <div class="small text-muted">Login sebagai</div>
                <div class="fw-bold">{{ auth()->user()->name }}</div>
              </li>
              <li><hr class="dropdown-divider"></li>

              <li>
                {{-- ✅ tombol logout JELAS --}}
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-dark w-100 fw-bold rounded-3" type="submit">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="container py-4">
    {{-- Alert --}}
    @if(session('success'))
      <div class="alert alert-success border-0 rounded-4 shadow-sm">
        {{ session('success') }}
      </div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger border-0 rounded-4 shadow-sm">
        {{ $errors->first() }}
      </div>
    @endif

    {{-- Hero --}}
    <div class="hero-card p-4 p-md-5 mb-4">
      <div class="row g-4 align-items-center">
        <div class="col-lg-7">
          <h1 class="display-6 fw-black mb-2">Temukan dessert favoritmu 🍮</h1>
          <p class="text-muted mb-3">
            Jelajahi menu manis, simpan ke favorit, dan nikmati rekomendasi tiap hari.
          </p>

          <div class="d-flex flex-wrap gap-2">
            <span class="badge text-bg-light border rounded-pill px-3 py-2">
              <i class="bi bi-heart-fill text-danger me-1"></i> Simpan Favorit
            </span>
            <span class="badge text-bg-light border rounded-pill px-3 py-2">
              <i class="bi bi-star-fill text-warning me-1"></i> Pilih Best
            </span>
            <span class="badge text-bg-light border rounded-pill px-3 py-2">
              <i class="bi bi-lightning-fill text-primary me-1"></i> Cepat
            </span>
          </div>
        </div>

        <div class="col-lg-5">
          @hasSection('topbar')
            @yield('topbar')
          @else
            <div class="p-3 rounded-4 border bg-white">
              <div class="fw-bold mb-1">Tips</div>
              <div class="text-muted small">
                Klik ❤️ di detail dessert untuk menyimpan ke Favorites.
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    {{-- Content --}}
    <div class="content-card p-3 p-md-4">
      @yield('content')
    </div>

    <div class="text-center text-muted small mt-4">
      © {{ date('Y') }} {{ config('app.name','DessertApp') }} — dibuat dengan <span class="text-danger">❤</span>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>