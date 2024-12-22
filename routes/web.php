<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataWilayahController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Login\LoginController as LoginLoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/', [LoginLoginController::class, 'index'])->name('login');
// Group untuk login
Route::group(['prefix' => 'login'], function () {
});

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk');



Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');



Route::get('/datawilayah', [DataWilayahController::class, 'index'])->name('admin.datawilayah');
Route::get('/tambah/datawilayah', [DataWilayahController::class, 'create'])->name('admin.datawilayah.create');


Route::get('/pesanan/dikemas', [PesananController::class, 'kemas'])->name('pesanan.dikemas');
Route::get('/pesanan/dikirim', [PesananController::class, 'kirim'])->name('pesanan.dikirim');
Route::get('/pesanan/konfirmasi', [PesananController::class, 'konfirmasi'])->name('pesanan.konfirmasi');
Route::get('/pesanan/selesai', [PesananController::class, 'selesai'])->name('pesanan.selesai');

// Group untuk admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    // Tambahkan route admin lain di sini
});

// Route Catalog
Route::get('/our-products', [CustomerHomeController::class, 'index'])->name('customer.home');
Route::get('/about', [CustomerHomeController::class, 'about'])->name('customer.about');
Route::get('/detail', [CustomerHomeController::class, 'detail'])->name('customer.detail');

// Group untuk customer
Route::group(['prefix' => 'customer', 'middleware' => 'auth:customer'], function () {
    // Tambahkan route customer lain di sini
});