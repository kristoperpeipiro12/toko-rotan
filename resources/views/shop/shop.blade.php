@extends('shop.layouts.app')
@section('title', 'Store')
@section('content')
    @include('shop.includes.navbar')

    <div class="shop-alzahra-img bg-dark position-relative overflow-hidden" style="margin-bottom: 15vh;">
        <img style="height: 18rem; width: 100vw;" src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}"
            alt="">
        <div class="position-absolute w-100 d-flex flex-column align-items-center" style="top: 50%">
            <span class="wel-title ms-2">AL-ZAHRA</span>
            <span class="promo-text ms-2" style="font-style: italic">dapatkan promo menarik setiap tahun!</span>
        </div>
    </div>


    <div class="content-border">
        <div class="d-flex w-100 justify-content-between flex-wrap" style="row-gap: 16px; margin-bottom: 16px">
            {{-- satu container di atas comment ini hanya dapat menampung max 4 card dalam 1 baris
            (sudah relaif terhadap perubahan ukuran layar!) --}}
            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex w-100 justify-content-between flex-wrap" style="row-gap: 16px; margin-bottom: 16px">
            {{-- satu container di atas comment ini hanya dapat menampung max 4 card dalam 1 baris
            (sudah relaif terhadap perubahan ukuran layar!) --}}
            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

            <div class="card5-cus">
                <div class="wrap-main-c5">
                    <div class="wrap-img-c5">
                        <img src="{{ asset('assets/images/dummy-images/corousel-3.jpg') }}" alt=""
                            class="card-img-c5" />
                        <span class="promo-c5">-50%</span>
                    </div>
                    <span class="product-name-c5">Tikar Rotan Ajiro</span>
                    <span class="category-c5">Coklat Muda</span>
                </div>

                <div class="foot-content-c5">
                    <span class="price-c5">Rp. 1.000.000</span>
                    <div class="wrap-foot-c5">
                        <i class="fa-regular fa-heart foot-icon-c5"></i>
                        <button class="add-c5 btn btn-outline-dark">Keranjang</button>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
