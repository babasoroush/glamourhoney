<?php

namespace App\Modules\User\Services;

use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepositoryInterface;


class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    public function getAllUsers()
    {
        return $this->userRepo->all();
    }
    public function findUserById($id)
    {
        return $this->userRepo->find($id);
    }
    public function FindUserByEmail($email)
    {
        return $this->userRepo->findByEmail($email);
    }

    public function createUser(array $data)
    {
        return $this->userRepo->create($data);
    }

    public function updateRole(User $user, array $data)
    {
        return $this->userRepo->update($data);
    }

    public function deleteUser(User $user)
    {
        return $this->userRepo->delete();
    }
}
