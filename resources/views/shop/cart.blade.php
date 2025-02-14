@extends('shop.layouts.app')
@section('title', 'Cart')
@section('content')
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
        @foreach ($all_cart as $cart)
            <form action="" method="POST">
                <div class="cart-item">
                    <div class="item">
                        <input type="checkbox" class="item-checkbox" />
                        <div class="item-details">
                            <img src="{{ asset('storage/' . $cart->produk_varian->gambar) }}" alt="Item 1"
                                class="item-image" />
                            <div class="item-info">
                                <h3 class="item-title">{{ $cart->produk_varian->produk->nama_produk }}</h3>
                                <p class="item-description">
                                    {{ $cart->produk_varian->produk->deskripsi }}
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
                                {{-- <label for="quantity">Jumlah:</label> --}}
                                <div class="quantity-container">
                                    <button type="button" id="decrease">-</button>
                                    <input type="text" id="quantity"
                                        value="{{ $cart->jumlah > $cart->produk_varian->stok ? $cart->jumlah == $cart->produk_varian->stok : $cart->jumlah }}">
                                    <button type="button" id="increase">+</button>
                                    <span>Stok: <strong>{{ $cart->produk_varian->stok }}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal Delete -->
            <div class="modal fade" id="deleteProductModal{{ $cart->id_keranjang }}" tabindex="-1"
                aria-labelledby="deleteProductModalLabel{{ $cart->id_keranjang }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus varian produk
                                <strong>{{ $cart->produk_varian->produk->nama_produk }}</strong>?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('shop.cart.delete', $cart->id_keranjang) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Repeat for additional items -->

        <div class="cart-summary">
            <h3 class="summary-title">Ringkasan belanja</h3>
            <p class="summary-text">Pilih barang dulu sebelum pakai promo</p>
            <button class="checkout-btn">Beli</button>
        </div>
    </div>



    <script src="{{ asset('assets/js/shop/detail-page.js') }}"></script>
@endsection
