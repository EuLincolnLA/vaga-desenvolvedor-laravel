<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;



Route::get('/', [ClienteController::class, 'index']);

Route::resource('clientes', ClienteController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);





