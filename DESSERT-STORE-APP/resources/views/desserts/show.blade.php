@extends('layouts.app')

@section('content')
<div class="flex items-start justify-between gap-4 flex-col sm:flex-row">
  <div>
    <h1 class="text-2xl font-extrabold">{{ $dessert->name }}</h1>
    <p class="text-sm text-slate-600">{{ $dessert->category->name }} • oleh {{ $dessert->user->name }}</p>
  </div>

  <div class="flex gap-2">
    <form method="POST" action="{{ route('favorites.toggle', $dessert) }}">
      @csrf
      <button class="px-4 py-2 rounded-xl bg-amber-500 text-white font-bold hover:bg-amber-600">
        ⭐ Favorite
      </button>
    </form>

    @can('update', $dessert)
      <a href="{{ route('desserts.edit',$dessert) }}" class="px-4 py-2 rounded-xl bg-slate-900 text-white font-bold hover:bg-slate-950">
        Edit
      </a>
    @endcan

    @can('delete', $dessert)
      <form method="POST" action="{{ route('desserts.destroy',$dessert) }}" onsubmit="return confirm('Hapus dessert ini?')">
        @csrf @method('DELETE')
        <button class="px-4 py-2 rounded-xl bg-rose-600 text-white font-bold hover:bg-rose-700">
          Hapus
        </button>
      </form>
    @endcan
  </div>
</div>

<div class="mt-6 grid lg:grid-cols-2 gap-6">
  <div class="rounded-2xl overflow-hidden bg-white/80 border border-white shadow-sm">
    <div class="aspect-[16/10] bg-amber-100">
      @if($dessert->image_path)
        <img src="{{ asset('storage/'.$dessert->image_path) }}" class="w-full h-full object-cover">
      @else
        <div class="w-full h-full flex items-center justify-center text-slate-600 font-bold">No Image</div>
      @endif
    </div>
    <div class="p-5">
      <p class="text-slate-700">{{ $dessert->description }}</p>

      <div class="mt-4 flex flex-wrap gap-2 text-sm">
        <span class="px-3 py-1 rounded-full bg-rose-100 text-rose-800 font-semibold">⏱ {{ $dessert->prep_minutes }} menit</span>
        @if(!is_null($dessert->price))
          <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-900 font-semibold">Rp{{ number_format($dessert->price,0,',','.') }}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="space-y-4">
    <div class="rounded-2xl bg-white/80 border border-white shadow-sm p-5">
      <h3 class="font-extrabold text-lg">Bahan</h3>
      <pre class="mt-2 whitespace-pre-wrap text-sm text-slate-700">{{ $dessert->ingredients }}</pre>
    </div>

    <div class="rounded-2xl bg-white/80 border border-white shadow-sm p-5">
      <h3 class="font-extrabold text-lg">Langkah</h3>
      <pre class="mt-2 whitespace-pre-wrap text-sm text-slate-700">{{ $dessert->steps }}</pre>
    </div>
  </div>
</div>
@endsection