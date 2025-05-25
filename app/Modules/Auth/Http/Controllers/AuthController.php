<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Modules\User\Services\UserService;
use App\Modules\Auth\Http\Requests\LoginRequest;
use App\Modules\Auth\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    Protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function register(RegisterRequest $request)
    {
            $data = $request->validated();

            unset($data['password_confirmation']);

            $data['password'] = Hash::make($data['password']);

            $user = $this->userService->createUser($data);

            $token = $user->createToken('auth_token')->plainTextToken;

            $responseData = [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ];

            return $this->success('201' , 'ثبت نام با موفقیت انجام شد' , $responseData);;
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return $this->error(401, 'اطلاعات کاربری اشتباه است.');
        }

        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        $responseData = [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return $this->success(200, 'ورود با موفقیت انجام شد.', $responseData);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success('200', 'با موفقیت خارج شدید.', []);

    }
}
