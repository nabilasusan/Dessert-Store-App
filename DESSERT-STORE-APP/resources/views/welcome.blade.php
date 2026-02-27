<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ config('app.name','DessertApp') }} — Welcome</title>

  {{-- Bootstrap + Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root{
      --ds-primary:#ff3b6b;
      --ds-dark:#0f172a;
    }
    body{
      background: radial-gradient(1100px 480px at 12% 10%, rgba(255,59,107,.22), transparent 55%),
                  radial-gradient(900px 420px at 88% 12%, rgba(255,170,0,.18), transparent 55%),
                  linear-gradient(135deg,#fff7ed 0%, #fff1f2 35%, #ffffff 100%);
      min-height:100vh;
    }
    .navbar-glass{
      background: rgba(255,255,255,.78) !important;
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,.7);
    }
    .brand-badge{
      width:38px;height:38px; display:grid; place-items:center;
      border-radius:14px;
      background: linear-gradient(135deg, var(--ds-primary), #ff8a00);
      color:#fff;
      box-shadow: 0 10px 30px rgba(255,59,107,.18);
    }
    .hero{
      border-radius: 26px;
      background: rgba(255,255,255,.78);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,.85);
      box-shadow: 0 22px 60px rgba(15,23,42,.10);
      overflow:hidden;
    }
    .hero-grad{
      background: radial-gradient(700px 280px at 10% 10%, rgba(255,59,107,.25), transparent 55%),
                  radial-gradient(650px 260px at 90% 10%, rgba(255,138,0,.20), transparent 55%);
    }
    .btn-primary{
      background: var(--ds-primary);
      border-color: var(--ds-primary);
    }
    .btn-primary:hover{ filter: brightness(.95); }
    .pill{
      border-radius: 999px;
      border: 1px solid rgba(15,23,42,.08);
      background: rgba(255,255,255,.8);
    }
    .card-soft{
      border: 1px solid rgba(15,23,42,.06);
      border-radius: 20px;
      box-shadow: 0 16px 40px rgba(15,23,42,.06);
    }
    .badge-soft{
      background: rgba(255,59,107,.10);
      color: #b4233a;
      border: 1px solid rgba(255,59,107,.18);
    }
  </style>
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-glass sticky-top">
    <div class="container py-2">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('welcome') }}">
        <span class="brand-badge">🍰</span>
        <span>{{ config('app.name','DessertApp') }}</span>
      </a>

      <div class="ms-auto d-flex align-items-center gap-2">
        @auth
          <a href="{{ route('desserts.index') }}" class="btn btn-outline-dark rounded-4 fw-bold">
            <i class="bi bi-cup-straw me-1"></i> Masuk ke App
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-dark rounded-4 fw-bold" type="submit">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-4 fw-bold">
            Login
          </a>
          <a href="{{ route('register') }}" class="btn btn-primary rounded-4 fw-bold">
            Register
          </a>
        @endauth
      </div>
    </div>
  </nav>

  <main class="container py-5">

    {{-- HERO --}}
    <div class="hero hero-grad p-4 p-md-5 mb-4">
      <div class="row g-4 align-items-center">
        <div class="col-lg-7">
          <span class="badge badge-soft rounded-pill px-3 py-2 mb-3">
            <i class="bi bi-stars me-1"></i> Fresh & Tasty Desserts
          </span>

          <h1 class="display-5 fw-black mb-2">
            Selamat Datang di Dessert Store 🍮
          </h1>
          <p class="text-muted fs-5 mb-4">
            Temukan dessert favoritmu, simpan ke favorit, dan nikmati rasa manis setiap hari.
          </p>

          <div class="d-flex flex-wrap gap-2">
            <span class="pill px-3 py-2 small fw-semibold">
              <i class="bi bi-lightning-charge-fill text-primary me-1"></i> Cepat
            </span>
            <span class="pill px-3 py-2 small fw-semibold">
              <i class="bi bi-shield-check text-success me-1"></i> Aman
            </span>
            <span class="pill px-3 py-2 small fw-semibold">
              <i class="bi bi-heart-fill text-danger me-1"></i> Favorit
            </span>
          </div>

          @guest
            <div class="d-flex flex-wrap gap-2 mt-4">
              <a href="{{ route('login') }}" class="btn btn-primary rounded-4 fw-bold px-4">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
              </a>
              <a href="{{ route('register') }}" class="btn btn-outline-dark rounded-4 fw-bold px-4">
                <i class="bi bi-person-plus me-1"></i> Register
              </a>
              <a href="{{ route('desserts.index') }}" class="btn btn-light border rounded-4 fw-bold px-4">
                <i class="bi bi-search me-1"></i> Lihat Menu
              </a>
            </div>
          @endguest
        </div>

        <div class="col-lg-5">
          <div class="card card-soft border-0">
            <div class="card-body p-4">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="fw-black">Highlight</div>
                <span class="badge text-bg-light border rounded-pill">NEW</span>
              </div>
              <div class="text-muted small mb-3">
                Simple app untuk user & admin (CRUD + Favorites).
              </div>

              <div class="row g-3">
                <div class="col-6">
                  <div class="p-3 rounded-4 border bg-white">
                    <div class="fw-bold">Admin</div>
                    <div class="text-muted small">CRUD Dessert & Category</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="p-3 rounded-4 border bg-white">
                    <div class="fw-bold">User</div>
                    <div class="text-muted small">Explore & Favorites</div>
                  </div>
                </div>
              </div>

              <div class="alert alert-light border rounded-4 mt-3 mb-0">
                <div class="small">
                  <i class="bi bi-info-circle me-1"></i>
                  Tips: Login dulu untuk menyimpan dessert ke Favorites.
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- POPULAR / TERPOPULER --}}
    <div class="card card-soft border-0">
      <div class="card-body p-4 p-md-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div>
            <h4 class="fw-black mb-0">Dessert Terpopuler</h4>
            <div class="text-muted small">Rekomendasi pilihan yang sering disukai</div>
          </div>
          <a href="{{ route('desserts.index') }}" class="btn btn-outline-dark rounded-4 fw-bold">
            Lihat semua <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>

        {{-- Dummy highlight (boleh ganti pakai data dari DB nanti) --}}
        <div class="row g-3">
          @php
            $items = [
              ['Cupcake Strawberry','Lembut, manis, creamy.','🧁'],
              ['Caramel Pudding','Aroma karamel kuat.','🍮'],
              ['Donut Glaze','Renyal & legit.','🍩'],
              ['Cheesecake','Creamy & rich.','🍰'],
            ];
          @endphp

          @foreach($items as $it)
            <div class="col-12 col-md-6">
              <div class="p-4 rounded-4 border bg-white d-flex align-items-center justify-content-between">
                <div>
                  <div class="fw-black">{{ $it[0] }}</div>
                  <div class="text-muted small">{{ $it[1] }}</div>
                </div>
                <div class="fs-3">{{ $it[2] }}</div>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>

    <div class="text-center text-muted small mt-4">
      © {{ date('Y') }} {{ config('app.name','DessertApp') }} — Sweet & Simple 🍰
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>