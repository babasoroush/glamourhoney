<?php

namespace App\Modules\AdminManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Services\UserService;
use App\Modules\AdminManager\Services\roleService;
use App\Modules\AdminManager\Http\Requests\createAdminRequest;



class AdminController extends Controller
{
    Protected $userService;
    Protected $roleService;

    public function __construct(UserService $userService , roleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }


    public function makeAdmin(createAdminRequest $request)
    {
        $validated = $request->validated();
        $email= $validated['email'];
        $user = $this->userService->FindUserByEmail($email);

        if (!$user) {
            return $this->error(401 , 'کاربر با ایمیل مورد نظر وجود ندارد!');
        }

        $name = $validated['role_name'];
        $role = $this->roleService->FindRoleByName($name);


        if (!$role) {
            return $this->error(401 , 'چنین نقشی وجود ندارد!');
        }


        $user->roles()->attach($role->id);
        return $this->success(201 , ' ادمین با موفقیت ایجاد شد!',[$user ,$role ]);
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role_name' => 'required|string|exists:roles,name',
        ]);

        $role = Role::where('name', $request->role_name)->first();

        if (!$role) {
            return response()->json(['message' => 'Role not found.'], 404);
        }

        $user->roles()->attach($role->id);

        return response()->json(['message' => "Role '{$role->name}' assigned to user successfully", 'user' => $user->load('roles')], 200);
    }

    public function revokeRole(Request $request, User $user)
    {
        $request->validate([
            'role_name' => 'required|string|exists:roles,name',
        ]);

        $role = Role::where('name', $request->role_name)->first();

        if (!$role) {
            return response()->json(['message' => 'Role not found.'], 404);
        }

        $user->roles()->detach($role->id);

        return response()->json(['message' => "Role '{$role->name}' revoked from user successfully", 'user' => $user->load('roles')], 200);
    }

    public function getAllAdmins(Request $request)
    {
        $adminRoles = ['owner', 'blog_admin', 'shop_admin'];

        $requestedType = $request->query('type');

        if ($requestedType && !in_array($requestedType, $adminRoles)) {
            return response()->json(['message' => 'Invalid admin type specified. Available types are: ' . implode(', ', $adminRoles)], 400);
        }

        if ($requestedType) {
            $targetRole = Role::where('name', $requestedType)->first();

            if (!$targetRole) {
                return response()->json(['message' => "Role '{$requestedType}' not found."], 404);
            }
            $admins = $targetRole->users()->get()->load('roles');
            $message = "Listing all {$requestedType}s.";
        } else {

            $admins = User::whereHas('roles', function ($query) use ($adminRoles) {
                $query->whereIn('name', $adminRoles);
            })->with('roles')->get();
            $message = "Listing all admins (owner, blog_admin, shop_admin).";
        }

        if ($admins->isEmpty()) {
            return response()->json(['message' => 'No admins found for the specified criteria.'], 404);
        }

        return response()->json(['message' => $message, 'admins' => $admins], 200);
    }
}
