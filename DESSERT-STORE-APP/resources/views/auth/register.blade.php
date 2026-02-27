@extends('layouts.auth')

@section('title','Register')
@section('auth_heading','Buat Akun 🍰')
@section('auth_desc','Mulai perjalanan manis kamu di Dessert Store.')

@section('content')
  <h2 class="form-title">Buat Akun</h2>
  <p class="form-sub">Lengkapi data untuk mendaftar.</p>

  @if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label fw-semibold">Nama</label>
      <input name="name" type="text" value="{{ old('name') }}" required
             class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Email</label>
      <input name="email" type="email" value="{{ old('email') }}" required
             class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Password</label>
      <input name="password" type="password" required
             class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Konfirmasi Password</label>
      <input name="password_confirmation" type="password" required
             class="form-control">
    </div>

    <button type="submit" class="btn btn-dark w-100">
      Register
    </button>

    <div class="text-center mt-3">
      <span class="text-muted">Sudah punya akun?</span>
      <a class="text-decoration-none fw-semibold" href="{{ route('login') }}">Login</a>
    </div>
  </form>
@endsection