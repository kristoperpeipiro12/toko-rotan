@extends('shop.layouts.app')
@section('title', 'Cart')
@section('content')
    <div class="cart-container">
        <div>
            <h1>ini {{ $slug }}</h1>
            <h1>ini {{ $ukuran }}</h1>
        </div>
        <div class="header-cart">
            <h2 class="cart-title">Keranjang</h2>
            <a href="{{ url()->previous() }}" class="btn"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </div>
        @for ($i = 0; $i < 3; $i++)
            <div class="cart-item">
                <div class="item-header">
                    <input type="checkbox" class="select-all" />
                    <span class="select-all-text">Pilih Semua (1)</span>
                </div>
                <div class="item">
                    <input type="checkbox" class="item-checkbox" />
                    <div class="item-details">
                        <img src="{{ asset('assets/images/product-img/wood-carpet-sungkai-motif.jpg') }}" alt="Item 1"
                            class="item-image" />
                        <div class="item-info">
                            <h3 class="item-title">Wood Carpet Sungkai</h3>
                            <p class="item-description">
                                deskripsi singkat
                            </p>
                            <span class="item-price">Rp63.000</span>
                        </div>
                    </div>
                    <div class="item-actions">
                        <div class="option-group-pdt-dt1 flex-row" style="gap: 1rem">
                            <button class="delete-btn"><i
                                    class="fa-solid fa-trash text-secondary align-self-center"></i></button>
                            {{-- <label for="quantity">Jumlah:</label> --}}
                            <div class="quantity-container">
                                <button type="button" id="decrease">-</button>
                                <input type="text" id="quantity" value="1">
                                <button type="button" id="increase">+</button>
                                <span>Stok: <strong>106</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor

        <!-- Repeat for additional items -->

        <div class="cart-summary">
            <h3 class="summary-title">Ringkasan belanja</h3>
            <p class="summary-text">Pilih barang dulu sebelum pakai promo</p>
            <button class="checkout-btn">Beli</button>
        </div>
    </div>

    <script src="{{ asset('assets/js/shop/detail-page.js') }}"></script>
@endsection
