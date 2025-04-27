<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class);
Route::get('/products/{productId}', [ProductController::class, 'index'])->name('products.detail');

Route::get('/create', [ProductController::class, 'create'])->name('products.create');

Route::get('/detail', [ProductController::class, 'detail'])->name('products.detail');
