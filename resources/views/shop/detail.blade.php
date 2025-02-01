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
                    {{-- <img src="{{ Str::startsWith($selected_img['gambar'], 'http') || Str::startsWith($selected_img['gambar'], 'https') ? $$selected_img['gambar'] : asset('storage/' . $$selected_img['gambar']) }}" --}}
                    <img src="{{ asset('storage/' . $produk['gambar']) }}" alt="Gambar Produk" class="card-img-c5"
                        onerror="this.onerror=null; this.src='{{ asset('images/default-product.jpg') }}';" />
                </div>
                <div class="product-details-pdt-dt1">
                    <div class="product-title-pdt-dt1">{{ $varian->produk->nama_produk }}</div>
                    <div id="product-price" class="product-price-pdt-dt1">Rp.
                        {{ number_format($varian->harga, 0, ',', '.') }}</div>
                    <div class="product-description-pdt-dt1">
                        {{ $varian->produk->deskripsi }}
                    </div>
                    <div class="options-pdt-dt1">
                        {{-- <div class="option-group-pdt-dt1">
                            <label for="size-pdt-dt1">Pilih Ukuran:</label>
                            <div class="wrap-uk-detail">
                                @for ($i = 0; $i < 2; $i++)
                                    <a href="#" class="card-uk"> {{ $uk[$i] }} </a>
                                @endfor
                            </div>
                        </div> --}}
                        <div class="option-group-pdt-dt1">
                            <label for="size-pdt-dt1">Pilih Ukuran:</label>
                            <div class="wrap-uk-detail">
                                <select id="size-select" name="size">
                                    @foreach ($ukuran as $v)
                                        <option value="{{ $v->id_varian }}" data-price="{{ $v->harga }}"
                                            data-stock="{{ $v->stok }}">
                                            {{ $v->ukuran }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="option-group-pdt-dt1">
                            <label for="color-pdt-dt1">Pilih Warna:</label>
                            <div class="wrap-warna-detail">
                                {{-- <select id="color-pdt-dt1" name="color">
                                        @foreach ($warna as $w)
                                            <option value="{{ $w->warna }}"
                                                style="background-color: {{ $w->warna }}">
                                                {{ $w->warna }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                @foreach ($result as $r)
                                    {{-- <div class="card-protal-warna" id="selected-portal-warna">
                                        <img class="img-portal-warna" width="70px" src="" alt="gambar-produk">
                                        <span></span>
                                        <p></p>
                                    </div> --}}
                                    <a href="#" class="card-protal-warna" id="selected-portal-warna">
                                        <img class="img-portal-warna" width="70px"
                                            src="{{ asset('storage/' . $r['gambar']) }}" alt="gambar-produk">
                                        <span>{{ $r['warna'] }}</span>
                                        <p>{{ $r['slug'] }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="option-group-pdt-dt1">
                            <label for="color-pdt-dt1">Pilih Warna:</label>
                            <div class="wrap-warna-detail">
                                @foreach ($warna as $w)
                                    <p>{{ $w->warna }}</p>
                                @endforeach
                                @for ($i = 0; $i < 2; $i++)
                                    <a href="#" class="card-warna"
                                        style="background-color: {{ $bg[$i] }}; color: {{ $clr[$i] }}">{{ $wrn[$i] }}</a>
                                @endfor
                            </div>
                        </div> --}}

                        <div class="option-group-pdt-dt1">
                            <label for="quantity">Jumlah:</label>
                            <div class="quantity-container">
                                <button type="button" id="decrease">-</button>
                                <input type="text" id="quantity" value="1">
                                <button type="button" id="increase">+</button>
                                <span>Stok: <strong id="stock-amount">{{ $varian->stok }}</strong></span>
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
    </div>

    <script src="{{ asset('assets/js/shop/detail-page.js') }}"></script>
    <script>
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
    </script>

@endsection
