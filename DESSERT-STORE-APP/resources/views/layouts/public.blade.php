<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Dessert Store')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    body{
      background:
        radial-gradient(1200px 600px at 10% 10%, rgba(255,99,132,.14), transparent 60%),
        radial-gradient(1000px 600px at 90% 20%, rgba(255,159,64,.14), transparent 60%),
        #f8fafc;
    }
    .glass{
      background: rgba(255,255,255,.75);
      border: 1px solid rgba(255,255,255,.7);
      backdrop-filter: blur(10px);
      border-radius: 18px;
      box-shadow: 0 18px 40px rgba(15, 23, 42, .08);
    }
    .brand-badge{
      width: 34px; height: 34px;
      display:inline-flex; align-items:center; justify-content:center;
      border-radius: 12px;
      background: linear-gradient(135deg,#ff4d6d,#ff8a00);
      color:#fff;
      box-shadow: 0 14px 28px rgba(255,77,109,.22);
    }
    .card-dessert{
      border: 1px solid rgba(15,23,42,.06);
      border-radius: 18px;
      overflow:hidden;
      box-shadow: 0 14px 28px rgba(15, 23, 42, .06);
    }
    .card-dessert img{ height: 170px; object-fit: cover; }
  </style>

  @stack('head')
</head>
<body>
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container py-2">
      <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('welcome') }}">
        <span class="brand-badge"><i class="bi bi-cake2"></i></span>
        <span>DessertApp</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('desserts.index') }}">Desserts</a>
          </li>

          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('favorites.index') }}">Favorites</a>
            </li>

            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-dark btn-sm">
                  <i class="bi bi-box-arrow-right me-1"></i>Logout
                </button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="btn btn-outline-dark btn-sm" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-danger btn-sm" href="{{ route('register') }}">Register</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-4">
    @if(session('success'))
      <div class="alert alert-success glass">{{ session('success') }}</div>
    @endif
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>