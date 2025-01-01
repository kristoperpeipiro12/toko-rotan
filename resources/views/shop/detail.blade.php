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
            <a href="{{ route('shop.home') }}" class="btn mb-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <div class="product-header-pdt-dt1">
                <div class="product-image-pdt-dt1">
                    <img src="{{ asset('assets/images/product-img/wood-carpet-sungkai-motif.jpg') }}" alt="Produk Image" />
                </div>
                <div class="product-details-pdt-dt1">
                    <div class="product-title-pdt-dt1">Wood Carpet Sungkai Motif</div>
                    <div class="product-price-pdt-dt1">Rp 1.000.000</div>
                    <div class="product-description-pdt-dt1">
                        Deskripsi singkat tentang produk ini. Dibuat dengan material terbaik
                        dan dirancang untuk kenyamanan Anda.
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
                                <span>Stok: <strong>106</strong></span>
                            </div>
                        </div>
                    </div>
                    <button class="add-to-cart-btn-pdt-dt1">
                        Tambahkan ke Keranjang
                    </button>
                </div>
            </div>
        </div>

    </div>
    <script>
        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');
        const quantityInput = document.getElementById('quantity');
        const maxStock = 106; // Jumlah stok maksimal
        const minStock = 1; // Nilai minimum

        // Fungsi untuk memastikan nilai input tetap dalam rentang yang diizinkan
        function validateInput() {
            let currentValue = parseInt(quantityInput.value, 10);

            // Jika nilai kosong, biarkan sementara
            if (isNaN(currentValue) || currentValue === '') {
                quantityInput.value = '';
                return;
            }

            // Pastikan nilai dalam batas yang diizinkan
            if (currentValue < minStock) {
                quantityInput.value = minStock;
            } else if (currentValue > maxStock) {
                quantityInput.value = maxStock;
            }
        }

        // Klik tombol decrease
        decreaseButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value, 10) || minStock;
            if (currentValue > minStock) {
                quantityInput.value = currentValue - 1;
            }
        });

        // Klik tombol increase
        increaseButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value, 10) || minStock;
            if (currentValue < maxStock) {
                quantityInput.value = currentValue + 1;
            }
        });

        // Ketika pengguna mengetik angka
        quantityInput.addEventListener('input', function() {
            // Hapus karakter non-angka
            this.value = this.value.replace(/[^0-9]/g, '');
            validateInput();
        });

        // Validasi ketika input kehilangan fokus (blur)
        quantityInput.addEventListener('blur', function() {
            validateInput();
            // Jika kosong, kembalikan ke nilai minimal
            if (this.value === '') {
                this.value = minStock;
            }
        });
    </script>
@endsection
