<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RecommendationController;
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

Route::middleware('not-login')->group(function () {
    Route::get('/', [AuthController::class, 'show_login'])->name('show.login');
    Route::get('/login', [AuthController::class, 'show_login'])->name('show.login');
    Route::get('/register', [AuthController::class, 'show_register'])->name('show.register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware('karyawan')->group(function () {
        Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
        Route::get('/ajukan-keluhan', [PagesController::class, 'ajukan_keluhan'])->name('ajukan.keluhan');
        Route::post('/ajukan-keluhan', [ComplaintController::class, 'store'])->name('keluhan.store');
        Route::get('/ajukan-usulan', [PagesController::class, 'ajukan_usulan'])->name('ajukan.usulan');
        Route::post('/ajukan-usulan', [RecommendationController::class, 'store'])->name('usulan.store');
        Route::get('/keluhan/pengguna', [PagesController::class, 'keluhan_pengguna'])->name('keluhan.user');
        Route::get('/keluhan/{id}', [PagesController::class, 'keluhan_detail'])->name('keluhan.detail');
        Route::get('/usulan/all', [PagesController::class, 'usulan_all'])->name('usulan.all');
        Route::get('/usulan/pengguna', [PagesController::class, 'usulan_pengguna'])->name('usulan.user');
        Route::get('/usulan/{id}', [PagesController::class, 'usulan_detail'])->name('usulan.detail');
    });

    Route::middleware('admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [PagesController::class, 'admin_dashboard'])->name('admin.dashboard');
            Route::get('/keluhan/all', [ComplaintController::class, 'index'])->name('admin.complaint.index');
            Route::get('/keluhan/download-excel', [ComplaintController::class, 'downloadExcel'])->name('admin.complaint.download.excel');
            Route::get('/keluhan/{id}', [ComplaintController::class, 'show'])->name('admin.complaint.show');
            Route::get('/usulan/all', [RecommendationController::class, 'index'])->name('admin.recommendation.index');
            Route::get('/usulan/download-excel', [RecommendationController::class, 'downloadExcel'])->name('admin.recommendation.download.excel');
            Route::get('/usulan/{id}', [RecommendationController::class, 'show'])->name('admin.recommendation.show');
            Route::put('/keluhan/{id}', [ComplaintController::class, 'give_result'])->name('admin.complaint.give_result');
            Route::put('/usulan/{id}', [RecommendationController::class, 'give_result'])->name('admin.recommendation.give_result');
            Route::get('/download/{file}', [ComplaintController::class, 'downloadFile'])->name('download.file');
        });
    });
});
