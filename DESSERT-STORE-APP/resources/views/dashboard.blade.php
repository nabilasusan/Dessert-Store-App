{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-extrabold text-xl text-slate-900 leading-tight">
        🍮 Dashboard Dessert
      </h2>
      <span class="text-sm text-slate-600">
        Halo, {{ auth()->user()->name }}!
      </span>
    </div>
  </x-slot>

  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
        <div class="p-6">
          <p class="text-slate-700">
            Selamat datang di aplikasi dessert kamu. Mulai kelola menu, resep, dan kategori dengan cepat.
          </p>

          <div class="mt-6 grid sm:grid-cols-3 gap-4">
            <div class="rounded-2xl border border-rose-100 bg-rose-50 p-4">
              <p class="font-bold text-slate-900">Menu Dessert</p>
              <p class="text-sm text-slate-600 mt-1">Tambah & atur daftar dessert.</p>
            </div>
            <div class="rounded-2xl border border-amber-100 bg-amber-50 p-4">
              <p class="font-bold text-slate-900">Resep</p>
              <p class="text-sm text-slate-600 mt-1">Catat bahan & langkah pembuatan.</p>
            </div>
            <div class="rounded-2xl border border-orange-100 bg-orange-50 p-4">
              <p class="font-bold text-slate-900">Kategori</p>
              <p class="text-sm text-slate-600 mt-1">Misal: cake, cookies, puding.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
