<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AL-ZAHRA - Checkout</title>
    <link rel="stylesheet" href="{{ asset('assets/css/shop/style-co.css') }}" />
</head>

<body>
    <div class="co-page">
        <div class="navbar-co"><span class="navbar-brand" id="keluar">AL - ZAHRA</span></div>

        <div class="wrap-container-co">
            <div class="container co-page">
                <header class="header co-page">
                    <h1>Checkout</h1>
                </header>


                <section class="address-section co-page">
                    <div class="section-header co-page">ALAMAT PENGIRIMAN</div>
                    <div class="address-details co-page">
                        <p><strong>Rumah &bull; Charisma Yedutun</strong></p>
                        <p>
                            Jl. Parit H Muksin II, Komp. Star Borneo Residence, No. D16,
                            Sungai Raya, Kab. Kubu Raya, Kalimantan Barat, 6285845177710
                        </p>
                        <span class="change-btn" id="ganti-alamat">Ganti</span>
                    </div>
                </section>

                <div class="checkout-item">
                    <span>Daftar Produk: </span>
                </div>
                @foreach ($cartItems as $item)
                    <section class="order-summary co-page">
                        <div class="section-header co-page" style="font-size: 1.8rem; font-weight: 700;">
                            {{ $item->produk_varian->produk->nama_produk }}
                        </div>
                        <div class="order-item co-page">
                            <img src="storage/{{ $item->produk_varian->gambar }}" alt="Product Image" />
                            <div class="order-info co-page">
                                <h4 style="display: flex; flex-direction: column; gap: 5px; margin-bottom: 15px;">
                                    <span
                                        style="font-size: 1.5rem; font-weight: 300;">{{ $item->produk_varian->warna }}</span>
                                    <span
                                        style="font-style: italic; font-size: 1rem; font-weight: 300;">{{ $item->produk_varian->produk->deskripsi }}</span>
                                </h4>
                                <p>Ukuran: {{ $item->produk_varian->ukuran }}</p>
                                <p class="quantity-price">{{ $item->jumlah }}pcs x Rp.
                                    {{ number_format($item->produk_varian->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </section>
                @endforeach

            </div>

            <div class="container co-page rp-section">
                <section class="rincian-pemesanan">
                    <div class="rp-top-section">
                        <h1 class="header-rincian">Cek ringkasan transaksi!</h1>
                        <div class="ringkasan-row">
                            <span>Total Harga</span>
                            <span class="biaya">Rp. {{ number_format($total_harga, 0, ',', '.') }}</span>
                        </div>

                        <div class="ringkasan-row">
                            <span>Ongkos Kirim</span>
                            <span class="biaya">Rp. {{ number_format($ongkir, 0, ',', '.') }}</span>
                        </div>

                        <span style="font-style: italic; margin-bottom: 10px;">sistem pembayaran COD (Cash On
                            Delivery)</span>
                    </div>

                    <div class="ringkasan-total">
                        <div class="ringkasan-row">
                            <span class="net-total">Total Tagihan</span>
                            <span class="net-total">Rp. {{ number_format($total_tagihan, 0, ',', '.') }}</span>
                        </div>

                        <div class="btn-co-bayar-sekarang">Bayar Sekarang</div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    {{-- pop-up konfimasi keluar --}}
    <div class="wrap-popup-keluar" id="wrap-popup-keluar">
        <div class="pop-up-keluar">
            <span class="header-keluar">Yakin ingin keluar?</span>
            <p class="content-keluar">Jika menutup halaman, proses akan dibatalkan!</p>
            <div class="wrap-btn-keluar">
                <a class="btn-keluar" href="{{ route('shop.cart') }}">Keluar Halaman</a>
                <button class="btn-batal" id="batal">Batal</button>
            </div>
        </div>
    </div>



    {{-- pop-up alamat --}}
    <div class="wrap-popup-co" id="wrap-popup-co">
        <div class="pop-up-co">
            <div class="wrap-title-popup">
                <h1>Pilih Alamat</h1>
                <div class="x-button-co">
                    <i class="fa-solid fa-xmark" id="close-alamat"></i>
                </div>
            </div>
            <div class="container-alamat">
                <div class="header-alamat">Rumah</div>
                <div class="content-alamat">
                    <span>Nama</span>
                    <span>Alamat</span>
                    <span>No. Handphone</span>
                </div>
                <div class="footer-alamat">
                    <p class="btn-ubah-alamat" id="ubah-alamat">Ubah Alamat</p>
                </div>
            </div>
        </div>
    </div>

    {{-- pop-up ubah alamat --}}
    <div class="wrap-popup-ubah" id="wrap-popup-ubah">
        <div class="pop-up-ubah">
            <div class="wrap-content-ubah">
                <div class="header-content-ubah">
                    <h1>Ubah Alamat</h1>
                    <div class="x-button-co">
                        <i class="fa-solid fa-xmark" id="close-ubah"></i>
                    </div>
                </div>
                <label for="lokasi">Tipe Alamat</label>
                <select id="lokasi" name="lokasi" class="dropdown-ttl-pop">
                    <option value="Rumah">Rumah</option>
                    <option value="Kantor">Kantor</option>
                </select>
            </div>

            <div class="wrap-content-ubah">
                <label for="nama">Alamat:</label>
                <input type="text" name="nama" placeholder="Alamat Lengkap" />
            </div>

            <div class="wrap-content-ubah">
                <label for="nama">Nama Penerima:</label>
                <input type="text" name="nama" placeholder="Masukkan Nama Penerima" />
            </div>

            <div class="wrap-content-ubah">
                <label for="nama">No. HP:</label>
                <input type="text" name="nama" placeholder="+ 62" />
            </div>

            <button class="btn-content-ubah">Simpan</button>
        </div>
    </div>

    <script src="{{ asset('assets/js/shop/script-co.js') }}"></script>
    <script src="https://kit.fontawesome.com/b902581f05.js" crossorigin="anonymous"></script>

</body>

</html>
