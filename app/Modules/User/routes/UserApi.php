<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\User\Http\Controllers\userProfileController;
use App\Modules\User\Http\Controllers\userCrudController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('api/profile', [userProfileController::class, 'showProfile'])->name('profile.show');
    Route::put('api/profile', [userProfileController::class, 'updateProfile'])->name('profile.update');


    Route::get('api/users/search', [userCrudController::class, 'search'])
    ->middleware('can:search')
    ->name('users.search');
    Route::get('api/users', [userCrudController::class, 'index'])
    ->middleware('can:index')
    ->name('users.index');
    Route::post('api/users', [userCrudController::class, 'store'])
    ->middleware('can:store')
    ->name('users.store');
    Route::get('api/users/{id}', [userCrudController::class, 'show'])
    ->middleware('can:show')
    ->name('users.show');
    Route::put('api/users/{id}', [userCrudController::class, 'update'])
    ->middleware('can:update')
    ->name('users.update');
    Route::delete('api/users/{id}', [userCrudController::class, 'destroy'])
    ->middleware('can:destroy')
    ->name('users.destroy');

});

