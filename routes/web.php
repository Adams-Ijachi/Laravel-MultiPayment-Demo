<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/{product}', [CartController::class, 'store'])->name('cart.store');

Route::patch('/{orderItem}/increase', [OrderItemController::class, 'increaseQuantity'])
                                    ->name('orderItem.increase');

Route::patch('/{orderItem}/decrease', [OrderItemController::class, 'decreaseQuantity'])
                                    ->name('orderItem.decrease');

Route::post('/checkout/{order}', [OrderController::class, 'checkout'])->name('checkout');
