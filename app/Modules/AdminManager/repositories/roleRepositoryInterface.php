<?php

    namespace App\Modules\AdminManager\Repositories;

    use App\Modules\AdminManager\Models\Role;

    interface roleRepositoryInterface
    {
        public function findByName($name);
    }
