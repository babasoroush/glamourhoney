<?php

namespace App\Modules\User\Policies;

use App\Modules\User\Models\User;

class UserPolicy
{

    public function before(User $user, string $ability)
    {

        if ($user->hasRole('owner')) {
            return true;
        }

        return null;
    }

    public function index(User $user): bool
    {
        return false;
    }

    public function show(User $user, User $model): bool
    {
        return false;
    }

    public function store(User $user): bool
    {
        return false;
    }

    public function update(User $user, User $model): bool
    {
        return false;
    }

    public function delete(User $user, User $model): bool
    {
        if ($model->id === 1) {
            return false;
        }
        return false;
    }


    public function search(User $user): bool
    {
        return false;
    }
}
