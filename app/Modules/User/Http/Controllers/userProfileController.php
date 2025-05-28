<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Services\UserService;
use App\Modules\User\Http\Requests\userProfileRequest;

class userProfileController extends Controller
{
    Protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showProfile()
    {
        $user = auth()->user();
        return $this->success(200, 'اطلاعات پروفایل کاربر.', ['user' => $user]);
    }

    public function updateProfile(userProfileRequest $request)
    {
        $validatedData = $request->validated();
        $user = auth()->user();
        $updatedUser = $this->userService->updateUser($user, $validatedData);

            if ($updatedUser) {
                return $this->success(200, 'پروفایل با موفقیت به‌روزرسانی شد.', ['user' => $updatedUser]);
            }

            return $this->error(500, 'خطا در به‌روزرسانی پروفایل.');

    }
}
