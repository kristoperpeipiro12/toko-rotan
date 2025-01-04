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





// Route::get('/', [LoginController::class, 'index'])->name('login');

// Route::get('/', [LoginLoginController::class, 'index'])->name('login');
// // Group untuk login
// Route::group(['prefix' => 'login'], function () {
// });

route::get('/',[LoginController::class,'index'])->name('login');
// Route::get('/login/proses', [LoginController::class, 'login'])->name('login.proses');

Route::post('/login/proses', [LoginController::class, 'login'])->name('login.proses');
route::get('/dashboard', [LoginController::class,'dashboard'])->name('dashboard');

route::get('/register',[LoginController::class,'register'])->name('register');
route::post('/register/proses',[LoginController::class,'registerproses'])->name('register.proses');


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


Route::get('/home', [ShopController::class, 'index'])->name('shop.home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop.shop');
Route::get('/about', [ShopController::class, 'about'])->name('shop.about');
Route::get('/detail', [ShopController::class, 'detail'])->name('shop.detail');
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');



// // Group untuk customer
// Route::group(['prefix' => 'customer', 'middleware' => 'auth:customer'], function () {
//     // Tambahkan route customer lain di sini
// });


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


Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
