<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/create', [ProductController::class, 'create'])->name('Products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('Products.store');
Route::get('/products/get', [ProductController::class, 'show'])->name('Products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('Products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('Products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('Products.destroy');
