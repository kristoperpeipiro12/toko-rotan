@extends('shop.layouts.app')
@section('title', 'Detail')
@section('content')
    @include('sweetalert::alert')

    <div class="custom-alert-detail" id="alert-detail">
        <span>Harap pilih ukuran terlebih dahulu!</span>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ukuranItems = document.querySelectorAll(".ukuran-item");
            const selectedSlugInput = document.getElementById("selected_slug");
            const alertDetail = document.getElementById("alert-detail");

            let selectedUkuran = null;

            ukuranItems.forEach(item => {
                item.addEventListener("click", function() {
                    ukuranItems.forEach(uk => uk.classList.remove("active"));
                    this.classList.add("active");

                    selectedSlugInput.value = this.getAttribute("data-slug");
                    selectedUkuran = this.getAttribute("data-slug");
                });
            });

            document.getElementById("form-cart-hidden").addEventListener("submit", function(event) {
                if (!selectedUkuran) {
                    event.preventDefault();
                    alertDetail.classList.add("active");

                    setTimeout(() => {
                        alertDetail.classList.remove("active");
                    }, 3000);
                }
            });
        });
    </script>

    @php
        session()->put('slug_detail', $varian->slug);
    @endphp

    <div class="wrap-detail content-border">
        <div class="container-pdt-dt1">
            <a href="{{ route('shop.shop') }}" class="btn mb-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <div class="product-header-pdt-dt1">
                <div class="product-image-pdt-dt1">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Produk" class="card-img-c5"
                        onerror="this.onerror=null; this.src='{{ asset('images/default-product.jpg') }}';" />
                </div>
                <div class="product-details-pdt-dt1">
                    <div class="product-title-pdt-dt1">{{ $produk->produk->nama_produk }}</div>
                    <div class="product-color-selected-pdt-dt1">{{ $produk->warna }}</div>
                    <div id="product-price" class="product-price-pdt-dt1">Rp.
                        {{ number_format($produk->harga, 0, ',', '.') }}</div>
                    <div class="product-description-pdt-dt1">
                        {{ $produk->produk->deskripsi }}
                    </div>
                    <div class="options-pdt-dt1">
                        <div class="option-group-pdt-dt1">
                            <label for="size-pdt-dt1">Pilih Ukuran:</label>
                            <div class="wrap-uk-detail">
                                @foreach ($ukuran as $uk)
                                    <a href="javascript:void(0)">
                                        <div class="ukuran-item {{ $uk['ukuran'] == $selectedUkuran ? 'active' : '' }}"
                                            data-slug="{{ $uk->slug }}" data-harga="{{ $uk->harga }}"
                                            data-stok="{{ $uk->stok }}">
                                            {{ $uk->ukuran }}
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>


                        <div class="option-group-pdt-dt1">
                            <label for="color-pdt-dt1">Pilih Warna:</label>
                            <div class="wrap-warna-detail">
                                @foreach ($result as $r)
                                    <a href="{{ $r['slug'] }}"
                                        class="card-protal-warna {{ $r['warna'] == $warna_selected ? 'active' : '' }}"
                                        id="selected-portal-warna">
                                        <img class="img-portal-warna" width="70px"
                                            src="{{ asset('storage/' . $r['gambar']) }}" alt="gambar-produk">
                                        <span>{{ $r['warna'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="option-group-pdt-dt1">
                            <label for="quantity">Jumlah:</label>
                            <div class="quantity-container">
                                <button type="button" id="decrease">-</button>
                                <input type="text" id="quantity" value="1">
                                <button type="button" id="increase">+</button>
                                <span>Stok: <strong id="stock-amount">{{ $produk->stok }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <form id="form-cart-hidden" action="{{ route('shop.cart.store') }}" method="POST">
                        @csrf
                        {{-- hidden input --}}
                        <input type="hidden" name="jumlah_pesanan" id="jumlah_pesan">
                        <input type="hidden" name="selected_slug" id="selected_slug">
                        <button type="submit" id="tambah-keranjang"
                            class="text-decoration-none text-center add-to-cart-btn-pdt-dt1">
                            Tambahkan ke Keranjang
                        </button>
                    </form>


                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="{{ asset('assets/js/shop/detail-page.js') }}"></script>
    <script>
        // Kirim slug ke backend
        document.addEventListener("DOMContentLoaded", function() {
            let jumlahPesan = document.getElementById("jumlah_pesan");
            let selectedSlug = document.getElementById("selected_slug");

            document.querySelectorAll(".ukuran-item").forEach(function(item) {
                item.addEventListener("click", function() {
                    let slug = item.getAttribute("data-slug");
                    selectedSlug.value = slug;
                });
            });

            document.querySelector("#tambah-keranjang").addEventListener("click", function() {
                let quantity = document.getElementById("quantity").value;
                jumlahPesan.value = quantity;
            })
        });
    </script>

@endsection
