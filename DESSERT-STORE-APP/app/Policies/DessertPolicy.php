<?php

namespace App\Policies;

use App\Models\Dessert;
use App\Models\User;

class DessertPolicy
{
    public function viewAny(User $user): bool { return true; }
    public function view(User $user, Dessert $dessert): bool { return true; }

    public function create(User $user): bool { return true; }

    public function update(User $user, Dessert $dessert): bool
    {
        return $user->isAdmin() || $dessert->user_id === $user->id;
    }

    public function delete(User $user, Dessert $dessert): bool
    {
        return $user->isAdmin() || $dessert->user_id === $user->id;
    }
}