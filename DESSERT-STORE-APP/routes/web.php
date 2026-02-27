<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DessertController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    $user = Auth::user();

    // kalau admin -> masuk dashboard admin
    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    // selain admin -> masuk halaman user (list desserts)
    return redirect()->route('desserts.index');
})->middleware('auth')->name('dashboard');

/* =========================
| USER / PUBLIC
========================= */
Route::get('/desserts', [DessertController::class, 'publicIndex'])->name('desserts.index');
Route::get('/desserts/{dessert:slug}', [DessertController::class, 'publicShow'])->name('desserts.show');

Route::middleware('auth')->group(function () {
    Route::post('/favorites/{dessert}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

/* =========================
| ADMIN (WAJIB LOGIN)
========================= */
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return redirect()->route('admin.desserts.index');
        })->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('desserts', DessertController::class);
    });

require __DIR__.'/auth.php';