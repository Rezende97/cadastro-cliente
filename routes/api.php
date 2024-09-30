<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// endpoint que retorna os estados
Route::get('/state', [StateController::class, 'showState']);

// endpoint que retorna as cidades
Route::get('/cities', [CitiesController::class, 'showCity']); 

Route::group(['prefix' => 'customer'], function () {

    Route::post('/register', [CustomerController::class, 'registerCustomer']);

    Route::get('/', [CustomerController::class, 'show']);

    Route::get('/representative/{id}', [CustomerController::class, 'representativeCustomer']);

    Route::get('/representativeCity/{id}', [CustomerController::class, 'showRepresentativeCity']);

    Route::get('/filterCustomers', [CustomerController::class, 'filterCustomers']);

});
