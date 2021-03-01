<?php

use App\Http\Controllers\CustomersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('customers')->group(function() {
    // http://127.0.0.1:8000/customers/
    Route::get('/', [CustomersController::class, 'index']);

    Route::get('/search', [CustomersController::class, 'search']);
    Route::post('/search', [CustomersController::class, 'search']);

    Route::get('/add', [CustomersController::class, 'add']);
    Route::post('/add', [CustomersController::class, 'create']);

    Route::get('/edit/{id?}', [CustomersController::class, 'edit']);
    Route::post('/edit/{id?}', [CustomersController::class, 'update']);

    Route::get('/remove/{id}', [CustomersController::class, 'destroy']);
});