{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.auth')

@section('content')
<div class="space-y-6">
  <div>
    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Buat Akun</h2>
    <p class="text-sm text-slate-600 mt-1">Mulai perjalanan manis kamu 🍰</p>
  </div>

  @if ($errors->any())
    <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800 text-sm">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}" class="space-y-5">
    @csrf

    <div>
      <label class="text-sm font-semibold text-slate-700">Nama</label>
      <input name="name" type="text" value="{{ old('name') }}" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200"
        placeholder="Nama kamu">
    </div>

    <div>
      <label class="text-sm font-semibold text-slate-700">Email</label>
      <input name="email" type="email" value="{{ old('email') }}" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200"
        placeholder="you@example.com">
    </div>

    <div>
      <label class="text-sm font-semibold text-slate-700">Password</label>
      <input name="password" type="password" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200"
        placeholder="Minimal 8 karakter">
    </div>

    <div>
      <label class="text-sm font-semibold text-slate-700">Konfirmasi Password</label>
      <input name="password_confirmation" type="password" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200"
        placeholder="Ulangi password">
    </div>

    <button type="submit"
      class="w-full rounded-xl bg-slate-900 hover:bg-slate-950 text-white font-bold py-3 shadow-sm">
      Register
    </button>

    <p class="text-sm text-slate-600 text-center">
      Sudah punya akun?
      <a href="{{ route('login') }}" class="font-semibold text-slate-900 hover:text-rose-700">Login</a>
    </p>
  </form>
</div>
@endsection