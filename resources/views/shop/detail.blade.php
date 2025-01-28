@extends('shop.layouts.app')
@section('title', 'Detail')
@section('content')
    <?php
    $bg = ['#402c24', '#b89464']; // warna bg
    $clr = ['white', 'white']; // warna text
    $wrn = ['Motif', 'Polos']; // deskripsi warna
    $uk = ['140 cm x 200 cm', '175 cm x 250 cm']; // ukuran produk
    
    ?>
    {{-- @include('shop.includes.navbar') --}}
    <div class="wrap-detail content-border">
        <div class="container-pdt-dt1">
            <a href="{{ route('shop.shop') }}" class="btn mb-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <div class="product-header-pdt-dt1">
                <div class="product-image-pdt-dt1">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Produk Image" />
                </div>
                <div class="product-details-pdt-dt1">
                    <div class="product-title-pdt-dt1">{{ $produk->nama_produk }}</div>
                    <div class="product-price-pdt-dt1">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</div>
                    <div class="product-description-pdt-dt1">
                        {{ $produk->deskripsi }}
                    </div>
                    <div class="options-pdt-dt1">
                        <div class="option-group-pdt-dt1">
                            <label for="size-pdt-dt1">Pilih Ukuran:</label>
                            <div class="wrap-uk-detail">
                                @for ($i = 0; $i < 2; $i++)
                                    <a href="#" class="card-uk"> {{ $uk[$i] }} </a>
                                @endfor
                            </div>
                        </div>
                        <div class="option-group-pdt-dt1">
                            <label for="color-pdt-dt1">Pilih Warna:</label>
                            <div class="wrap-warna-detail">
                                @for ($i = 0; $i < 2; $i++)
                                    <a href="#" class="card-warna"
                                        style="background-color: {{ $bg[$i] }}; color: {{ $clr[$i] }}">{{ $wrn[$i] }}</a>
                                @endfor
                            </div>
                        </div>
                        <div class="option-group-pdt-dt1">
                            <label for="quantity">Jumlah:</label>
                            <div class="quantity-container">
                                <button type="button" id="decrease">-</button>
                                <input type="text" id="quantity" value="1">
                                <button type="button" id="increase">+</button>
                                <span>Stok: <strong>{{ $produk->stok }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('shop.cart') }}" class="text-decoration-none text-center add-to-cart-btn-pdt-dt1">
                        Tambahkan ke Keranjang
                    </a>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets/js/shop/detail-page.js') }}"></script>
@endsection
