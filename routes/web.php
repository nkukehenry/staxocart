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

Route::middleware(['auth'])->group(function () {

Route::get('/vendor', [App\Http\Controllers\VendorController::class, 'index'])->name('vendor');
Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'store'])->name('products.add');
Route::post('/products/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::get('/products/delete/{slug}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.delete');

});