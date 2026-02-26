{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.auth')

@section('content')
<div class="space-y-6">
  <div>
    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Lupa Password</h2>
    <p class="text-sm text-slate-600 mt-1">
      Masukkan email, nanti kami kirim link reset password 🍬
    </p>
  </div>

  @if (session('status'))
    <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 text-sm">
      {{ session('status') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800 text-sm">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
    @csrf

    <div>
      <label class="text-sm font-semibold text-slate-700">Email</label>
      <input name="email" type="email" value="{{ old('email') }}" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200"
        placeholder="you@example.com">
    </div>

    <button type="submit"
      class="w-full rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-bold py-3 shadow-sm">
      Kirim Link Reset
    </button>

    <p class="text-sm text-slate-600 text-center">
      Ingat password?
      <a href="{{ route('login') }}" class="font-semibold text-slate-900 hover:text-rose-700">Kembali login</a>
    </p>
  </form>
</div>
@endsection
