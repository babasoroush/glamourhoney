<?php

    namespace App\Modules\User\Repositories;

    use App\Modules\User\Models\User;
    use App\Modules\User\Repositories\UserRepositoryInterface;

    class UserRepository implements UserRepositoryInterface
    {
        public function all()
        {
            return User::all();
        }

        public function findById($id)
        {
            return User::findOrFail($id);
        }

        public function findByEmail($email)
        {
            return User::where('email', $email)->first();
        }

        public function create(array $data)
        {
            return User::create($data);
        }

        public function update(User $user, array $data)
        {
            $user->update($data);
            return $user;
        }

        public function delete(User $user)
        {
            return $user->delete();
        }
    }
