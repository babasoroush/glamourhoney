<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\User\Http\Controllers\userProfileController;
use App\Modules\User\Http\Controllers\userCrudController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [userProfileController::class, 'showProfile'])->name('profile.show');
    Route::put('/profile', [userProfileController::class, 'updateProfile'])->name('profile.update');


    Route::get('/users/search', [userCrudController::class, 'search'])->name('users.search');
    Route::resource('users', userCrudController::class)->except(['create', 'edit']);

});

