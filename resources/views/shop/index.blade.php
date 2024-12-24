{{-- ini halaman Home setelah login --}}
@extends('shop.layouts.app')
@section('title', 'Store')
@section('content')
    <div class="content-border">
        @include('shop.includes.navbar')
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="rounded-bottom-4 object-fit-contain carousel-inner">
                <div class="carousel-item img-fluid active">
                    <img src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" class="d-block w-100"
                        alt="karpet-">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold text-secondary">Kāpetto</h2>
                        <p class="text-secondary">Merupakan karpet dari pilihan terbaik -- <strong class="underline-custom"
                                style="text-decoration-color: #6c757d;">Best
                                Seller!</strong>
                        </p>
                    </div>
                </div>
                <div class="carousel-item img-fluid">
                    <img src="{{ asset('assets/images/dummy-images/corousel-2.jpg') }}" class="d-block w-100"
                        alt="karpet-">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold" style="color: #e4d1be;">Dìtǎn</h2>
                        <p style="color: #e4d1be; font-wight: 700">Merupakan karpet dari bahan Luar Negri -- <strong
                                class="underline-custom" style="text-decoration-color: #e4d1be;">Import Value!</strong>
                        </p>
                    </div>
                </div>
                <div class="carousel-item img-fluid">
                    <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" class="d-block w-100"
                        alt="karpet-">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold " style="color: #ece4ec;">Tappéto</h2>
                        <p
                            style="background-color: rgba(42, 37, 34, 0.5); border-radius: 18px; color: #ece4ec; font-wight: 700">
                            Merupakan karpet
                            dengan harga yang
                            paling terjangkau
                            --
                            <strong class="underline-custom" style="text-decoration-color: #ece4ec;">Economical!</strong>
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- ... --}}

        <div class="space-section my-4 d-flex flex-column justify-content-end">
            <span class="text-end fs-1 fw-bold line-height-normal">AL-ZAHRA</span>
            <span class="text-end p-0 m-0 line-height-normal">Menyediakan banyak pilihan ukuran pada setiap produk.
                <br> <a class="btn btn-outline-dark mt-2 mb-1" href="#">Lihat
                    Katalog</a></span>
            <hr class="align-self-end mt-0" style="border: 1px solid #ccc; width: 40%;">
        </div>

        <div class="product-section">
            <div class="promo-wrap">
                <span class="promo-text">Wood Carpet</span>
                <p class="expalination">Terbuat dari bahan panel plywood yang dilapis
                    <br>dengan kayu oak tipis yang kemudian dibacking dengan canvas cotton pada bagian alas karpet
                </p>
            </div>

            {{-- card section --}}
            <div class="card-wrap">
                <div class="card-wrap-section">
                    <div class="card" style="width: 18rem;">
                        <img class="img-card" src="{{ asset('assets/images/product-img/wood-carpet-netral.png') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Warnal Netral</h4>
                            <p class="card-text"><strong>Tenang dan Alami.</strong> <br>Ideal untuk ruang keluarga, kantor,
                                atau ruang kerja.</p>
                            {{-- <h4 class="card-price fw-bold text-end">Rp. 150.000</h4> --}}
                            <div class="d-flex w-100 justify-content-end">
                                <a href="#" class="btn btn-outline-secondary btn-pesan">Detail</a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="card" style="width: 18rem;">
                        <img class="img-card" src="{{ asset('assets/images/product-img/wood-carpet-coklat-muda.png') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Warnal Coklat Muda</h4>
                            <p class="card-text"><strong>Hangat dan Nyaman.</strong> <br>Cocok digunakan untuk kamar tidur
                                atau ruang tamu.</p>
                            {{-- <h4 class="card-price fw-bold text-end">Rp. 150.000</h4> --}}
                            <div class="d-flex w-100 justify-content-end">
                                <a href="#" class="btn btn-outline-secondary btn-pesan">Detail</a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="card" style="width: 18rem;">
                        <img class="img-card" src="{{ asset('assets/images/product-img/wood-carpet-coklat-tua.png') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Warnal Coklat Tua</h4>
                            <p class="card-text"><strong>Elegan dan Klasik.</strong> <br>Cocok untuk ruang makan, ruang
                                tamu
                                formal, atau area dengan desain interior klasik.</p>
                            {{-- <h4 class="card-price fw-bold text-end">Rp. 150.000</h4> --}}
                            <div class="d-flex w-100 justify-content-end">
                                <a href="#" class="btn btn-outline-secondary btn-pesan">Detail</a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                </div>

            </div>
        </div>

        <div class="space-wrap-section">
            <div class="wrap-space-section card rounded-4">
                <div class="space-section-img">
                    <img class="rounded-4 w-100" style="height: 450px"
                        src="{{ asset('assets/images/product-img/wood-carpet.jpg') }}" alt="">
                </div>
                <div class="space-section-text title-wood">
                    <span class="title-text-ss text-secondary d-block">Wood Carpet</span>
                    <span class="text-secondary" style="display: flex; width:100%; justify-content: end">Nature,
                        Clasic,
                        and
                        Elegant</span>
                </div>
                <a href="#" class="btn btn-outline-secondary btn-wood">Lihat Harga</a>
            </div>

            <hr style="width: 100%; background-color: black; margin-top: 40px;margin-bottom: 125px; height: 2px">


            <div class="wrap-space-section card rounded-4">
                <div class="space-section-img">
                    <img class="rounded-4 w-100" style="height: 450px"
                        src="{{ asset('assets/images/product-img/webbing-carpet.png') }}" alt="">
                </div>
                <div class="space-section-text title-webbing">
                    <span class="title-text-ss text-white d-block">Webbing Carpet</span>
                    <span class="text-white" style="display: flex; width:100%; justify-content: end">Traditional and
                        Dynamic</span>
                </div>
                <a href="#" class="btn btn-outline-secondary btn-webbing">Lihat Harga</a>
            </div>

            <div class="space-section my-4 d-flex flex-column justify-content-end">
                <span class="text-start fs-1 fw-bold line-height-normal">AL-ZAHRA</span>
                <span class="text-start p-0 m-0 line-height-normal">Menyediakan banyak pilihan ukuran pada setiap produk.
                    <br> <a class="btn btn-outline-dark mt-2 mb-1" href="#">Lihat
                        Katalog</a></span>
                <hr class="align-self-start mt-0" style="border: 1px solid #ccc; width: 40%;">
            </div>
        </div>



        <div class="product-section">
            <div class="promo-wrap">
                <span class="promo-text">Webbing Carpet</span>
                <p class="expalination">Terbuat dari bahan inti
                    rotan yang dianyam secara<br>selang seling dengan
                    warna rotan yang natural dan rotan yang berwarna gelap
                </p>
            </div>

            {{-- card section --}}
            <div class="card-wrap">
                <div class="card-wrap-section">
                    <div class="card" style="width: 18rem;">
                        <img class="img-card" src="{{ asset('assets/images/product-img/webbing-carpet-natural.png') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Warnal Natural</h4>
                            <p class="card-text"><strong>Tradisional dan Terang.</strong> <br>Cocok untuk area yang ingin
                                menonjolkan suasana yang segar dan minimalis.</p>
                            {{-- <h4 class="card-price fw-bold text-end">Rp. 150.000</h4> --}}
                            <div class="d-flex w-100 justify-content-end">
                                <a href="#" class="btn btn-outline-secondary btn-pesan">Detail</a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="card" style="width: 18rem;">
                        <img class="img-card" src="{{ asset('assets/images/product-img/webbing-carpet-motif.png') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Warnal Bermotif</h4>
                            <p class="card-text"><strong>Dinamis.</strong> <br>Cocok untuk menciptakan focal point dalam
                                desain interior.</p>
                            {{-- <h4 class="card-price fw-bold text-end">Rp. 150.000</h4> --}}
                            <div class="d-flex w-100 justify-content-end">
                                <a href="#" class="btn btn-outline-secondary btn-pesan">Detail</a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="card" style="width: 18rem;">
                        <img class="img-card"
                            src="{{ asset('assets/images/product-img/webbing-carpet-coklat-tua.png') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Warnal Coklat Tua</h4>
                            <p class="card-text"><strong>Tradisional.</strong> <br>Menciptakan suasana hangat dan nyaman di
                                ruangan dengan pencahayaan lembut.</p>
                            {{-- <h4 class="card-price fw-bold text-end">Rp. 150.000</h4> --}}
                            <div class="d-flex w-100 justify-content-end">
                                <a href="#" class="btn btn-outline-secondary btn-pesan">Detail</a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                </div>

            </div>
        </div>

        <hr
            style="margin: 0 10px; width: 100%; background-color: black; margin-top: 40px;margin-bottom: 125px; height: 2px">


        <div class="product-section">
            <div class="d-flex justify-content-between w-100">
                <div class="promo-wrap align-self-start">
                    <span class="promo-text w-100 d-flex justify-content-start">Wood Carpet
                        Sungkai</span>
                    <p class="expalination text-start">Terbuat Kayu Sungkai yang merupakan pengganti Kayu
                        Jati<br>Menghasilkan produk yang <strong>Kuat</strong> dan <strong>Awet</strong> dengan mutu kelas
                        tinggi
                    </p>
                </div>

                <div class="space-section d-flex flex-column justify-content-end">
                    <span class="text-end fs-1 fw-bold line-height-normal">AL-ZAHRA</span>
                    <span class="text-end p-0 m-0 line-height-normal">Menyediakan banyak pilihan ukuran pada setiap produk.
                        <br> <a class="btn btn-outline-dark mt-2 mb-1" href="#">Lihat
                            Katalog</a></span>
                    <hr class="align-self-end mt-0" style="border: 1px solid #ccc; width: 100%;">
                </div>
            </div>


            <div class="wood-sungkai-section">
                <div class="position-relative wrap-sungkai wrap-sungkai-polos card rounded-4">
                    <img class="rounded-3 object-fit-fill"
                        src="{{ asset('assets/images/product-img/wood-carpet-sungkai-polos.png') }}" alt="">
                    <span class="sungkai-text">Polos</span>
                </div>
                <div class="position-relative wrap-sungkai wrap-sungkai-motif card rounded-4">
                    <img class="rounded-3" src="{{ asset('assets/images/product-img/wood-carpet-sungkai-motif.jpg') }}"
                        alt="">
                    <span class="sungkai-text">Motif</span>
                </div>
            </div>

        </div>


        {{-- ... --}}

    </div>
@endsection
