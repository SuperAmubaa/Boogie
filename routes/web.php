<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\SelisihController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// routes/web.php

use App\Http\Controllers\BahanBakuController;


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('/user', UserController::class);
});

Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
    Route::resource('/katalog', KatalogController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/warna', WarnaController::class);
 
    

});

// Route::resource('/user', UserController::class);
Route::resource('/barang_masuk', BarangMasukController::class);
Route::resource('/barang_keluar', BarangKeluarController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/{kode_warna}', [DashboardController::class, 'show'])->name('dashboard.show');
Route::get('/get-warna/{katalogId}', [BarangMasukController::class, 'getWarna']);
Route::get('/get-sisa-stok/{warnaId}', [BarangKeluarController::class, 'getSisaStok']);





