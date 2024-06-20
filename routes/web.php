<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::resource('sector',  App\Http\Controllers\SectorController::class);
Route::resource('category',  App\Http\Controllers\CategoryController::class);
Route::resource('product',  App\Http\Controllers\ProductController::class);
