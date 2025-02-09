@extends('shop.layouts.app')
@section('title', 'Detail')
@section('content')
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
                        {{-- <div class="option-group-pdt-dt1">
                            <label for="size-pdt-dt1">Pilih Ukuran:</label>
                            <div class="wrap-uk-detail">
                                @foreach ($ukuran as $uk)
                                    <a href="#" class="ukuran-item {{ $uk->ukuran == $selectedUkuran ? 'active' : '' }}">{{ $uk->ukuran }}</a>
                                @endforeach
                            </div>
                        </div> --}}

                        <div class="option-group-pdt-dt1">
                            <label for="size-pdt-dt1">Pilih Ukuran:</label>
                            <div class="wrap-uk-detail">
                                @foreach ($ukuran as $uk)
                                    <div class="ukuran-item" data-ukuran="{{ $uk->ukuran }}">
                                        {{ $uk->ukuran }}
                                    </div>
                                    {{-- <p>{{ $uk->slug }}</p> --}}
                                @endforeach
                            </div>
                        </div>

                        <div class="option-group-pdt-dt1">
                            <label for="color-pdt-dt1">Pilih Warna:</label>
                            <div class="wrap-warna-detail">
                                @foreach ($result as $r)
                                    <a href="{{ $r['slug'] }}" class="card-protal-warna" id="selected-portal-warna">
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
                    <form action="" method="POST">
                        {{-- hidden input --}}
                        <input type="hidden" name="selected_ukuran" id="selected_ukuran">
                        <input type="hidden" name="selected_slug" id="selected_slug">
                        <button type="submit" class="text-decoration-none text-center add-to-cart-btn-pdt-dt1">
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
        // Ambil semua elemen ukuran
        const ukuranItems = document.querySelectorAll('.ukuran-item');

        // Tambahkan event listener untuk setiap elemen
        ukuranItems.forEach(item => {
            item.addEventListener('click', function() {
                // Hapus class active dari semua elemen
                ukuranItems.forEach(i => i.classList.remove('active'));

                // Tambahkan class active pada elemen yang diklik
                this.classList.add('active');
            });
        });

        document.getElementById('size-select').addEventListener('change', function() {
            // Get the selected option
            var selectedOption = this.options[this.selectedIndex];

            // Get the price and stock from the selected option's data-price and data-stock attributes
            var newPrice = selectedOption.getAttribute('data-price');
            var newStock = selectedOption.getAttribute('data-stock');

            // Update the price and stock display
            document.getElementById('product-price').innerHTML = 'Rp. ' + newPrice.toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById('stock-amount').innerText = newStock;

            // Update stock input value for quantity
            var quantityInput = document.getElementById('quantity');
            if (parseInt(quantityInput.value) > newStock) {
                quantityInput.value = newStock;
            }
        });

        document.getElementById('increase').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            var stockAmount = parseInt(document.getElementById('stock-amount').innerText);

            if (parseInt(quantityInput.value) < stockAmount) {
                quantityInput.value = parseInt(quantityInput.value) + 1;
            }
        });

        document.getElementById('decrease').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');

            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });

        // Kirim ukuran ke backend
        document.addEventListener("DOMContentLoaded", function() {
            let selectedUkuran = document.getElementById("selected_ukuran");
            let selectedSlug = document.getElementById("selected_slug");

            document.querySelectorAll(".ukuran-item").forEach(function(item) {
                item.addEventListener("click", function() {
                    let ukuran = item.getAttribute("data-ukuran");
                    let slug = item.getAttribute("data-slug");

                    selectedUkuran.value = ukuran;
                    selectedSlug.value = slug;
                });
            });
        });
    </script>

@endsection
