{{-- resources/views/auth/reset-password.blade.php --}}
@extends('layouts.auth')

@section('content')
<div class="space-y-6">
  <div>
    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Reset Password</h2>
    <p class="text-sm text-slate-600 mt-1">Buat password baru ya 🍫</p>
  </div>

  @if ($errors->any())
    <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800 text-sm">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
    @csrf

    <input type="hidden" name="token" value="{{ request()->route('token') }}">

    <div>
      <label class="text-sm font-semibold text-slate-700">Email</label>
      <input name="email" type="email" value="{{ old('email', request('email')) }}" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200">
    </div>

    <div>
      <label class="text-sm font-semibold text-slate-700">Password Baru</label>
      <input name="password" type="password" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200">
    </div>

    <div>
      <label class="text-sm font-semibold text-slate-700">Konfirmasi Password</label>
      <input name="password_confirmation" type="password" required
        class="mt-1 w-full rounded-xl border-slate-200 focus:border-rose-400 focus:ring-rose-200">
    </div>

    <button type="submit"
      class="w-full rounded-xl bg-slate-900 hover:bg-slate-950 text-white font-bold py-3 shadow-sm">
      Simpan Password Baru
    </button>
  </form>
</div>
@endsection