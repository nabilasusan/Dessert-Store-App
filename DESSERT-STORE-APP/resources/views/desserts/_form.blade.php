@php $isEdit = isset($dessert); @endphp

<div class="grid sm:grid-cols-2 gap-4">
  <div class="sm:col-span-2">
    <label class="text-sm font-semibold">Nama Dessert</label>
    <input name="name" value="{{ old('name', $dessert->name ?? '') }}" required
           class="mt-1 w-full rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400" />
    @error('name') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="text-sm font-semibold">Kategori</label>
    <select name="category_id" required class="mt-1 w-full rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400">
      @foreach($categories as $c)
        <option value="{{ $c->id }}" @selected(old('category_id', $dessert->category_id ?? '')==$c->id)>
          {{ $c->name }}
        </option>
      @endforeach
    </select>
    @error('category_id') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="text-sm font-semibold">Harga (opsional)</label>
    <input name="price" type="number" step="0.01" value="{{ old('price', $dessert->price ?? '') }}"
           class="mt-1 w-full rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400" />
  </div>

  <div>
    <label class="text-sm font-semibold">Waktu Persiapan (menit)</label>
    <input name="prep_minutes" type="number" min="0" value="{{ old('prep_minutes', $dessert->prep_minutes ?? 0) }}"
           class="mt-1 w-full rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400" />
  </div>

  <div>
    <label class="text-sm font-semibold">Gambar (opsional)</label>
    <input name="image" type="file" accept="image/*"
           class="mt-1 w-full rounded-xl border-slate-200 bg-white" />
  </div>

  <div class="sm:col-span-2">
    <label class="text-sm font-semibold">Deskripsi</label>
    <textarea name="description" rows="3"
      class="mt-1 w-full rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400">{{ old('description', $dessert->description ?? '') }}</textarea>
  </div>

  <div class="sm:col-span-2">
    <label class="text-sm font-semibold">Bahan</label>
    <textarea name="ingredients" rows="4"
      class="mt-1 w-full rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400">{{ old('ingredients', $dessert->ingredients ?? '') }}</textarea>
  </div>

  <div class="sm:col-span-2">
    <label class="text-sm font-semibold">Langkah</label>
    <textarea name="steps" rows="5"
      class="mt-1 w-full rounded-xl border-slate-200 focus:ring-rose-200 focus:border-rose-400">{{ old('steps', $dessert->steps ?? '') }}</textarea>
  </div>

  <div class="sm:col-span-2 flex items-center gap-2">
    <input type="checkbox" name="is_published" value="1" class="rounded border-slate-300 text-rose-600"
      @checked(old('is_published', $dessert->is_published ?? true)) />
    <span class="text-sm font-semibold">Publish</span>
  </div>
</div>