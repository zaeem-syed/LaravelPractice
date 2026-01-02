<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Testcontroller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});


route::get('/test',[Testcontroller::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/pay', [PaymentController::class, 'pay']);

Route::get("/payments", function(){
    return view("payment.payments");
});

Route::get('/chat', [ChatController::class, 'index'])->middleware('auth');
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/products', [OrderController::class, 'index'])->name('products.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/success', function () { return 'Order Placed Successfully!'; })->name('orders.success');
});

