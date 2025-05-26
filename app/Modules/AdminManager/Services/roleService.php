<?php
namespace App\Modules\AdminManager\Services;


use App\Modules\AdminManager\Repositories\roleRepositoryInterface;



class roleService
{
    protected $roleRepo;

    public function __construct(roleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }


    public function FindRoleByName($name)
    {
        return $this->roleRepo->findByName($name);
    }
}
