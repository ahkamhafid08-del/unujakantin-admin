<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\PromotionController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\NotificationController;


Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'message' => 'API UnujaKantin berhasil berjalan'
    ]);
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/tables', [TableController::class, 'index']);
Route::get('/promotions', [PromotionController::class, 'index']);

Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);

Route::post('/reviews', [ReviewController::class, 'store']);

Route::get('/notifications', [NotificationController::class, 'index']);