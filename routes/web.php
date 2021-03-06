<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/products/detail/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::post('/orders/checkout', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.checkout');
Route::get('/orders/payment/{id}', [App\Http\Controllers\OrderController::class, 'payment'])->name('orders.payment');
Route::post('/orders/pay', [App\Http\Controllers\OrderController::class, 'pay'])->name('orders.pay');
Route::post('/orders/splitpay', [App\Http\Controllers\OrderController::class, 'splitpay'])->name('orders.splitpay');
Route::get('/orders/feedback/{order_id}', [App\Http\Controllers\OrderController::class, 'feedback'])->name('orders.feedback');


Route::middleware(['auth'])->group(function () {

Route::get('/vendor', [App\Http\Controllers\VendorController::class, 'index'])->name('vendor');
Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'store'])->name('products.add');
Route::post('/products/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::get('/products/delete/{slug}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.delete');

});