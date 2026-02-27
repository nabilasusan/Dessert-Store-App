@extends('layouts.user')
@section('title','Desserts')

@section('content')
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h4 class="fw-black mb-0">Desserts</h4>
      <div class="text-muted small">Pilih yang paling bikin ngiler 😋</div>
    </div>
  </div>

  @if($desserts->count() === 0)
    <div class="text-center py-5">
      <div class="display-6">🍰</div>
      <div class="fw-bold">Belum ada dessert</div>
      <div class="text-muted small">Admin belum menambahkan menu.</div>
    </div>
  @else
    <div class="row g-4">
      @foreach($desserts as $d)
        <div class="col-12 col-sm-6 col-lg-4">
          <a href="{{ route('desserts.show', $d->slug) }}"
             class="text-decoration-none text-dark">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
              <div class="ratio ratio-16x9 bg-light">
                @if($d->image_path)
                  <img src="{{ asset('storage/'.$d->image_path) }}" class="object-fit-cover" alt="{{ $d->name }}">
                @else
                  <div class="d-flex align-items-center justify-content-center text-muted small">
                    No Image
                  </div>
                @endif
              </div>

              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between gap-2">
                  <h5 class="fw-black mb-1">{{ $d->name }}</h5>
                  <span class="badge rounded-pill text-bg-light border">
                    {{ $d->category->name ?? 'Uncategorized' }}
                  </span>
                </div>

                <p class="text-muted small mb-3" style="min-height: 38px;">
                  {{ \Illuminate\Support\Str::limit($d->description ?? 'Dessert lezat untuk menemani harimu.', 80) }}
                </p>

                <div class="d-flex align-items-center justify-content-between">
                  <div class="fw-black">
                    {{ $d->price ? 'Rp '.number_format($d->price,0,',','.') : '—' }}
                  </div>
                  <span class="fw-bold text-primary">
                    Lihat <i class="bi bi-arrow-right"></i>
                  </span>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>

    <div class="mt-4">
      {{ $desserts->links() }}
    </div>
  @endif
@endsection