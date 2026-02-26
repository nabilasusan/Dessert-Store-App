@extends('layouts.auth')

@section('title','Login')
@section('auth_heading','Selamat datang lagi 👋')
@section('auth_desc','Masuk untuk lanjut kelola dessert kamu.')

@section('content')
  <h2 class="form-title">Masuk</h2>
  <p class="form-sub">Gunakan email & password yang sudah terdaftar.</p>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label fw-semibold">Email</label>
      <input type="email"
             name="email"
             value="{{ old('email') }}"
             class="form-control @error('email') is-invalid @enderror"
             placeholder="you@example.com"
             required autofocus>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Password</label>
      <div class="input-group">
        <input id="passwordInput"
               type="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="••••••••"
               required>
        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
          <i class="bi bi-eye"></i>
        </button>
      </div>
      @error('password')
        <div class="text-danger small mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="d-flex align-items-center justify-content-between mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>

      @if (Route::has('password.request'))
        <a class="text-decoration-none" href="{{ route('password.request') }}">Lupa password?</a>
      @endif
    </div>

    <button type="submit" class="btn btn-primary w-100">
      <i class="bi bi-box-arrow-in-right me-1"></i> Login
    </button>

    <div class="text-center mt-3">
      <span class="text-muted">Belum punya akun?</span>
      <a class="text-decoration-none fw-semibold" href="{{ route('register') }}">Daftar</a>
    </div>
  </form>

  <script>
    const btn = document.getElementById('togglePassword');
    const input = document.getElementById('passwordInput');
    btn?.addEventListener('click', () => {
      const isPass = input.type === 'password';
      input.type = isPass ? 'text' : 'password';
      btn.innerHTML = isPass ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
    });
  </script>
@endsection