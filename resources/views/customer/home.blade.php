@extends('customer.layouts.app')
@section('title', 'Home')
@section('content')
    {{-- welcome --}}
    <section class="welcome-section mb-5">
        <div class="wrap-wel-img">
            <img src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" alt="">
            <div class="wrap-text-img">
                <span class="wel-title ms-2">AL-ZAHRA</span>
                <span class="wel-text ms-2">Selamat Datang</span>
                <span class="promo-text ms-2" style="font-style: italic">dapatkan promo menarik setiap tahun!</span>
                <div class="wrap-btn-wel-shop">
                    <button class="btn-wow-btn-1">Belanja Sekarang <i class="fa-solid fa-cart-shopping"></i></button>
                </div>
            </div>
        </div>
    </section>
    {{-- .... --}}
    @include('customer.includes.navbar')
    {{-- portal section --}}
    <section class="portal-section content-border" style="margin-bottom: 15vh">
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
    <section class="promo-section" style="margin-bottom: 15vh">
        <div class="wrap-img-promo-section">
            <img src="{{ asset('assets/images/product-img/promo-bg-1.jpg') }}" alt="">
            <div class="wrap-promo">
                <span class="promo-spesial">Promo Spesial</span>
                <button class="btn-wow-btn-1 segera-tiba">Segera Tiba</button>
            </div>
        </div>
    </section>
    {{-- .... --}}

    {{-- Best Product --}}
    <section class="best-product-section content-border">
        <span class="text-center" style="font-style: italic; font-size: 2.1rem;">Best Product</span>
        <div class="wrap-best-product">
            <div class="product-card-2">
                <div class="image-container-card-2">
                    <img src="{{ asset('assets/images/product-img/wood-carpet-sungkai-polos.png') }}"
                        alt="Cartoon Astronaut T-Shirts" class="product-image-card-2" />
                </div>
                <div class="details-card-2">
                    <p class="brand-name-card-2">wood carpet</p>
                    <h3 class="product-title-card-2">Sungkai Polos</h3>
                    <div class="rating-card-2">
                        <i class="fa-solid fa-medal"></i> Best Seller
                    </div>
                    <p class="price-card-2">Mulai dari Rp. 75.000</p>
                </div>
                <div class="action-card-2">
                    <button class="cart-button-card-2">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>

            <div class="product-card-2">
                <div class="image-container-card-2">
                    <img src="{{ asset('assets/images/product-img/wood-carpet-sungkai-motif.jpg') }}"
                        alt="Cartoon Astronaut T-Shirts" class="product-image-card-2" />
                </div>
                <div class="details-card-2">
                    <p class="brand-name-card-2">wood carpet</p>
                    <h3 class="product-title-card-2">Sungkai Motif</h3>
                    <div class="rating-card-2">
                        <i class="fa-solid fa-medal"></i> Best Seller
                    </div>
                    <p class="price-card-2">Mulai dari Rp. 75.000</p>
                </div>
                <div class="action-card-2">
                    <button class="cart-button-card-2">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>

            <div class="product-card-2">
                <div class="image-container-card-2">
                    <img src="{{ asset('assets/images/product-img/tikar-ajiro-kat.png') }}" alt="Cartoon Astronaut T-Shirts"
                        class="product-image-card-2" />
                </div>
                <div class="details-card-2">
                    <p class="brand-name-card-2">tikar rotan ajiro</p>
                    <h3 class="product-title-card-2">Semua Motif</h3>
                    <div class="rating-card-2">
                        <i class="fa-solid fa-star"></i> Premium
                    </div>
                    <p class="price-card-2">Mulai dari Rp. 75.000</p>
                </div>
                <div class="action-card-2">
                    <button class="cart-button-card-2">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>

            <div class="product-card-2">
                <div class="image-container-card-2">
                    <img src="{{ asset('assets/images/product-img/kerai-kayu-polos.png') }}"
                        alt="Cartoon Astronaut T-Shirts" class="product-image-card-2" />
                </div>
                <div class="details-card-2">
                    <p class="brand-name-card-2">tikar rotan ajiro</p>
                    <h3 class="product-title-card-2">Sungkai Polos</h3>
                    <div class="rating-card-2">
                        <i class="fa-solid fa-medal"></i> Best Seller
                    </div>
                    <p class="price-card-2">Mulai dari Rp. 75.000</p>
                </div>
                <div class="action-card-2">
                    <button class="cart-button-card-2">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
    {{-- .... --}}

    <hr class="content-border"
        style="margin-bottom: 15vh; width: 100%; background-color: black; margin-top: 40px;margin-bottom: 125px; height: 2px">


    {{-- Contact Section --}}
    <section class="contact-section content-border" id="contact">
        {{-- <h2 class="map-title-contact-us1 text-center" style="font-style: italic">Lokasi Kami</h2> --}}
        <div class="main-content-contact-us1">
            <div class="info-section-contact-us1">
                <div class="info-card-contact-us1">
                    <h2 class="gradient-text">Temui kami:</h2>
                    <p class="info-detail-contact-us1">
                        <strong>Alamat:</strong> Jalan Tanjung Raya2, Kec. Pontianak Tim., Kota
                        Pontianak, Kalimantan Barat
                    </p>
                    <p class="info-detail-contact-us1">
                        <strong>Email:</strong> -
                    </p>
                    <p class="info-detail-contact-us1">
                        <strong>WhatsApp:</strong> +62 896 3054 1317
                    </p>
                    <button class="btn-wow-btn-1" style="width: 18rem;">Hubungi Kami</button>
                </div>
                <div class="image-container-contact-us1">
                    <img style="object-fit: fill" src="{{ asset('assets/images/toko.png') }}"
                        alt="Singkawang Grand Mall" class="info-image-contact-us1" />
                </div>
            </div>

            <div class="map-section-contact-us1">
                <div class="map-container-contact-us1">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8171396062708!2d109.3650957!3d-0.0440796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d593271208909%3A0xd4819c014287a846!2sToko%20Kerajian%20Rotan%26Bambu%20Al-Zahra!5e0!3m2!1sid!2sid!4v1735209380769!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                        ></iframe>
                </div>
            </div>
        </div>
    </section>
    {{-- .... --}}

    {{-- Footer Section --}}
    @include('customer.includes.footer')
    {{-- .... --}}
    <script>
        // Mendapatkan nilai tinggi viewport (1vh)
        let vh = window.innerHeight / 100;

        console.log(`1vh = ${vh}px`);

        // Mendapatkan tinggi viewport penuh
        console.log(`Tinggi viewport penuh = ${window.innerHeight}px`);
    </script>
@endsection
