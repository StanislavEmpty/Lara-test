<?php
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/buyProduct', [App\Http\Controllers\HomeController::class, 'buyProduct'])->name('buyProduct');
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::post('/removeProductFromCart', [App\Http\Controllers\HomeController::class, 'removeProductFromCart'])->name('removeProductFromCart');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::resource('sector',  App\Http\Controllers\SectorController::class);
Route::resource('category',  App\Http\Controllers\CategoryController::class);
Route::resource('product',  App\Http\Controllers\ProductController::class);
