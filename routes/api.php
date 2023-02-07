<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\OptionController;
use App\Http\Controllers\OrderController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/customers', [CustomerController::class, 'store']); // unimplemented

Route::post('/order-items', [OrderController::class, 'store']); // unimplemented

Route::get('/orders', [OrderController::class, 'index']); // unimplemented

Route::get('/items', [ItemController::class, 'index']); // unimplemented

Route::get('/categories', [CategoryController::class, 'index']); // unimplemented

Route::get('/categories/{category_id}/items', [CategoryController::class, 'show']); // unimplemented

Route::get('/options', [OptionController::class, 'index']); // unimplemented

Route::delete('/orders/{order_id}/delete-order', [OrderController::class, 'destroy']); // unimplemented

Route::get('/orders/uncompleted-order', [OrderController::class, 'indexUncompleted']); // unimplemented

Route::patch('/orders/{order_id}/complete-order', [OrderController::class, 'update']); // unimplemented
