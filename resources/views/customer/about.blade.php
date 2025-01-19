@extends('customer.layouts.app')
@section('title', 'About')
@section('content')
    @include('customer.includes.navbar')
    <div class="shop-alzahra-img bg-dark position-relative overflow-hidden" style="margin-bottom: 5vh;">
        <img style="height: 18rem; width: 100vw;" src="{{ asset('assets/images/about-bg.jpg') }}" alt="">
        <div class="position-absolute w-100 d-flex flex-column align-items-center" style="top: 50%">
            <span class="wel-title ms-2">AL-ZAHRA</span>
            <span class="promo-text ms-2" style="font-style: italic; font-weight: bold; color: white;">Tentang Kami</span>
        </div>
    </div>

    <div class="wrap-content-ab content-border">
        <img class="img-ab" src="{{ asset('assets/images/dummy-images/welcome-img.jpg') }}" alt="">
        <div class="about-us-1">
            <span class="title-ab">Who We Are</span>
            <span class="content-ab" style="">Kami adalah ahli dalam menghadirkan kehangatan dan
                keindahan alami ke rumah Anda.
                Spesialis produk retail seperti karpet rotan, kerai bambu, kursi, sekat ruangan, hingga kerajinan rotan
                lainnya, kami menggabungkan sentuhan tradisional dengan gaya modern yang fungsional.</span>
            <span class="content-ab">Setiap produk kami adalah karya penuh makna, dirancang untuk menciptakan suasana
                nyaman,
                estetik, dan ramah lingkungan. Di Toko Al-Zahra, keindahan bukan hanya dekorasi, tapi cara menyatu dengan
                hidup Anda.</span>
            <span class="content-ab" style="margin-bottom: 0px">Download Katalog Kami di <a
                    href="{{ route('download.katalog') }}">sini</a></span>
        </div>
    </div>

    {{-- Footer Section --}}
    @include('customer.includes.footer')
    {{-- .... --}}

@endsection
