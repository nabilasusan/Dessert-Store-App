<!doctype html>
<html lang="id">
<head>
<style>
  .thumb{
    width:64px; height:48px; object-fit:cover;
    border-radius:10px; border:1px solid #e5e7eb;
    background:#f8fafc;
  }
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin') - {{ config('app.name','DessertApp') }}</title>

  {{-- Bootstrap + Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    body { background: #f6f7fb; }
    .card { border: 0; border-radius: 16px; }
    .table> :not(caption)>*>* { vertical-align: middle; }
    .thumb {
      width: 58px; height: 44px; object-fit: cover;
      border-radius: 12px; border: 1px solid #e9ecef;
      background: #fff;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">🍰 Admin Dessert</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAdmin">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navAdmin">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.desserts.*') ? 'active fw-semibold' : '' }}"
             href="{{ route('admin.desserts.index') }}">
            <i class="bi bi-cup-hot me-1"></i> Desserts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active fw-semibold' : '' }}"
             href="{{ route('admin.categories.index') }}">
            <i class="bi bi-tags me-1"></i> Categories
          </a>
        </li>
      </ul>

      <div class="d-flex align-items-center gap-2">
        <div class="text-end me-2 d-none d-md-block">
          <div class="fw-semibold small">{{ auth()->user()->name }}</div>
          <div class="text-muted small">{{ auth()->user()->email }}</div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-dark btn-sm px-3">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
      </div>
    </div>
  </div>
</nav>

<main class="container py-4">
  @if(session('success'))
    <div class="alert alert-success d-flex align-items-center">
      <i class="bi bi-check-circle-fill me-2"></i>
      <div>{{ session('success') }}</div>
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
      {{ $errors->first() }}
    </div>
  @endif

  @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>