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

// Route untuk membatasi hak ases hanya yang sudah login saja yang dapat mengakses route ini.
Route::group(['middleware' => ['auth:useradmin,pelanggan']], function () {
    // route untuk logout yang ada pada AuthenticationController function logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    // route untuk function menampilkan halaman dashboard yang ada pada DashboardController function index
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Rout untuk membatasi hak akses hanya yang sudah login dengan user admin saja.
Route::group(['middleware' => ['auth:useradmin,pelanggan', 'cektypeuser:level-001']], function () {
    // route untuk function menampilkan halaman add pengguanan listrik yang ada pada PengguanaanListrikController function index
    Route::get('/add-penggunaan-listrik', [PenggunaanListrikController::class, 'index'])->name('addPenggunaan');
    // route untuk function add penggunaan listrik pada PengguanaanListrikController function insertPenggunaanListrik
    Route::post('/add-penggunaan-listrik', [PenggunaanListrikController::class, 'insertPenggunaanListrik']);
    // route untuk function delete penggunaan listrik pada PengguanaanListrikController function deletePenggunaanListrikById
    Route::post('/delete-penggunaan-listrik', [PenggunaanListrikController::class, 'deletePenggunaanListrikById']);
    // route untuk function menampilkan halaman edit pengguanan listrik yang ada pada PengguanaanListrikController function getUpdatePenggunaanListrik
    Route::get('/get-update-penggunaan-listrik/{id}', [PenggunaanListrikController::class, 'getUpdatePenggunaanListrik']);
    // route untuk function update penggunaan listrik pada PengguanaanListrikController function updateDataPenggunaanListrik
    Route::post('/update-penggunaan-listrik', [PenggunaanListrikController::class, 'updateDataPenggunaanListrik']);
});

// route untuk function login pada AuthenticationController function authentication
Route::post('/authentication', [AuthenticationController::class, 'authentication'])->middleware('guest');
// route untuk function menampilkan halaman add index/login yang ada pada AuthenticationController function index
Route::get('/', [AuthenticationController::class, 'index'])->middleware('guest')->name('authentication');
