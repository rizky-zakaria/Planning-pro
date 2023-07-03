<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin']);
});

Route::group(['middleware' => 'auth'], function () {
    // Middleware Admin
    Route::group(['middleware' => ['role:admin'], 'prefix' => '/admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    });

    // Middleware Boss
    Route::group(['middleware' => ['role:bos'], 'prefix' => '/bos'], function () {
        Route::get('/dashboard', [DashboardController::class, 'bos'])->name('bos.dashboard');
    });

    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
