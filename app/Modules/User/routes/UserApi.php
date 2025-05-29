<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\User\Http\Controllers\userProfileController;
use App\Modules\User\Http\Controllers\userCrudController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('api/profile', [userProfileController::class, 'showProfile'])->name('profile.show');
    Route::put('api/profile', [userProfileController::class, 'updateProfile'])->name('profile.update');


    Route::get('api/users/search', [userCrudController::class, 'search'])->name('users.search');
    Route::resource('api/users', userCrudController::class)->except(['create', 'edit']);

});

