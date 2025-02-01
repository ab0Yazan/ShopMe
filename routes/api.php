<?php

use App\Http\Controllers\API\AdminAuthController;
use App\Http\Controllers\API\Category\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);


Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:admin-api')->group(function () {
        Route::get('/me', [AdminAuthController::class, 'me']);
        Route::post('/logout', [AdminAuthController::class, 'logout']);
    });

    Route::middleware('auth:admin-api')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::post('', [CategoryController::class, 'store']);
        });
    });

});
