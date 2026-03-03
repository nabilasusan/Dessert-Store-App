<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ config('app.name','Dessert Store') }} — Welcome</title>

  {{-- Bootstrap + Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root{
      --primary:#2563eb;      /* blue-600 */
      --primary2:#60a5fa;     /* blue-400 */
      --ink:#0b1220;          /* text strong */
      --muted:#475569;        /* slate-600 */
      --border:rgba(15,23,42,.10);
      --shadow: 0 28px 70px rgba(2,6,23,.16);
      --shadow2: 0 18px 45px rgba(2,6,23,.10);
    }

    body{
      min-height:100vh;
      background:
        radial-gradient(900px 520px at 15% 12%, rgba(37,99,235,.26), transparent 55%),
        radial-gradient(900px 520px at 85% 10%, rgba(96,165,250,.28), transparent 55%),
        linear-gradient(135deg,#eef2ff 0%, #f8fafc 45%, #ffffff 100%);
      color: var(--ink);
    }

    /* Navbar */
    .navbar-glass{
      background: rgba(255,255,255,.88) !important;
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(15,23,42,.08);
    }
    .brand-badge{
      width:40px;height:40px; display:grid; place-items:center;
      border-radius:14px;
      background: linear-gradient(135deg, var(--primary), var(--primary2));
      color:#fff;
      box-shadow: 0 14px 35px rgba(37,99,235,.28);
      font-size:18px;
    }

    /* Main shell */
    .shell{
      border-radius: 26px;
      background: rgba(255,255,255,.92);
      border: 1px solid rgba(15,23,42,.08);
      box-shadow: var(--shadow);
      overflow:hidden;
      position: relative;
    }
    .shell::before{
      content:"";
      position:absolute; inset:-2px;
      background: radial-gradient(900px 220px at 20% 0%, rgba(37,99,235,.22), transparent 55%),
                  radial-gradient(900px 220px at 80% 0%, rgba(96,165,250,.22), transparent 55%);
      pointer-events:none;
    }
    .shell > .inner{
      position:relative;
    }

    .top-accent{
      height:10px;
      background: linear-gradient(90deg, var(--primary), var(--primary2));
    }

    /* Typography */
    .kicker{
      display:inline-flex; gap:.5rem; align-items:center;
      font-weight:800;
      color: rgba(37,99,235,.95);
      background: rgba(37,99,235,.10);
      border: 1px solid rgba(37,99,235,.18);
      padding:.45rem .75rem;
      border-radius: 999px;
      font-size:.85rem;
    }
    .hero-title{
      font-weight:900;
      letter-spacing: -0.02em;
      color: var(--ink);
      line-height: 1.1;
    }
    .hero-sub{
      color: var(--muted);
      font-size: 1.05rem;
    }

    /* Chips */
    .chip{
      border-radius: 999px;
      border: 1px solid rgba(15,23,42,.10);
      background: rgba(255,255,255,.95);
      padding: .45rem .8rem;
      font-size: .85rem;
      font-weight: 700;
      color: rgba(15,23,42,.78);
      box-shadow: 0 10px 20px rgba(2,6,23,.06);
    }

    /* Search */
    .searchbox{
      border-radius: 18px;
      border: 1px solid rgba(15,23,42,.10);
      background: rgba(255,255,255,.96);
      box-shadow: var(--shadow2);
    }
    .searchbox .input-group-text{
      background: transparent;
      border: 0;
      color: rgba(15,23,42,.55);
    }
    .searchbox .form-control{
      border: 0;
      padding: .9rem .25rem;
      font-weight: 600;
      color: var(--ink);
    }
    .searchbox .form-control::placeholder{
      color: rgba(15,23,42,.45);
      font-weight: 600;
    }

    /* Buttons */
    .btn-primary{
      background: var(--primary);
      border-color: var(--primary);
      font-weight: 800;
      border-radius: 14px;
      padding: .75rem 1rem;
      box-shadow: 0 16px 30px rgba(37,99,235,.22);
    }
    .btn-primary:hover{ filter: brightness(.96); }
    .btn-outline-dark{
      border-radius: 14px;
      font-weight: 800;
      padding: .75rem 1rem;
    }
    .btn-light{
      border-radius: 14px;
      font-weight: 800;
      padding: .75rem 1rem;
    }

    /* Right card */
    .card-soft{
      border: 1px solid rgba(15,23,42,.10);
      border-radius: 20px;
      box-shadow: var(--shadow2);
      background: rgba(255,255,255,.96);
    }
    .card-title-strong{
      font-weight: 900;
      color: var(--ink);
    }
    .muted{
      color: var(--muted);
    }

    .hint{
      background: rgba(37,99,235,.10);
      border: 1px solid rgba(37,99,235,.18);
      color: rgba(15,23,42,.76);
      border-radius: 16px;
      box-shadow: 0 12px 25px rgba(2,6,23,.06);
    }

    /* Layout helper */
    .maxw{
      max-width: 980px;
      margin-inline: auto;
    }
  </style>
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-glass sticky-top">
    <div class="container py-2">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('welcome') }}">
        <span class="brand-badge">🍰</span>
        <span class="text-dark">{{ config('app.name','Dessert Store') }}</span>
      </a>

      <div class="ms-auto d-flex align-items-center gap-2">
        @auth
          <a href="{{ route('desserts.index') }}" class="btn btn-outline-dark">
            <i class="bi bi-grid me-1"></i> Buka App
          </a>
          <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button class="btn btn-dark rounded-4 fw-bold" type="submit">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}" class="btn btn-primary px-4">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
          </a>
          <a href="{{ route('register') }}" class="btn btn-outline-dark px-4">
            <i class="bi bi-person-plus me-1"></i> Register
          </a>
        @endauth
      </div>
    </div>
  </nav>

  <main class="container py-5">

    <div class="shell maxw mb-4">
      <div class="top-accent"></div>

      <div class="inner p-4 p-md-5">
        <div class="row g-4 align-items-center">
          <div class="col-lg-7">

            <div class="d-flex flex-wrap gap-2 mb-3">
              <span class="kicker"><i class="bi bi-stars"></i> Simple • Clean • Blue</span>
              <span class="chip"><i class="bi bi-shield-check me-1"></i> Aman</span>
              <span class="chip"><i class="bi bi-lightning-charge-fill me-1"></i> Cepat</span>
              <span class="chip"><i class="bi bi-heart-fill me-1"></i> Favorit</span>
            </div>

            <h1 class="hero-title display-5 mb-2">
              Cari dessert favoritmu <span style="color:rgba(37,99,235,.95);">lebih cepat</span> 🍮
            </h1>

            <p class="hero-sub mb-4">
              Masuk untuk menyimpan Favorites, atau langsung cari menu tanpa ribet.
            </p>

            {{-- Search --}}
            <form class="searchbox p-3" method="GET" action="{{ route('desserts.index') }}">
              <div class="row g-2 align-items-center">
                <div class="col-12 col-md">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="bi bi-search"></i>
                    </span>
                    <input
                      type="text"
                      name="q"
                      class="form-control"
                      placeholder="Cari: cupcake, pudding, cheesecake..."
                      aria-label="Cari dessert"
                    />
                  </div>
                </div>
                <div class="col-12 col-md-auto">
                  <button class="btn btn-primary w-100 px-4" type="submit">
                    Cari Menu
                  </button>
                </div>
              </div>
            </form>

            <div class="hint p-3 mt-3">
              <div class="small fw-semibold">
                <i class="bi bi-info-circle me-1"></i>
                Tips: setelah login, klik ❤️ untuk simpan dessert ke Favorites.
              </div>
            </div>

          </div>

          <div class="col-lg-5">
            <div class="card card-soft border-0">
              <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="card-title-strong">Akses Cepat</div>
                  <span class="badge text-bg-primary rounded-pill">NEW</span>
                </div>
                <div class="muted small mb-3">Masuk / daftar, atau langsung lihat semua menu.</div>

                <div class="d-grid gap-2">
                  @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">
                      <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark">
                      <i class="bi bi-person-plus me-1"></i> Register
                    </a>
                    <a href="{{ route('desserts.index') }}" class="btn btn-light border">
                      <i class="bi bi-menu-button-wide me-1"></i> Lihat Semua Dessert
                    </a>
                  @else
                    <a href="{{ route('desserts.index') }}" class="btn btn-primary">
                      <i class="bi bi-menu-button-wide me-1"></i> Lihat Dessert
                    </a>
                    <a href="{{ route('favorites.index') }}" class="btn btn-outline-dark">
                      <i class="bi bi-heart me-1"></i> Favorites
                    </a>
                  @endguest
                </div>

              </div>
            </div>

            <div class="mt-3 small muted">
              <i class="bi bi-lock me-1"></i> Login dibutuhkan untuk menyimpan Favorites.
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="text-center text-muted small mt-4">
      © {{ date('Y') }} {{ config('app.name','Dessert Store') }}
    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>