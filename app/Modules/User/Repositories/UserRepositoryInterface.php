<?php

    namespace App\Modules\User\Repositories;

    use App\Modules\User\Models\User;

    interface UserRepositoryInterface
    {
        public function all();
        public function create(array $data);
        public function findById($id);
        public function findByEmail($email);
        public function search(string $searchTerm);
        public function update(User $user, array $data);
        public function delete(User $user);
    }
