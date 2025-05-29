<?php

    namespace App\Modules\User\Repositories;

    use App\Modules\User\Models\User;
    use App\Modules\User\Repositories\UserRepositoryInterface;

    class UserRepository implements UserRepositoryInterface
    {
        public function all()
        {
            return User::paginate(10);
        }

        public function create(array $data)
        {
            return User::create($data);
        }

        public function findById($id)
        {
            return User::find($id);
        }

        public function findByEmail($email)
        {
            return User::where('email', $email)->first();
        }

        public function search(string $searchTerm)
        {
        return User::where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
                    ->get();
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
