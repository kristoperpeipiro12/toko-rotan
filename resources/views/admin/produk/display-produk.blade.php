@extends('admin.layout.main')
@section('content')
    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Display Produk</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Display Produk</li>
            </ol>
        </div>

        <div class="col-lg-15">
            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
                    <div class="wrap-btn-atur">
                        <a href="{{ route('admin.produk') }}" class="btn btn-primary mb-1">
                            <i class="fa-solid fa-gear" style="margin-right: 5px;"></i>Atur Produk
                        </a>
                        <a href="{{ route('admin.produk_varian') }}" class="btn btn-info mb-1">
                            <i class="fa-solid fa-gears" style="margin-right: 5px;"></i>Atur Varian
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Input Filter -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <select id="filterNamaProduk" class="form-control">
                                    <option value="">Semua Produk</option>
                                    @foreach ($produk as $p)
                                        <option value="{{ strtolower($p->nama_produk) }}">{{ $p->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="filterWarna" class="form-control">
                                    <option value="">Semua Warna</option>
                                    @foreach ($display_produk as $pv)
                                        <option value="{{ strtolower($pv->warna) }}">{{ $pv->warna }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select id="filterUkuran" class="form-control">
                                    <option value="">Semua Ukuran</option>
                                    @foreach ($display_produk as $pv)
                                        <option value="{{ strtolower($pv->ukuran) }}">{{ $pv->ukuran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table class="table align-items-center table-flush table-hover" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Nama Produk</th>
                                    <th>Deaskripsi</th>
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($display_produk as $pv)
                                    <tr class="produk-row" data-nama="{{ strtolower($pv->produk->nama_produk) }}"
                                        data-warna="{{ strtolower($pv->warna) }}"
                                        data-ukuran="{{ strtolower($pv->ukuran) }}">
                                        <td class="no-urut">{{ $loop->iteration }}</td>
                                        <td>{{ $pv->produk->nama_produk }}</td>
                                        <td>{{ $pv->produk->deskripsi }}</td>
                                        <td>{{ $pv->warna }}</td>
                                        <td>{{ $pv->ukuran }}</td>
                                        <td>Rp {{ number_format($pv->harga, 0, ',', '.') }}</td>
                                        <td>{{ $pv->stok }}</td>
                                        <td>
                                            @if ($pv->gambar)
                                                {{-- Cek apakah gambar berasal dari storage lokal --}}
                                                @if (Str::startsWith($pv->gambar, 'http') || Str::startsWith($pv->gambar, 'https'))
                                                    {{-- Jika gambar adalah URL eksternal --}}
                                                    <img src="{{ $pv->gambar }}" alt="{{ $pv->nama_produk }}"
                                                        width="100">
                                                @else
                                                    {{-- Jika gambar berasal dari storage lokal --}}
                                                    <img src="{{ asset('storage/' . $pv->gambar) }}"
                                                        alt="{{ $pv->nama_produk }}" width="100">
                                                @endif
                                            @else
                                                {{-- Jika tidak ada gambar --}}
                                                <span>Tidak ada gambar</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                function checkIfEmpty() {
                    var visibleRows = $('.produk-row:visible').length;
                    if (visibleRows === 0) {
                        $('#noDataRow').show();
                    } else {
                        $('#noDataRow').hide();
                    }
                }

                function updateRowNumbers() {
                    var index = 1;
                    $('.produk-row:visible').each(function() {
                        $(this).find('.no-urut').text(index);
                        index++;
                    });
                }

                function applyFilters() {
                    var filterNamaProduk = $('#filterNamaProduk').val().toLowerCase();
                    var filterWarna = $('#filterWarna').val().toLowerCase();
                    var filterUkuran = $('#filterUkuran').val().toLowerCase();

                    $('.produk-row').each(function() {
                        var namaProduk = $(this).data('nama');
                        var warna = $(this).data('warna');
                        var ukuran = $(this).data('ukuran');

                        var matchNama = filterNamaProduk === '' || namaProduk === filterNamaProduk;
                        var matchWarna = filterWarna === '' || warna === filterWarna;
                        var matchUkuran = filterUkuran === '' || ukuran === filterUkuran;

                        if (matchNama && matchWarna && matchUkuran) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });

                    checkIfEmpty();
                    updateRowNumbers();
                }

                $('#filterNamaProduk, #filterWarna, #filterUkuran').on('change', function() {
                    applyFilters();
                });

                checkIfEmpty();
            });
        </script>



    </div>
@endsection
