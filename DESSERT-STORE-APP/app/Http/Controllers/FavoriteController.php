<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function toggle(Dessert $dessert)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->favoriteDesserts()->toggle($dessert->id);

        return back()->with('success', 'Favorit diperbarui.');
    }

    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $desserts = $user->favoriteDesserts()
            ->with('category')
            ->latest('favorites.created_at')
            ->paginate(9);

        return view('favorites.index', compact('desserts'));
    }
}