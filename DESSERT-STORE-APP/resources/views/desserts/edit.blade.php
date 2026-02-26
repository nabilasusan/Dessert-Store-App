@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-extrabold mb-4">Edit Dessert</h1>

<form method="POST" action="{{ route('desserts.update', $dessert) }}" enctype="multipart/form-data"
      class="rounded-2xl bg-white/80 border border-white shadow-sm p-6 space-y-5">
  @csrf
  @method('PUT')
  @include('desserts._form')

  <button class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-slate-900 text-white font-bold hover:bg-slate-950">
    Update
  </button>
</form>
@endsection