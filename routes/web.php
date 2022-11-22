<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OptionController;

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

Route::post('/order-items', function (Request $request) {
    return 'Ordered';
});

Route::get('/orders', function () {
    return 'Get your orders';
});

Route::get('/items', [ItemController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{category_id}/items', [CategoryController::class, 'show']);

Route::get('/options', [OptionController::class, 'index']);

Route::delete('/orders/{order_id}/delete-order', function ($order_id) {
    return 'Delete order';
});

Route::get('/orders/uncompleted-order', function () {
    return 'Get uncompleted order';
});

Route::patch('/orders/{order_id}/complete-order', function ($order_id) {
    return 'Complete order';
});
