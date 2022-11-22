<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\GreetingController;

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

Route::post('/customers', function () {
    return 'Welcome';
});

Route::post('/order-items', function (Request $request) {
    return 'Ordered';
});

Route::get('/orders', function () {
    return 'Get your orders';
});

Route::get('/items', function () {
    return 'Get items';
});

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{category_id}/items', [CategoryController::class, 'show']);

Route::get('/options', function () {
    return 'Get options';
});

Route::delete('/orders/{order_id}/delete-order', function ($order_id) {
    return 'Delete order';
});

Route::get('/orders/uncompleted-order', function () {
    return 'Get uncompleted order';
});

Route::patch('/orders/{order_id}/complete-order', function ($order_id) {
    return 'Complete order';
});
