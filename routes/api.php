<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\ProductApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {

    Route::get('products', [ProductApiController::class, 'index'])->name('products.list');

    Route::post('register_admin', [LoginApiController::class, 'register']);

    Route::post('login_admin', [LoginApiController::class, 'adminLogin']);
    Route::post('cart_add', [CartApiController::class, 'addToCart']);
});
