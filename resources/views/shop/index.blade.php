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
            <div class="carousel-inner">
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
                        <h2 class="fw-bold" style="color: #633c04;">Tappéto</h2>
                        <p style="color: #633c04; font-wight: 700">Merupakan karpet dengan harga yang paling terjangkau --
                            <strong class="underline-custom" style="text-decoration-color: #633c04;">Economical!</strong>
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
        <div class="row">
            <div class="col-4 bg-body">
                <div id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy text-center">
                    <a class="p-1 rounded" href="#simple-list-item-1">Item 1</a>
                    <a class="p-1 rounded" href="#simple-list-item-2">Item 2</a>
                    <a class="p-1 rounded" href="#simple-list-item-3">Item 3</a>
                    <a class="p-1 rounded" href="#simple-list-item-4">Item 4</a>
                    <a class="p-1 rounded" href="#simple-list-item-5">Item 5</a>
                </div>
            </div>
            <div class="col-8">
                <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0"
                    data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/wood-carpet.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Wood Carpet</h5>
                            <p class="card-text">Terbuat dari bahan panel
                                plywood yang dilapis dengan kayu oak
                                tipis yang kemudian dibacking dengan
                                canvas cotton pada bagian alas karpet.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                    {{-- ... --}}
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/wood-carpet.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Wood Carpet</h5>
                            <p class="card-text">Terbuat dari bahan panel
                                plywood yang dilapis dengan kayu oak
                                tipis yang kemudian dibacking dengan
                                canvas cotton pada bagian alas karpet.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                    <h4 id="simple-list-item-2">Item 2</h4>
                    <p>...</p>
                    <h4 id="simple-list-item-3">Item 3</h4>
                    <p>...</p>
                    <h4 id="simple-list-item-4">Item 4</h4>
                    <p>...</p>
                    <h4 id="simple-list-item-5">Item 5</h4>
                    <p>...</p>
                </div>
            </div>
        </div>
        {{-- ... --}}

    </div>
@endsection
