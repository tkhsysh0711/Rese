<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

    Route::get('/', [RestaurantController::class, 'index']);

    Route::get('/search', [RestaurantController::class, 'search'])->name('search');

    Route::get('/detail/{restaurant_id}',[RestaurantController::class, 'detail'])->name('detail');

    Route::get('/favorite', [UserController::class, 'registerFavorite'])->name('registerFavorite');