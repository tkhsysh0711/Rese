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

    Route::get('/', [RestaurantController::class, 'index'])->name('index');

    Route::get('/thanks', [AuthController::class, 'thanks']);

    Route::get('/search', [RestaurantController::class, 'search'])->name('search');

    Route::get('/detail/{restaurants_id}',[RestaurantController::class, 'detail'])->name('detail');

    Route::middleware('auth')->group(function () {
        Route::post('/reservation', [UserController::class, 'registerReservation'])->name('registerReservation');

        Route::get('/done', [UserController::class, 'done']);

        Route::post('/favorite', [UserController::class, 'registerFavorite'])->name('registerFavorite');

        Route::post('/favorite/delete', [UserController::class, 'deleteFavorite'])->name('deleteFavorite');

        Route::get('/mypage', [UserController::class, 'mypage']);
    });