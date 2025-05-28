<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Services\UserService;
use App\Modules\User\Http\Requests\CreateUserRequest;
use App\Modules\User\Http\Requests\UpdateUserRequest;
use App\Modules\User\Models\User;

class userCrudController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index()
    {
        $users = $this->userService->getAllUsers()->paginate(10);

        return $this->success(200, 'لیست کاربران.', ['users' => $users]);
    }


    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = $this->userService->createUser($validatedData);

        if ($user) {
            return $this->success(201, 'کاربر با موفقیت ایجاد شد.', ['user' => $user]);
        }

        return $this->error(500, 'خطا در ایجاد کاربر.');
    }


    public function show(string $id)
    {
        $user = $this->userService->findUserById($id);

        if (!$user) {
            return $this->error(404, 'کاربر یافت نشد.');
        }

        return $this->success(200, 'اطلاعات کاربر.', ['user' => $user]);
    }


    public function update(UpdateUserRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $user = $this->userService->findUserById($id);

        if (!$user) {
            return $this->error(404, 'کاربر یافت نشد.');
        }

        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $updatedUser = $this->userService->updateUser($user, $validatedData);

        if ($updatedUser) {
            return $this->success(200, 'کاربر با موفقیت به‌روزرسانی شد.', ['user' => $updatedUser]);
        }

        return $this->error(500, 'خطا در به‌روزرسانی کاربر.');
    }


    public function destroy(string $id)
    {
        $user = $this->userService->findUserById($id);

        if (!$user) {
            return $this->error(404, 'کاربر یافت نشد.');
        }

        if ($this->userService->deleteUser($user)) {
            return $this->success(200, 'کاربر با موفقیت حذف شد.', null);
        }

        return $this->error(500, 'خطا در حذف کاربر.');
    }


    public function search(Request $request)
    {
        $searchTerm = $request->query('q');

        if (empty($searchTerm)) {
            return $this->error(400, 'عبارت جستجو نمی‌تواند خالی باشد.');
        }

        $users = $this->userService->searchUsers($searchTerm);

        if ($users->isEmpty()) {
            return $this->success(200, 'هیچ کاربری با عبارت جستجو یافت نشد.', ['users' => []]);
        }

        return $this->success(200, 'کاربران یافت شده.', ['users' => $users]);
    }
}
