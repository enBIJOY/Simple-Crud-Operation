<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});

Route::post('/create', [ProductController::class, 'create'])->name('create');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
Route::get('/show', [ProductController::class, 'show'])->name('show');
Route::delete('/product/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');


