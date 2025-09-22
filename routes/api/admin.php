<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\UserAddressController;

Route::middleware(['auth.cookie', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class)
        ->except(['create', 'edit']);
    Route::resource('categories', CategoryController::class)
        ->except(['create', 'edit']);
    Route::resource('carts', CartController::class)
        ->except(['create', 'edit']);
});