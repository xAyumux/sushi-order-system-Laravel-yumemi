<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\OptionController;
use App\Http\Controllers\OrderController;
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

Route::post('/customers', [CustomerController::class, 'create']);

Route::post('/order-items', [OrderController::class, 'create']);

Route::get('/orders', [OrderController::class, 'index']);

Route::get('/items', [ItemController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{category_id}/items', [CategoryController::class, 'show']);

Route::get('/options', [OptionController::class, 'index']);

Route::delete('/orders/{order_id}/delete-order', [OrderController::class, 'destroy']);

Route::get('/orders/uncompleted-order', [OrderController::class, 'indexUncompleted']);

Route::patch('/orders/{order_id}/complete-order', [OrderController::class, 'edit']);
