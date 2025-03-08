@extends('shop.layouts.app')
@section('title', 'Cart')
@section('content')
    @include('sweetalert::alert')
    <div class="cart-container">
        <div class="header-cart">
            <h2 class="cart-title">Keranjang</h2>
            <a href="{{ route('shop.shop') }}" class="btn">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="item-header mb-2 ps-2">
            <span>Pilih item yang ingin di checkout!</span>
        </div>

        <div class="w-100 d-flex">
            <div class="cart-summary">
                <div class="cart-summary-content">
                    <span>Item yang dipilih:</span>
                    @foreach ($all_cart as $cart)
                        <div data-summary-id="{{ $cart->id_keranjang }}" style="display: none;">
                            <br>
                            <img class="product-summary-image" src="{{ asset('storage/' . $cart->produk_varian->gambar) }}"
                                alt="Gambar Produk">

                            <div class="right-content-summary">
                                <div class="product-summary-name">{{ $cart->produk_varian->produk->nama_produk }}</div>
                                <div class="product-summary-color">Varian / Warna Produk: {{ $cart->produk_varian->warna }}
                                </div>
                                <div class="product-summary-size">Ukuran: {{ $cart->produk_varian->ukuran }}</div>
                                <div class="product-summary-amount">Jumlah Pesanan: {{ $cart->jumlah }}</div>
                                <div class="product-summary-price">Total: Rp.
                                    @php
                                        $keseluruhan = $cart->produk_varian->harga * $cart->jumlah;
                                    @endphp
                                    {{ number_format($keseluruhan, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <a href="{{ route('shop.co') }}/" class="checkout-btn">Beli</a>
                </div>
            </div>

            <div class="d-flex flex-column w-100 ms-5"
                style="background-color:rgb(241, 241, 241); padding: 20px; border-radius: 12px;">
                @foreach ($all_cart as $cart)
                    <div class="cart-item selectable-cart" data-bs-summary="{{ $cart->id_keranjang }}">
                        <div class="item">
                            <input type="radio" name="selected_item" value="{{ $cart->id_keranjang }}"
                                class="item-checkbox" />
                            <div class="item-details">
                                <img src="{{ asset('storage/' . $cart->produk_varian->gambar) }}" alt="Item 1"
                                    class="item-image" />
                                <div class="item-info">
                                    <h3 class="item-title">{{ $cart->produk_varian->produk->nama_produk }}</h3>
                                    <p class="item-description">
                                        {{ $cart->produk_varian->produk->deskripsi }}
                                    </p>
                                    <p class="item-description">
                                        {{ $cart->produk_varian->warna }}
                                    </p>
                                    <p class="item-description">
                                        {{ $cart->produk_varian->ukuran }}
                                    </p>
                                    <span class="item-price">Rp.
                                        {{ number_format($cart->produk_varian->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <div class="item-actions">
                                <div class="option-group-pdt-dt1 flex-row" style="gap: 1rem">
                                    <button class="delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#deleteProductModal{{ $cart->id_keranjang }}"><i
                                            class="fa-solid fa-trash text-secondary align-self-center"></i></button>
                                    <div class="quantity-container">
                                        <input type="text" id="quantity" readonly="true"
                                            value="{{ $cart->jumlah > $cart->produk_varian->stok ? $cart->jumlah == $cart->produk_varian->stok : $cart->jumlah }}">
                                        <span>Stok: <strong>{{ $cart->produk_varian->stok }}</strong></span>
                                        <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editJumlahPemesanan{{ $cart->id_keranjang }}">Ubah Jumlah
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteProductModal{{ $cart->id_keranjang }}" tabindex="-1"
                        aria-labelledby="deleteProductModalLabel{{ $cart->id_keranjang }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus varian produk
                                        <strong>{{ $cart->produk_varian->produk->nama_produk }}</strong>?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <!-- Form penghapusan produk -->
                                    <form method="POST" action="{{ route('shop.cart.delete', $cart->id_keranjang) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>









    </div>


    {{-- modal edit --}}
    @foreach ($all_cart as $cart)
        <div class="modal fade" id="editJumlahPemesanan{{ $cart->id_keranjang }}" tabindex="-1"
            aria-labelledby="editJumlahPemesananLabel{{ $cart->id_keranjang }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Jumlah Pemesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProductForm{{ $cart->id_keranjang }}"
                            action="{{ route('shop.cart.update', $cart->id_keranjang) }}" method="POST"
                            enctype="multipart/form-data" style="width: 100%">
                            @csrf
                            @method('PUT')

                            <!-- nama _kategori -->
                            <div class="mb-3">
                                <label for="edit_nama" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="edit_jumlah" name="jumlah"
                                    value="{{ old('jumlah', $cart->jumlah) }}" required>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        document.querySelectorAll(".selectable-cart").forEach((cart) => {
            cart.addEventListener("click", function() {
                const radioButton = cart.querySelector(".item-checkbox");
                if (radioButton) {
                    const summaryId = cart.getAttribute("data-bs-summary");
                    radioButton.checked = true;
                    updateCartSummary(summaryId);
                }
            });
        });

        function updateCartSummary(summaryId) {
            const summaryContent = document.querySelector(".cart-summary-content");
            const allSummaries = document.querySelectorAll(".cart-summary-content div[data-summary-id]");

            allSummaries.forEach((summary) => {
                summary.style.display = "none";
            });

            const selectedSummary = document.querySelector(`.cart-summary-content div[data-summary-id="${summaryId}"]`);
            if (selectedSummary) {
                selectedSummary.style.display = "block";
            }

            const selectedItemDisplay = document.querySelector("#cart-item-terpilih");
            if (selectedItemDisplay) {
                selectedItemDisplay.textContent = summaryId;
            }
        }
    </script>
    <script src="{{ asset('assets/js/shop/detail-page.js') }}"></script>
@endsection
