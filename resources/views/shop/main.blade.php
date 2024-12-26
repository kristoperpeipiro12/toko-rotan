@extends('shop.layouts.app')
@section('title', 'Store')
@section('content')
    <div class="content-border">
        {{-- welcome --}}
        <section class="welcome-section mb-5">
            <div class="wrap-wel-img">
                <img src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" alt="">
                <div class="wrap-text-img">
                    <span class="wel-title ms-2">AL-ZAHRA</span>
                    <span class="wel-text ms-2">Selamat Datang</span>
                    <span class="promo-text ms-2">dapatkan promo menarik setiap tahun!</span>
                    <div class="wrap-btn-wel-shop">
                        <button class="btn-wow-btn-1">Belanja Sekarang <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>
        </section>
        {{-- .... --}}

        {{-- portal section --}}
        <section class="portal-section">
            <div class="wrap-portal">
                <span class="text-center portal-title">Portal Menu</span>
                <div class="portal-menu">
                    <div class="card-card-1">
                        <div class="card-image-card-1">
                            <img src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" alt="Free Shipping">
                        </div>
                        <div class="card-content-card-1">
                            <h3 class="card-title-card-1">Produk</h3>
                            <a href="#" class="card-button-card-1">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card-card-1">
                        <div class="card-image-card-1">
                            <img src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" alt="menu">
                        </div>
                        <div class="card-content-card-1">
                            <h3 class="card-title-card-1">Promo</h3>
                            <a href="#" class="card-button-card-1">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card-card-1">
                        <div class="card-image-card-1">
                            <img src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" alt="menu">
                        </div>
                        <div class="card-content-card-1">
                            <h3 class="card-title-card-1">Keranjang</h3>
                            <a href="#" class="card-button-card-1">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card-card-1">
                        <div class="card-image-card-1">
                            <img src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" alt="menu">
                        </div>
                        <div class="card-content-card-1">
                            <h3 class="card-title-card-1">Akun</h3>
                            <a href="#" class="card-button-card-1">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- .... --}}
    </div>
    <script>
        // Mendapatkan nilai tinggi viewport (1vh)
        let vh = window.innerHeight / 100;

        console.log(`1vh = ${vh}px`);

        // Mendapatkan tinggi viewport penuh
        console.log(`Tinggi viewport penuh = ${window.innerHeight}px`);
    </script>
@endsection
