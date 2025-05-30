<?php

namespace App\Modules\User\Policies;

use App\Modules\User\Models\User;
use App\Modules\AdminManager\Models\Role;
use Illuminate\Support\Facades\Log;

class UserCrudPolicy
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

    public function show(User $user): bool
    {
        return false;
    }

    public function store(User $user): bool
    {
        return false;
    }

    public function update(User $user): bool
    {
        return false;
    }

    public function destroy(User $user): bool
    {
        return false;
    }


    public function search(User $user): bool
    {
        return false;
    }
}
