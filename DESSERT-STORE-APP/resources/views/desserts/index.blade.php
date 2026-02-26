@extends('layouts.app')

@section('content')
<div class="flex items-start justify-between gap-4 flex-col sm:flex-row">
  <div>
    <h1 class="text-2xl font-extrabold">Daftar Dessert 🍮</h1>
    <p class="text-sm text-slate-600">Cari dan kelola dessert favorit kamu.</p>
  </div>

  <a href="{{ route('desserts.create') }}"
     class="px-4 py-2 rounded-xl bg-rose-600 text-white font-bold hover:bg-rose-700">
    + Tambah Dessert
  </a>
</div>

<form class="mt-5 grid sm:grid-cols-3 gap-3">
  <input name="search" value="{{ request('search') }}" placeholder="Cari dessert..."
         class="rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400" />

  <select name="category" class="rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400">
    <option value="">Semua kategori</option>
    @foreach($categories as $c)
      <option value="{{ $c->slug }}" @selected(request('category')===$c->slug)>{{ $c->name }}</option>
    @endforeach
  </select>

  <button class="rounded-xl bg-slate-900 text-white font-bold hover:bg-slate-950">
    Filter
  </button>
</form>

<div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
  @forelse($desserts as $d)
    <a href="{{ route('desserts.show',$d) }}" class="rounded-2xl bg-white/80 border border-white shadow-sm overflow-hidden hover:shadow-md transition">
      <div class="aspect-[16/10] bg-amber-100">
        @if($d->image_path)
          <img src="{{ asset('storage/'.$d->image_path) }}" class="w-full h-full object-cover" />
        @else
          <div class="w-full h-full flex items-center justify-center text-slate-600 font-bold">No Image</div>
        @endif
      </div>
      <div class="p-4">
        <div class="flex items-center justify-between gap-2">
          <h3 class="font-extrabold text-lg">{{ $d->name }}</h3>
          @if(!is_null($d->price))
            <span class="text-sm font-bold text-rose-700">Rp{{ number_format($d->price,0,',','.') }}</span>
          @endif
        </div>
        <p class="text-sm text-slate-600 mt-1">{{ $d->category->name }}</p>
        <p class="text-sm text-slate-700 mt-2 line-clamp-2">{{ $d->description }}</p>
      </div>
    </a>
  @empty
    <div class="text-slate-600">Belum ada dessert.</div>
  @endforelse
</div>

<div class="mt-6">
  {{ $desserts->links() }}
</div>
@endsection