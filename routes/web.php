<?php

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

Route::get('/categories', function () {
    $result = [
        'categories' => [
            ['name' => 'sushi'],
            ['name' => 'donburi'],
            ['name' => 'ra-men'],
        ],
    ];
    return view('category-items')->with('result', $result);
});

Route::get('/categories/{category_id}/items', function ($category_id) {
    $result = [
        'category_id' => $category_id,
        'category_name' => '寿司',
        'categories' => [
            ['name' => 'maguro'],
            ['name' => 'sake'],
        ],
    ];
    return view('category-items')->with('result', $result);
});

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
