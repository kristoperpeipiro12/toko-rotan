@extends('shop.layouts.app')
@section('title', 'Shop')
@section('content')
    @include('shop.includes.navbar')

    <div class="shop-alzahra-img bg-dark position-relative overflow-hidden" style="margin-bottom: 5vh;">
        <img style="height: 18rem; width: 100vw;" src="{{ asset('assets/images/dummy-images/shop-bg.jpg') }}" alt="">
        <div class="position-absolute w-100 d-flex flex-column align-items-center" style="top: 50%">
            <span class="wel-title ms-2">AL-ZAHRA</span>
            <span class="promo-text ms-2" style="font-style: italic; color:white; font-weight: 700">menggabungkan sentuhan
                tradisional dengan
                gaya modern
                yang fungsional</span>
        </div>
    </div>


    <div class="px-5 py-2">
        <div class="d-flex w-100 justify-content-center flex-wrap"
            style="column-gap: 4rem ;row-gap: 3rem; margin-bottom: 3.8rem">
            @for ($i = 0; $i < 8; $i++)
                <a href="{{ route('shop.detail') }}" class="card5-cus">
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
                        <div class="wrap-foot-c5">
                            <span class="price-c5">Rp. 1.000.000</span>
                            <i class="fa-solid fa-cart-plus foot-icon-c5"></i>
                        </div>
                    </div>
                </a>
            @endfor
        </div>

        <div class="d-flex justify-content-center" style="gap: 2rem; margin-bottom: 5rem">
            <a href="#" class="one-shop">1</a>
            <a href="#" class="two-shop">2</a>
            <a href="#" class="next-shop"><i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    {{-- Footer Section --}}
    @include('shop.includes.footer')
    {{-- .... --}}


@endsection
