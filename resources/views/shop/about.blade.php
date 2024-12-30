@extends('shop.layouts.app')
@section('title', 'About')
@section('content')
    @include('shop.includes.navbar')
    <div class="shop-alzahra-img bg-dark position-relative overflow-hidden" style="margin-bottom: 5vh;">
        <img style="height: 18rem; width: 100vw;" src="{{ asset('assets/images/about-bg.jpg') }}" alt="">
        <div class="position-absolute w-100 d-flex flex-column align-items-center" style="top: 50%">
            <span class="wel-title ms-2">AL-ZAHRA</span>
            <span class="promo-text ms-2" style="font-style: italic">dapatkan promo menarik setiap tahun!</span>
        </div>
    </div>

@endsection
