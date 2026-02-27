@extends('layouts.admin')
@section('title','Desserts')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
  <div>
    <h3 class="fw-bold mb-0">Desserts</h3>
    <div class="text-muted">Kelola menu dessert (CRUD) untuk aplikasi.</div>
  </div>

  <a href="{{ route('admin.desserts.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Tambah Dessert
  </a>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:70px;">Foto</th>
            <th>Nama</th>
            <th style="width:180px;">Kategori</th>
            <th style="width:140px;">Harga</th>
            <th style="width:120px;">Status</th>
            <th style="width:160px;" class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @forelse($desserts as $d)
          <tr>
            <td>
              @php
                $img = $d->image_path ? asset('storage/'.$d->image_path) : 'https://via.placeholder.com/120x90?text=Dessert';
              @endphp
              <img src="{{ $img }}" class="thumb" alt="{{ $d->name }}">
            </td>

            <td>
              <div class="fw-semibold">{{ $d->name }}</div>
              <div class="text-muted small">Slug: {{ $d->slug }}</div>
            </td>

            <td>
              <span class="badge text-bg-light border">
                {{ $d->category?->name ?? '-' }}
              </span>
            </td>

            <td class="fw-semibold">
              @if($d->price !== null)
                Rp {{ number_format($d->price, 0, ',', '.') }}
              @else
                <span class="text-muted">-</span>
              @endif
            </td>

            <td>
              @if($d->is_published)
                <span class="badge text-bg-success"><i class="bi bi-check2 me-1"></i> Publish</span>
              @else
                <span class="badge text-bg-secondary"><i class="bi bi-eye-slash me-1"></i> Draft</span>
              @endif
            </td>

            <td class="text-end">
              <a href="{{ route('admin.desserts.edit', $d) }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-pencil-square"></i>
              </a>

              <button class="btn btn-outline-danger btn-sm"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteModal{{ $d->id }}">
                <i class="bi bi-trash"></i>
              </button>

              <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus Dessert</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      Yakin mau hapus <b>{{ $d->name }}</b>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                      <form method="POST" action="{{ route('admin.desserts.destroy', $d) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                          <i class="bi bi-trash me-1"></i> Hapus
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-5">
              <div class="fw-semibold">Belum ada dessert</div>
              <div class="text-muted">Klik tombol <b>Tambah Dessert</b> untuk membuat menu pertama.</div>
            </td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @if($desserts->hasPages())
    <div class="card-footer bg-white">
      {{ $desserts->links() }}
    </div>
  @endif
</div>
@endsection