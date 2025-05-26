<?php

    namespace App\Modules\AdminManager\Repositories;

    use App\Modules\AdminManager\Models\Role;
    use App\Modules\AdminManager\Repositories\roleRepositoryInterface;

    class roleRepository implements roleRepositoryInterface
    {
        public function findByName($name)
        {
            return Role::where('name', $name)->first();
        }
    }
