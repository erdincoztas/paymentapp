<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\NotificationController;



Route::get('/test', [ProfileController::class, 'test'])->name('test');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','permission'])->name('dashboard');





Route::get('/siparis', [ProductController::class, 'siparisOlusturuldu'])->name('siparisOlusturuldu');


Route::get('/', [ProductController::class, 'urunlistele'])->name('urunlistele');
Route::get('/siparisdetay/{id}', [ProductController::class, 'siparisdetay'])->name('siparisdetay');


Route::post('/order/create', [ProductController::class , 'ordercreate'])->name('order.create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/urunler', [ProductController::class, 'urunler'])->name('urunler');
    Route::get('/urun/ekle', function () {return view('layouts.product_form');})->name('urunekle');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/product/create', [ProductController::class , 'create'])->name('Product.create');
    Route::get('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');

    Route::get('/siparisler', [ProductController::class, 'siparisler'])->name('siparisler');
    Route::get('/users', [ProductController::class, 'users'])->name('users');
    Route::get('/changeroles/{user_id}', [ProductController::class, 'changeroles'])->name('changeroles');

    Route::get('/notifications', [NotificationController::class, 'notifications'])->name('notifications');
    Route::get('/notifications/create', [NotificationController::class, 'notificationsCreate'])->name('notificationsCreate');
    Route::get('/notifications/delete/{id}', [NotificationController::class, 'notificationsDelete'])->name('notifications.delete');
    Route::get('/user/notifications', [NotificationController::class, 'UserNotification'])->name('newNotification');
    Route::get('/user/notification/detail/{id}', [NotificationController::class, 'notificationDetail'])->name('notificationDetail');



});

require __DIR__.'/auth.php';
