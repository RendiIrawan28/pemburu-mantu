<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::middleware(['auth'])->group(function () {
    Route::get('/order-images', function () {
        return view('orders.order');
    });
    Route::get('/order', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    Route::get('/orders', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/create/{image}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    
    Route::get('/order-images', [OrderController::class, 'orderImages'])->name('order.images');
    
});

Route::middleware(['auth', 'Wedding Organizer'])->group(function () {
    Route::get('/image', function () {
        return view('images.index');
    });
    Route::get('/upload', [ImageController::class, 'create'])->name('images.create');
    Route::post('/upload', [ImageController::class, 'store'])->name('images.store');
    
    Route::get('/images', [ImageController::class, 'index'])->name('images.index');
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');
    Route::get('/images/{image}/edit', [ImageController::class, 'edit'])->name('images.edit');
    Route::put('/images/{image}', [ImageController::class, 'update'])->name('images.update');

    Route::get('/orders-data', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

require __DIR__ . '/auth.php';
