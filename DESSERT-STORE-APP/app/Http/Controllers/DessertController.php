<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DessertController extends Controller
{
  // =======================
  // USER (PUBLIC)
  // =======================
  public function publicIndex()
{
    $desserts = \App\Models\Dessert::with('category')
        ->where('is_published', true)
        ->latest()
        ->paginate(9);

    return view('public.desserts.index', compact('desserts'));
}

  public function publicShow(Dessert $dessert)
  {
    abort_unless($dessert->is_published, 404);

    $isFavorited = false;
    if (Auth::check()) {

    /** @var User $user */
    $user = Auth::user();

    $isFavorited = $user->favoriteDesserts()
        ->where('dessert_id', $dessert->id)
        ->exists();
}

    return view('public.desserts.show', compact('dessert', 'isFavorited'));
  }

  // =======================
  // ADMIN (CRUD) - pakai resource
  // =======================
  public function index()
  {
    $desserts = Dessert::with('category')->latest()->paginate(10);
    return view('admin.desserts.index', compact('desserts'));
  }

  public function create()
  {
    $categories = Category::orderBy('name')->get();
    return view('admin.desserts.create', compact('categories'));
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => ['required','string','max:150'],
      'category_id' => ['required','exists:categories,id'],
      'description' => ['nullable','string'],
      'price' => ['nullable','numeric','min:0'],
      'image' => ['nullable','image','max:2048'],
      'is_published' => ['nullable','boolean'],
    ]);

    $data['slug'] = $this->uniqueSlug(Str::slug($data['name']));
    $data['user_id'] = Auth::id();
    $data['is_published'] = $request->boolean('is_published');

    if ($request->hasFile('image')) {
      $data['image_path'] = $request->file('image')->store('desserts', 'public');
    }

    Dessert::create($data);

    return redirect()->route('admin.desserts.index')->with('success','Dessert berhasil ditambah');
  }

  public function edit(Dessert $dessert)
  {
    $categories = Category::orderBy('name')->get();
    return view('admin.desserts.edit', compact('dessert','categories'));
  }

  public function update(Request $request, Dessert $dessert)
  {
    $data = $request->validate([
      'name' => ['required','string','max:150'],
      'category_id' => ['required','exists:categories,id'],
      'description' => ['nullable','string'],
      'price' => ['nullable','numeric','min:0'],
      'image' => ['nullable','image','max:2048'],
      'is_published' => ['nullable','boolean'],
    ]);

    if ($dessert->name !== $data['name']) {
      $data['slug'] = $this->uniqueSlug(Str::slug($data['name']), $dessert->id);
    }

    $data['is_published'] = $request->boolean('is_published');

    if ($request->hasFile('image')) {
      $data['image_path'] = $request->file('image')->store('desserts', 'public');
    }

    $dessert->update($data);

    return redirect()->route('admin.desserts.index')->with('success','Dessert berhasil diupdate');
  }

  public function destroy(Dessert $dessert)
  {
    $dessert->delete();
    return back()->with('success','Dessert berhasil dihapus');
  }

  private function uniqueSlug(string $slug, ?int $ignoreId = null): string
  {
    $base = $slug;
    $i = 1;

    while (
      Dessert::where('slug', $slug)
        ->when($ignoreId, fn($q) => $q->where('id','!=',$ignoreId))
        ->exists()
    ) {
      $slug = $base.'-'.$i++;
    }
    return $slug;
  }
}