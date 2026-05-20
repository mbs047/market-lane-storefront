<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/collections', [StorePageController::class, 'collections'])->name('store.collections');
Route::get('/deals', [StorePageController::class, 'deals'])->name('store.deals');
Route::get('/support', [StorePageController::class, 'support'])->name('store.support');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
