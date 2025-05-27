<?php

namespace App\Modules\AdminManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Services\UserService;
use App\Modules\AdminManager\Services\roleService;
use App\Modules\AdminManager\Http\Requests\createAdminRequest;
use App\Modules\AdminManager\Http\Requests\revokeAdminRequest;



class AdminController extends Controller
{
    Protected $userService;
    Protected $roleService;

    public function __construct(UserService $userService , roleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }


    public function assignRole(createAdminRequest $request)
    {
        $user = $this->userService->FindUserByEmail($request->email);

        $role = $this->roleService->FindRoleByName($request->role_name);

        if ($user->roles()->where('role_id', $role->id)->exists()) {
            return $this->error(409, 'این کاربر از قبل نقش مورد نظر را دارد!');
        }
        $user->roles()->attach($role->id);

        return $this->success(201 , ' ادمین با موفقیت ایجاد شد!',[$user ,$role ]);
    }


    public function revokeRole(revokeAdminRequest $request)
    {

        $role = $this->roleService->FindRoleByName($request->role_name);

        $user = $this->userService->FindUserByEmail($request->email);

        if (!$user->roles()->where('role_id', $role->id)->exists()) {
            return $this->error(404, 'این کاربر از قبل نقش مورد نظر را ندارد!');
        }

        $user->roles()->detach($role->id);

        return $this->success(201 , ' نقش با موفقیت از ادمین گرفته شد!',[$user ,$role ]);
    }

    public function getAllAdmins(Request $request)
    {
        $adminRoles = ['owner', 'blog_admin', 'shop_admin'];

        $allUsers = $this->userService->getAllUsers();

        $allUsers->load('roles');

        $admins = $allUsers->filter(function ($user) use ($adminRoles) {

            return $user->hasAnyRole($adminRoles);
        })->values();

        return $this->success(200, 'لیست تمام ادمین‌ها .', ['admins' => $admins]);
    }
}
