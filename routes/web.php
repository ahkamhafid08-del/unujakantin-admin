<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Api\CheckoutController;




Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);

Route::resource('tables', TableController::class);

Route::resource('promotions', PromotionController::class);

Route::resource('orders', OrderController::class);

Route::resource('reviews', ReviewController::class)
    ->only(['index','show','destroy']);

Route::resource('notifications', NotificationController::class);

Route::post('/checkout', [CheckoutController::class, 'store']);

