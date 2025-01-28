<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>AL-ZAHRA - Akun</title>
    <link rel="stylesheet" href="{{ asset('assets/css/shop/sidebar-cus1.css') }}" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- my style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/shop/account-page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop/cus-cn1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop/all-popup-account.css') }}">
</head>

<body style="position: relative">
    @include('shop.account.pop-up.pop-up-account')
    @include('shop.includes.sidebar-user')
    <section class="home-section">
        <div class="text">Akun Saya</div>
        <div class="kembali-account">
            <a href="{{ route('shop.home') }}">
                <i class='bx bx-left-arrow-alt'></i>
                Kembali</a>
        </div>
        <div class="card-container-cus-cn1">
            <div class="nav-tabs-cus-cn1">
                <div class="nav-tab-cus-cn1 active-cus-cn1" data-target="biodata">Biodata Diri</div>
                <div class="nav-tab-cus-cn1" data-target="alamat">Daftar Alamat</div>
                {{-- <div class="nav-tab-cus-cn1" data-target="pembayaran">Pembayaran</div>
                <div class="nav-tab-cus-cn1" data-target="rekening">Rekening Bank</div>
                <div class="nav-tab-cus-cn1" data-target="notifikasi">Notifikasi</div>
                <div class="nav-tab-cus-cn1" data-target="tampilan">Mode Tampilan</div>
                <div class="nav-tab-cus-cn1" data-target="keamanan">Keamanan</div> --}}
            </div>

            <div class="card-content-cus-cn1 active-cus-cn1" id="biodata">
                <div class="res-bio-content">
                    <!-- Foto dan Upload -->
                    <div class="res-bio-photo-section">
                        <div class="card-bio-cus">
                            <img class="img-bio-cus" src="{{ asset('assets/images/dummy-images/none.jpg') }}"
                                alt="">
                            <button class="btn-pilih">Pilih Foto</button>
                            <span class="text-justify">Besar file: maksimum 10.000.000 bytes (10 Megabytes).
                                Ekstensi
                                file yang
                                diperbolehkan: .JPG .JPEG .PNG</span>
                        </div>
                    </div>

                    <!-- Biodata -->
                    <div class="res-bio-biodata-section">
                        <h3>Ubah Biodata Diri</h3>
                        <div class="res-bio-group">
                            <span>Nama:</span>
                            Hans
                        </div>
                        <div class="res-bio-group">
                            <span>Tanggal Lahir:</span>
                            <p id="openAccModal" data-content="content-1">Tambah Tanggal Lahir</p>
                        </div>
                        <div class="res-bio-group">
                            <span>Jenis Kelamin:</span>
                            <p id="openAccModal" data-content="content-2">Tambah Jenis Kelamin</p>
                        </div>
                        <h3>Ubah Kontak</h3>
                        <div class="res-bio-group">
                            <span>Email:</span>
                            hans@gmail.com (Terverifikasi)
                        </div>
                        <div class="res-bio-group">
                            <span>Nomor HP:</span>
                            0812 3456 7891 (Terverifikasi)
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-content-cus-cn1" id="alamat">
                <div class="container-bio-almt">
                    <div class="header-bio-almt">
                        <div class="title-bio-almt">Rumah</div>
                    </div>
                    <div class="content-bio-almt">
                        <strong>Charisma Yedutun</strong><br>
                        6285845177710<br>
                        Jl. Parit H Muksin II, Komp. Star Borneo Residence, No. D16
                    </div>
                    <div class="footer-bio-almt">
                        <div class="actions-bio-almt">
                            <p class="edit-bio-almt" id="openAccModal" data-content="content-3">Ubah Alamat</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="card-content-cus-cn1" id="pembayaran">
                <p>Informasi pembayaran Anda akan ditampilkan di sini.</p>
            </div>

            <div class="card-content-cus-cn1" id="rekening">
                <p>Informasi rekening bank Anda akan ditampilkan di sini.</p>
            </div>

            <div class="card-content-cus-cn1" id="notifikasi">
                <p>Pengaturan notifikasi Anda akan ditampilkan di sini.</p>
            </div>

            <div class="card-content-cus-cn1" id="tampilan">
                <p>Pengaturan mode tampilan Anda akan ditampilkan di sini.</p>
            </div>

            <div class="card-content-cus-cn1" id="keamanan">
                <p>Pengaturan keamanan Anda akan ditampilkan di sini.</p>
            </div> --}}
        </div>
    </section>

    <script src="{{ asset('assets/js/shop/sidebar-cus1.js') }}"></script>
    <script src="{{ asset('assets/js/shop/cus-cn1.js') }}"></script>
    <script src="{{ asset('assets/js/shop/all-popup-account.js') }}"></script>
</body>

</html>
