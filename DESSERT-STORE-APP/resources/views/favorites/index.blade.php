@extends('layouts.user')
@section('title','Favorites')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h4 class="fw-black mb-0">Favorit Saya</h4>
      <div class="text-muted small">Dessert yang kamu suka 💖</div>
    </div>
  </div>

  @if($desserts->count() === 0)
    <div class="text-center py-5">
      <div class="display-6">💔</div>
      <div class="fw-bold">Belum ada favorit</div>
      <div class="text-muted small">Tambahkan dari halaman detail dessert.</div>
      <a href="{{ route('desserts.index') }}" class="btn btn-primary rounded-4 mt-3 fw-bold">
        Cari Dessert
      </a>
    </div>
  @else
    <div class="row g-4">
      @foreach($desserts as $d)
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="ratio ratio-16x9 bg-light">
              @if($d->image_path)
                <img src="{{ asset('storage/'.$d->image_path) }}" class="object-fit-cover" alt="{{ $d->name }}">
              @else
                <div class="d-flex align-items-center justify-content-center text-muted small">No Image</div>
              @endif
            </div>

            <div class="card-body">
              <h5 class="fw-black mb-1">{{ $d->name }}</h5>
              <div class="text-muted small mb-2">{{ $d->category->name ?? '-' }}</div>

              <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('desserts.show', $d->slug) }}" class="btn btn-outline-dark rounded-4 fw-bold">
                  Lihat
                </a>

                <form method="POST" action="{{ route('favorites.toggle', $d->id) }}">
                  @csrf
                  <button class="btn btn-danger rounded-4 fw-bold" type="submit">
                    <i class="bi bi-heartbreak-fill me-1"></i> Unfavorite
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-4">
      {{ $desserts->links() }}
    </div>
  @endif
@endsection