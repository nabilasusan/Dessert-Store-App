@extends('layouts.app') {{-- atau layouts.admin kalau kamu punya --}}
@section('title','Admin Dashboard')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h3 class="fw-bold mb-0">Admin Dashboard</h3>
      <div class="text-muted">Kelola category & dessert</div>
    </div>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary">Category</a>
      <a href="{{ route('admin.desserts.index') }}" class="btn btn-primary">Dessert</a>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-md-6">
      <div class="card border-0 shadow-sm" style="border-radius:16px;">
        <div class="card-body">
          <div class="fw-semibold">Kelola Kategori</div>
          <div class="text-muted small mb-3">Tambah/Edit/Hapus kategori dessert</div>
          <a class="btn btn-outline-primary" href="{{ route('admin.categories.index') }}">Buka Category</a>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card border-0 shadow-sm" style="border-radius:16px;">
        <div class="card-body">
          <div class="fw-semibold">Kelola Dessert</div>
          <div class="text-muted small mb-3">CRUD dessert + publish/unpublish</div>
          <a class="btn btn-primary" href="{{ route('admin.desserts.index') }}">Buka Dessert</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection