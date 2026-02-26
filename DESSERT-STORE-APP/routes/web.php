<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DessertController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function () { return redirect()->route('login'); });

Route::get('dashboard', function () {
    $user = Auth::user();

    // user biasa masuk ke halaman home/public desserts
    // return redirect()->route('home');
})->middleware(['auth'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| PUBLIC / USER
|--------------------------------------------------------------------------
*/

// halaman utama list dessert (untuk user)
Route::get('desert', [DessertController::class, 'publicIndex'])->name('desserts.index');
Route::get('/desserts/{dessert:slug}', [DessertController::class, 'publicShow'])->name('desserts.show');

// favorites butuh login
Route::middleware(['auth'])->group(function () {
    Route::post('/favorites/{dessert}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('desserts', DessertController::class);
});

require __DIR__ . '/auth.php';