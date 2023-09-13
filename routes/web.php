<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => 'web'], function () {

    Route::get('/AdminDashboard', [HomeController::class, 'Dashboard'])->name('AdminDashboard');
    Route::get('logout', [AdminLoginController::class,'logout']);
});
Route::get('/register/admin',[AdminLoginController::class,'RegisterForm']);
Route::post('admin_register', [AdminLoginController::class, 'register'])->name('admin.register');

Route::get('/login/admin',[AdminLoginController::class,'Login']);
Route::post('admin_login', [AdminLoginController::class, 'adminLogin'])->name('admin.login');

