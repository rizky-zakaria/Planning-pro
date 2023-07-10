<?php

use App\Http\Controllers\AnggranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenKontrakController;
use App\Http\Controllers\DurasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
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
        Route::resource('/instansi', InstansiController::class);
        Route::resource('/proyek', ProyekController::class);
        Route::post('/proyek/uraian/{id}', [ProyekController::class, 'tambahUraian'])->name('uraian.store');
        Route::put('/proyek/uraian/edit/{id}', [ProyekController::class, 'ubahUraian'])->name('uraian.update');
        Route::delete('/proyek/uraian/delete/{id}', [ProyekController::class, 'hapusUraian'])->name('uraian.destroy');
        Route::resource('/anggaran', AnggranController::class);
        Route::resource('/waktu_perencanaan', DurasiController::class);
        Route::resource('/dokumen-kontrak', DokumenKontrakController::class);
        Route::resource('/invoice', InvoiceController::class);
    });

    // Middleware Boss
    Route::group(['middleware' => ['role:bos'], 'prefix' => '/bos'], function () {
        Route::get('/dashboard', [DashboardController::class, 'bos'])->name('bos.dashboard');
    });

    Route::resource('/profile', ProfileController::class);
    Route::post('/profile/updatePhoto', [ProfileController::class, 'updatePhoto'])->name('updatePhoto');

    // LAPORAN
    Route::get('/laporan/rab', [LaporanController::class, 'laporanRab'])->name('laporan.rab');
    Route::get('/laporan/proyek', [LaporanController::class, 'laporanProyek'])->name('laporan.proyek');

    // CETAK LAPORAN
    Route::get('/laporan/print', [LaporanController::class, 'cetekLaporanProyek'])->name('print.proyek');


    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
