@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-extrabold">Favorit Saya ⭐</h1>

<div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
  @forelse($desserts as $d)
    <a href="{{ route('desserts.show',$d) }}" class="rounded-2xl bg-white/80 border border-white shadow-sm p-4 hover:shadow-md transition">
      <p class="font-extrabold">{{ $d->name }}</p>
      <p class="text-sm text-slate-600">{{ $d->category->name }}</p>
    </a>
  @empty
    <p class="text-slate-600">Belum ada favorit.</p>
  @endforelse
</div>

<div class="mt-6">
  {{ $desserts->links() }}
</div>
@endsection