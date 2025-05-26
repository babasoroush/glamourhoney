<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\AdminManager\Http\Controllers\AdminController;


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/api/makeadmin', [AdminController::class, 'makeAdmin']);
});
