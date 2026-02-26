@extends('layouts.app')
@section('title','Dessert')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h3 class="fw-bold mb-0">Dessert</h3>
      <div class="text-muted">Temukan dessert favoritmu 🍰</div>
    </div>

    @auth
      <a class="btn btn-outline-primary" href="{{ route('favorites.index') }}">
        <i class="bi bi-heart-fill me-1"></i> Favorit
      </a>
    @endauth
  </div>

  <div class="row g-3">
    @foreach($desserts as $d)
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:16px;">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="fw-semibold">{{ $d->name }}</div>
              <span class="badge bg-light text-dark">{{ $d->category?->name }}</span>
            </div>
            <div class="text-muted small mt-1">{{ Str::limit($d->description, 80) }}</div>

            <div class="d-flex justify-content-between align-items-center mt-3">
              <div class="fw-bold">Rp {{ number_format($d->price ?? 0, 0, ',', '.') }}</div>
              <a class="btn btn-sm btn-primary" href="{{ route('desserts.show', $d->slug) }}">Detail</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-3">
    {{ $desserts->links() }}
  </div>
</div>
@endsection