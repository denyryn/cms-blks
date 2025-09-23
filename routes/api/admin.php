<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\UserAddressController;

Route::middleware(['auth.cookie', 'role:admin'])->prefix('admin')->group(function () {
    // Admin product management
    Route::get('products', [ProductController::class, 'adminIndex'])
        ->name('admin.products.index');
    Route::post('products', [ProductController::class, 'store'])
        ->name('products.store');
    Route::get('products/{product}', [ProductController::class, 'adminShow'])
        ->name('admin.products.show');
    Route::put('products/{product}', [ProductController::class, 'update'])
        ->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    // Admin category management
    Route::get('categories', [CategoryController::class, 'adminIndex'])
        ->name('admin.categories.index');
    Route::post('categories', [CategoryController::class, 'store'])
        ->name('categories.store');
    Route::get('categories/{category}', [CategoryController::class, 'adminShow'])
        ->name('admin.categories.show');
    Route::put('categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    // Admin cart management - only viewing capabilities
    Route::get('carts', [CartController::class, 'adminIndex'])
        ->name('admin.carts.index');
    Route::get('carts/{cart}', [CartController::class, 'adminShow'])
        ->name('admin.carts.show');
});