<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\AdminManager\Http\Controllers\AdminController;

Route::middleware(['auth:sanctum'])->group(function () {


    Route::prefix('api/admin-manager')->group(function () {

        Route::post('/assign-role', [AdminController::class, 'assignRole'])
            ->middleware('can:assignRole')
            ->name('admin.assign-role');

        Route::post('/revoke-role', [AdminController::class, 'revokeRole'])
            ->middleware('can:revokeRole')
            ->name('admin.revoke-role');

        Route::get('/all-admins', [AdminController::class, 'getAllAdmins'])
            ->middleware('can:viewAllAdmins')
            ->name('admin.all-admins');
    });
});
