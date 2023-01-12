<?php

use App\Http\Controllers\PenggunaanListrikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware' => ['auth:useradmin,pelanggan']], function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth:useradmin,pelanggan', 'cektypeuser:level-001']], function () {
    Route::get('/add-penggunaan-listrik', [PenggunaanListrikController::class, 'index'])->name('addPenggunaan');
    Route::post('/add-penggunaan-listrik', [PenggunaanListrikController::class, 'insertPenggunaanListrik']);
    Route::post('/delete-penggunaan-listrik', [PenggunaanListrikController::class, 'deletePenggunaanListrikById']);
    Route::get('/get-update-penggunaan-listrik/{id}', [PenggunaanListrikController::class, 'getUpdatePenggunaanListrik']);
    Route::post('/update-penggunaan-listrik', [PenggunaanListrikController::class, 'updateDataPenggunaanListrik']);
});

Route::post('/authentication', [AuthenticationController::class, 'authentication'])->middleware('guest');
Route::get('/', [AuthenticationController::class, 'index'])->middleware('guest')->name('authentication');
