<?php

namespace App\Modules\AdminManager\Policies;

use App\Modules\User\Models\User;
use App\Modules\AdminManager\Models\Role;

class AdminManagerPolicy
{

    public function before(User $user, string $ability)
    {
        if ($user->hasRole('owner')) {
            return true;
        }
        return null;
    }

    public function assignRole(User $user): bool
    {
        return false;
    }

    public function revokeRole(User $user): bool
    {
        return false;
    }

    public function viewAllAdmins(User $user): bool
    {
        return false;
    }
}
