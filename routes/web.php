<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index']);
Route::get('/geo-ip', [BookController::class, 'geoIp']);
Route::get('/cart', [BookController::class, 'cart']);
Route::get('/increase-one-item/{id}', [BookController::class, 'increaseByOne']);
Route::get('/decrease-one-item/{id}', [BookController::class, 'decreaseByOne']);
Route::get('/remove-item/{id}', [BookController::class, 'removeItem']);
Route::get('/add-to-cart/{id}', [BookController::class, 'getAddToCart']);
Route::get('/clear-cart', [BookController::class, 'clearCart']);
Route::get('/order/new', [BookController::class, 'new']);
Route::post('/orders', [BookController::class, 'store']);
Route::get('/orders', [BookController::class, 'index']);
Route::get('/confirm-orders/{order}', [BookController::class, 'confirm']);
Route::post('/callback', [BookController::class, 'callback']);
Route::get('/success', [BookController::class, 'redirectFromECpay']);
