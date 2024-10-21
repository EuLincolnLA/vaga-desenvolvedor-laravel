<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::get('/', [ClienteController::class, 'index']);

// Rotas do recurso Cliente
Route::resource('clientes', ClienteController::class);



