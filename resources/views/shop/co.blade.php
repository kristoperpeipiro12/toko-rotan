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
            <div class="container co-page summary-section">
                <header class="header co-page">
                    <h1>Checkout</h1>
                </header>

                <section class="address-section co-page">
                    <div class="section-header co-page">ALAMAT PENGIRIMAN</div>
                    <div class="address-details co-page" id="alamat-terpilih">
                        @if ($penerima)
                            <p><strong id="alamat-lokasi">{{ $penerima->lokasi }} &bull;
                                    {{ $penerima->nama_penerima }}</strong></p>
                            <p id="alamat-detail">
                                {{ $penerima->alamat }}, {{ $penerima->nohp_penerima }}
                            </p>
                            <span class="change-btn" id="ganti-alamat">Ganti</span>
                        @else
                            <p id="alamat-kosong">Alamat belum ada</p>
                            <button id="btn-tambah">Tambah</button>
                        @endif
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

                        <form action="{{ route('send.order.confirmation') }}" method="POST">
                            @csrf
                            <div class="btn-co-bayar-sekarang">
                                <button type="submit" style="background: none; border: none; cursor: pointer;">Bayar
                                    Sekarang</button>
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>

    {{-- pop-up konfimasi keluar --}}
    <div class="wrap-popup-keluar" id="wrap-popup-keluar">
        <div class="pop-up-keluar">
            <span class="header-keluar">Yakin ingin keluar?</span>
            <p class="content-keluar">Jika menutup halaman, proses<br>akan dibatalkan!</p>
            <div class="wrap-btn-keluar">
                <button class="btn-batal" id="batal">Tetap Di Halaman Ini</button>
                <a class="btn-keluar" href="{{ route('shop.cart') }}">Keluar & Hapus Perubahan</a>
            </div>
        </div>
    </div>



    {{-- Pop-up Pilih Alamat --}}
    <div class="wrap-popup-co" id="wrap-popup-co">
        <div class="pop-up-co">
            <div class="wrap-title-popup">
                <h1>Pilih Alamat</h1>
                <div class="x-button-co">
                    <i class="fa-solid fa-xmark" id="close-alamat"></i>
                </div>
            </div>

            <form id="formPilihAlamat">
                @foreach ($alamat as $pn)
                    <div class="container-alamat">
                        <input type="radio" name="pilih_alamat" value="{{ $pn->id_penerima }}"
                            data-lokasi="{{ $pn->lokasi }}" data-nama="{{ $pn->nama_penerima }}"
                            data-alamat="{{ $pn->alamat }}" data-nohp="{{ $pn->nohp_penerima }}"
                            style="display: inline; background-color: aqua;" />
                        <div class="bg-primary d-flex flex-column">
                            <label>
                                <div class="header-alamat">{{ $pn->lokasi }}</div>
                                <div class="content-alamat">
                                    <span>Nama : {{ $pn->nama_penerima }}</span>
                                    <span>Alamat : {{ $pn->alamat }}</span>
                                    <span>No. Handphone : {{ $pn->nohp_penerima }}</span>
                                </div>
                            </label>
                            <p class="btn-ubah-alamat" role="button" tabindex="0" data-id="{{ $pn->id_penerima }}"
                                data-lokasi="{{ $pn->lokasi }}" data-alamat="{{ $pn->alamat }}"
                                data-nama="{{ $pn->nama_penerima }}" data-nohp="{{ $pn->nohp_penerima }}">
                                Ubah Alamat
                            </p>
                        </div>


                    </div>
                @endforeach
            </form>
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

                <form id="updateAlamatForm" method="POST" action="{{ route('cs.update.alamatco') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id_penerima" name="id_penerima">

                    <label for="lokasi">Tipe Alamat</label>
                    <select id="lokasi" name="lokasi" class="dropdown-ttl-pop">
                        <option value="Rumah">Rumah</option>
                        <option value="Kantor">Kantor</option>
                    </select>

                    <div class="wrap-content-ubah">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat Lengkap" required />
                    </div>

                    <div class="wrap-content-ubah">
                        <label for="nama_penerima">Nama Penerima:</label>
                        <input type="text" id="nama_penerima" name="nama_penerima"
                            placeholder="Masukkan Nama Penerima" required />
                    </div>

                    <div class="wrap-content-ubah">
                        <label for="nohp_penerima">No. HP:</label>
                        <input type="text" id="nohp_penerima" name="nohp_penerima" placeholder="+62" required />
                    </div>

                    <button type="submit" class="btn-content-ubah">Simpan</button>
                </form>
            </div>
        </div>
    </div>





    <script src="{{ asset('assets/js/shop/script-co.js') }}"></script>
    <script src="{{ asset('assets/js/shop/ubah_alamat.js') }}"></script>
    <script src="https://kit.fontawesome.com/b902581f05.js" crossorigin="anonymous"></script>

    <script>
        document.querySelectorAll('input[name="pilih_alamat"]').forEach((radio) => {
            radio.addEventListener("change", function() {
                let lokasi = this.dataset.lokasi;
                let nama = this.dataset.nama;
                let alamat = this.dataset.alamat;
                let nohp = this.dataset.nohp;

                // Update tampilan alamat
                document.getElementById("alamat-lokasi").innerHTML = `${lokasi} • ${nama}`;
                document.getElementById("alamat-detail").innerHTML = `${alamat}, ${nohp}`;

                let alamatKosong = document.getElementById("alamat-kosong");
                if (alamatKosong) {
                    alamatKosong.style.display = "none";
                }

                document.getElementById("wrap-popup-co").style.display = "none";
            });
        });

        document.getElementById("ganti-alamat").addEventListener("click", function() {
            document.getElementById("wrap-popup-co").style.display = "flex";
        });
        document.getElementById("close-alamat").addEventListener("click", function() {
            document.getElementById("wrap-popup-co").style.display = "none";
        });
    </script>
    <script>
        document.getElementById("btn-tambah").addEventListener("click", function() {
            window.location.href = "{{ route('cs.account') }}";
        });
    </script>
</body>

</html>
