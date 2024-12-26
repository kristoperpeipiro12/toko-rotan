@extends('shop.layouts.app')
@section('title', 'Store')
@section('content')
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
    @include('shop.includes.navbar')
    {{-- portal section --}}
    <section class="portal-section content-border">
        <div class="wrap-portal">
            <span class="text-center portal-title" style="font-style: italic; margin-bottom: 15px">Kategori
                Produk</span>
            <div class="portal-menu">
                <div class="card-card-1">
                    <div class="card-image-card-1">
                        <img src="{{ asset('assets/images/dummy-images/corousel-2-2.jpg') }}" alt="Free Shipping">
                    </div>
                    <div class="card-content-card-1">
                        <h3 class="card-title-card-1">Wood Carpet</h3>
                        <a href="#" class="card-button-card-1">Pergi</a>
                    </div>
                </div>
                <div class="card-card-1">
                    <div class="card-image-card-1">
                        <img src="{{ asset('assets/images/product-img/webbing-carpet-2.png') }}" alt="menu">
                    </div>
                    <div class="card-content-card-1">
                        <h3 class="card-title-card-1">Webbing Carpet</h3>
                        <a href="#" class="card-button-card-1">Pergi</a>
                    </div>
                </div>
                <div class="card-card-1">
                    <div class="card-image-card-1">
                        <img src="{{ asset('assets/images/product-img/kerai-kayu-kat.png') }}" alt="menu">
                    </div>
                    <div class="card-content-card-1">
                        <h3 class="card-title-card-1">Kerai Kayu</h3>
                        <a href="#" class="card-button-card-1">Pergi</a>
                    </div>
                </div>
                <div class="card-card-1">
                    <div class="card-image-card-1">
                        <img src="{{ asset('assets/images/product-img/tikar-ajiro-kat.png') }}" alt="menu">
                    </div>
                    <div class="card-content-card-1">
                        <h3 class="card-title-card-1">Tikar Rotan Ajiro</h3>
                        <a href="#" class="card-button-card-1">Pergi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- .... --}}

    {{-- Promo Image --}}
    <section class="promo-section" style="margin-bottom: 62px">
        <div class="wrap-img-promo-section">
            <img src="{{ asset('assets/images/product-img/promo-bg-1.jpg') }}" alt="">
            <div class="wrap-promo">
                <span class="promo-spesial">Promo Spesial</span>
                <button class="btn-wow-btn-1 segera-tiba">Segera Tiba</button>
            </div>
        </div>
    </section>
    {{-- .... --}}

    <section class="best-seller-section content-border">
        <span>Best Seller</span>
    </section>

    {{-- Footer Section --}}
    <section class="footer-section">
        <div class="newsletter-container">
            <h3 class="newsletter-title">Sign up for newsletters</h3>
            <p class="newsletter-description">Get E-mail updates about our latest shop and <span>special offers</span>.
            </p>
            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Your email address" required>
                <button type="submit" class="newsletter-button">Sign Up</button>
            </form>
        </div>
        <div class="footer-container">
            <div class="footer-brand">
                <h2 class="brand-name">AL-ZAHRA</h2>
                <p class="brand-contact">Contact</p>
                <p class="brand-details">Address: 562 Wellington Road, Street 32, San Francisco</p>
                <p class="brand-details">Phone: +01 2222 3665 / (+91) 01 2345 6763</p>
                <p class="brand-details">Hours: 10:00 - 18:00, Mon - Sat</p>
                <p class="brand-follow">Follow us</p>
                <div class="social-icons">
                    <a href="#" class="social-icon">&#x1F426;</a>
                    <a href="#" class="social-icon">&#x1F3A5;</a>
                    <a href="#" class="social-icon">&#x1F4AC;</a>
                    <a href="#" class="social-icon">&#x1F426;</a>
                </div>
            </div>
            <div class="footer-links">
                <h3 class="footer-title">About</h3>
                <ul class="link-list">
                    <li><a href="#" class="footer-link">About Us</a></li>
                </ul>
            </div>
            <footer> </footer>
    </section>
    {{-- .... --}}
    <script>
        // Mendapatkan nilai tinggi viewport (1vh)
        let vh = window.innerHeight / 100;

        console.log(`1vh = ${vh}px`);

        // Mendapatkan tinggi viewport penuh
        console.log(`Tinggi viewport penuh = ${window.innerHeight}px`);
    </script>
@endsection
