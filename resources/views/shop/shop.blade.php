@extends('shop.layouts.app')
@section('title', 'Store')
@section('content')
@include('shop.includes.navbar')

<div class="shop-alzahra-img bg-dark position-relative overflow-hidden" style="margin-bottom: 15vh;">
    <img style="height: 18rem; width: 100vw;" src="{{ asset('assets/images/dummy-images/corousel-1.jpg') }}" alt="">
    <div class="position-absolute w-100 d-flex flex-column align-items-center" style="top: 50%">
        <span class="wel-title ms-2">AL-ZAHRA</span>
        <span class="promo-text ms-2" style="font-style: italic">dapatkan promo menarik setiap tahun!</span>
    </div>
</div>


<div class="content-border">
    <div class="product-card">
        <img src="{{ asset('assets/images/product-img/wood-carpet-sungkai-motif.jpg') }}" alt="Product Image"
            class="product-img">
        <div class="product-info">
            <h3>Product Name</h3>
            <p class="product-price">$Price</p>
            <a href="#" class="btn">Add to Cart</a>
        </div>
    </div>
</div>


@endsection