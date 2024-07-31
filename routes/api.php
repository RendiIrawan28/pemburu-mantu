<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\OrderController;

use App\Http\Controllers\AuthController as ControllersAuthController;

Route::post('/login', [ControllersAuthController::class, 'login']);
Route::post('/register', [ControllersAuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/images', [ImageController::class, 'index']);
    Route::get('/images/{image}', [ImageController::class, 'show']);
    Route::post('/images', [ImageController::class, 'store']);
    Route::put('/images/{image}', [ImageController::class, 'update']);
    Route::delete('/images/{image}', [ImageController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::put('/orders/{order}', [OrderController::class, 'update']);
    Route::delete('/orders/{order}', [OrderController::class, 'destroy']);
    Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus']);
});
