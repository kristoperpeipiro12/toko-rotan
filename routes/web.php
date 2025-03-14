<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataWilayahController;
use App\Http\Controllers\Admin\DisplayProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ProdukVarianController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\Login\LoginController as LoginLoginController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Shop\AccountController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\CheckoutController;
use App\Http\Controllers\Shop\ShopController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route Catalog
// Route::get('/', [CustomerHomeController::class, 'index'])->name('customer.home');
// Route::get('/shop/cus', [CustomerHomeController::class, 'shop'])->name('customer.shop');
// Route::get('/about/cus', [CustomerHomeController::class, 'about'])->name('customer.about');

// con
Route::get('/', [ShopController::class, 'index'])->name('shop.home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop.shop');
Route::get('/shop/about', [ShopController::class, 'about'])->name('shop.about');


Route::get('/login', [LoginController::class, 'index'])->name('login');
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
    // tambah produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::post('/produk', [ProdukController::class, 'store'])->name('admin.produk.store');

    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('admin.produk.delete');

    // varian produk
    Route::get('/produk-varian', [ProdukVarianController::class, 'index'])->name('admin.produk_varian');
    Route::post('/produk-varian', [ProdukVarianController::class, 'store'])->name('admin.produk_varian.store');
    Route::put('/produk-varian/update/{id}', [ProdukVarianController::class, 'update'])->name('admin.produk_varian.update');
    Route::delete('/produk-varian/delete/{id}', [ProdukVarianController::class, 'delete'])->name('admin.produk_varian.delete');

    // search varian
    Route::post('/produk-varian/search', [ProdukVarianController::class, 'search'])->name('admin.produk_varian.f_produk');


    // display produk
    Route::get('/display-produk', [DisplayProdukController::class, 'index'])->name('admin.produk_display');

    Route::get('/pesanan', [KirimEmailController::class, 'index'])->name('admin.pesanan');


    // kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::post('/kategori/add', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'delete'])->name('admin.kategori.delete');

    // pesanan
    Route::get('/pesanan/proses', [PesananController::class, 'index'])->name('admin.pesanan.index');
    Route::put('/admin/pesanan/update-status/{id_checkout}', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');

});

// Customer Routes
Route::group(['middleware' => ['auth', 'role:customer']], function () {

    Route::get('/shop/detail/{slug}', [ShopController::class, 'detail'])->name('shop.detail');

    // bagian keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('shop.cart');
    Route::post('/cart/add', [CartController::class, 'store'])->name('shop.cart.store');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('shop.cart.update');
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('shop.cart.delete');


    // bagian checkout
    // Route::post('/co/{id}', [CheckoutController::class, 'index'])->name('shop.co');
    // Route::get('/co', [CheckoutController::class, 'index'])
    //     ->name('shop.co')
    //     ->middleware('check.selected.items');
    Route::post('/co', [CheckoutController::class, 'index'])->name('shop.co');
    // Route::post('/co/add', [CheckoutController::class, 'store'])->name('shop.co.store');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('pesan.proses');
    // Route::delete('/co/delete/{id}', [CheckoutController::class, 'delete'])->name('shop.co.delete');


    Route::get('/account', [AccountController::class, 'index'])->name('cs.account');
    Route::post('/account/tanggal-lahir', [AccountController::class, 'updateTanggalLahir'])->name('cs.tgl_lahir');
    Route::post('/account/jenis-kelamin', [AccountController::class, 'updateJenisKelamin'])->name('cs.jk');
    Route::post('/account/tambah', [AccountController::class, 'TambahAlamat'])->name('cs.tambah.alamat');
    Route::match(['get', 'post', 'put'], '/account/update/alamat', [AccountController::class, 'UpdateAlamat'])->name('cs.update.alamat');
    Route::match(['post', 'put'], '/account/update/alamat/co', [AccountController::class, 'UpdateAlamatCO'])->name('cs.update.alamatco');


    Route::post('/send-order-confirmation', [KirimEmailController::class, 'sendOrderConfirmation'])->name('send.order.confirmation');
});

// Download Catalog
Route::get('/download-katalog', function () {
    $filePath = public_path('katalog/katalog.pdf'); // Lokasi file katalog
    return Response::download($filePath, 'katalog.pdf');
})->name('download.katalog');
