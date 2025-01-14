<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataWilayahController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Login\LoginController as LoginLoginController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Shop\ShopController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'index'])->name('login');


Route::post('/login/proses', [LoginController::class, 'login'])->name('login.proses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register/proses', [LoginController::class, 'registerproses'])->name('register.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.post');


Route::get('/email/verify', function () {
    return view('auth.verifyemail');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/profile', function () {
    return redirect('/')->with('success', 'Email Anda telah diverifikasi. Silakan login untuk melanjutkan.');
})->middleware(['auth', 'verified']);

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::post('/store', [ProdukController::class,'store'])->name('admin.produk.store');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::get('/datawilayah', [DataWilayahController::class, 'index'])->name('admin.datawilayah');
    Route::get('/tambah/datawilayah', [DataWilayahController::class, 'create'])->name('admin.datawilayah.create');
    Route::get('/pesanan/dikemas', [PesananController::class, 'kemas'])->name('admin.pesanan.dikemas');
    Route::get('/pesanan/dikirim', [PesananController::class, 'kirim'])->name('admin.pesanan.dikirim');
    Route::get('/pesanan/konfirmasi', [PesananController::class, 'konfirmasi'])->name('admin.pesanan.konfirmasi');
    Route::get('/pesanan/selesai', [PesananController::class, 'selesai'])->name('admin.pesanan.selesai');
});

// Customer Routes
Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/home', [ShopController::class, 'index'])->name('shop.home');
    Route::get('/shop', [ShopController::class, 'shop'])->name('shop.shop');
    Route::get('/shop/about', [ShopController::class, 'about'])->name('shop.about');
    Route::get('/shop/detail', [ShopController::class, 'detail'])->name('shop.detail');
    Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
});

// Route Catalog
Route::get('/our-products', [CustomerHomeController::class, 'index'])->name('customer.home');
Route::get('/about', [CustomerHomeController::class, 'about'])->name('customer.about');
Route::get('/detail', [CustomerHomeController::class, 'detail'])->name('customer.detail');
    