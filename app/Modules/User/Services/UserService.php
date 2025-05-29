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

    public function createUser(array $data)
    {
        return $this->userRepo->create($data);
    }

    public function findUserById($id)
    {
        return $this->userRepo->findById($id);
    }
    public function FindUserByEmail($email)
    {
        return $this->userRepo->findByEmail($email);
    }

    public function searchUsers(string $searchTerm)
    {
        return $this->userRepo->search($searchTerm);
    }

    public function updateUser(User $user, array $data)
    {
        return $this->userRepo->update($user, $data);
    }

    public function deleteUser(User $user)
    {
        return $this->userRepo->delete($user);
    }
}
