<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






Route::get('/users', [ProductController::class, 'users'])->name('users');
Route::get('/', [ProductController::class, 'urunlistele'])->name('urunlistele');
Route::get('/siparisdetay/{id}', [ProductController::class, 'siparisdetay'])->name('siparisdetay');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/urunler', [ProductController::class, 'urunler'])->name('urunler');
    Route::get('/urun/ekle', function () {return view('layouts.product_form');})->name('urunekle');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/product/create', [ProductController::class , 'create'])->name('Product.create');
    Route::get('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');
});

require __DIR__.'/auth.php';
