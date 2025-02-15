@extends('admin.layout.main')
@section('content')
    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
        </div>

        <div class="col-lg-15">
            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
                    <a href="#" class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Tambah
                    </a>
                </div>
                <div class="card-body">

                    <!-- Input Filter -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select id="filterKategori" class="form-control">
                                <option value="">Semua Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ strtolower($k->nama_kategori) }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select id="filterNamaProduk" class="form-control">
                                <option value="">Semua Produk</option>
                                @foreach ($produk as $p)
                                    <option value="{{ strtolower($p->nama_produk) }}">{{ $p->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover" id="example">

                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $p)
                                    <tr class="produk-row">
                                        <td class="no-urut">{{ $loop->iteration }}</td>
                                        <td class="kategori">{{ $p->kategori->nama_kategori }}</td>
                                        <td class="nama-produk">{{ $p->nama_produk }}</td>
                                        <td>{{ $p->deskripsi }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal{{ $p->id_produk }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteProductModal{{ $p->id_produk }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteProductModal{{ $p->id_produk }}" tabindex="-1"
                                        aria-labelledby="deleteProductModalLabel{{ $p->id_produk }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Apakah Anda yakin ingin menghapus produk ini?</strong>
                                                        {{-- <strong>{{ $p->produk->nama_produk }}</strong>? --}}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('admin.produk.delete', $p->id_produk) }}"
                                                        method="POST">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add Produk -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Tambah Data Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data"
                            style="width: 100%">
                            @csrf
                            <!-- Dropdown Kategori -->
                            <div class="mb-3">
                                <label for="id_kategori" class="form-label">Kategori</label>
                                <select class="form-select" id="id_kategori" name="id_kategori" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <!-- Placeholder option -->
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <!-- Nama Produk -->
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                            </div>

                            <!-- Deskripsi Produk -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Desk. Produk</label>
                                {{-- <input type="text" class="form-control" id="deskripsi" name="deskripsi" required> --}}
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" cols="50"></textarea>
                            </div>



                            <!-- Tombol Simpan -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Produk -->
        @foreach ($produk as $p)
            <div class="modal fade" id="editProductModal{{ $p->id_produk }}" tabindex="-1"
                aria-labelledby="editProductModalLabel{{ $p->id_produk }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProductForm{{ $p->id_produk }}"
                                action="{{ route('admin.produk.update', $p->id_produk) }}" method="POST"
                                enctype="multipart/form-data" style="width: 100%">
                                @csrf
                                @method('PUT')

                                <!-- Dropdown Kategori -->
                                <div class="mb-3">
                                    <label for="edit_id_kategori" class="form-label">Kategori</label>
                                    <select class="form-select" id="edit_id_kategori" name="id_kategori" required>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id_kategori }}"
                                                @if ($k->id_kategori == old('id_kategori', $p->id_kategori)) selected @endif>
                                                {{ $k->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Nama Produk -->
                                <div class="mb-3">
                                    <label for="edit_nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk"
                                        value="{{ old('nama_produk', $p->nama_produk) }}" required>
                                </div>
                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="5" cols="50">{{ old('deskripsi', $p->deskripsi) }}</textarea>
                                </div>



                                <!-- Tombol Simpan -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                function checkIfEmpty() {
                    var visibleRows = $('.produk-row:visible').length;
                    $('#noDataRow').toggle(visibleRows === 0);
                }

                function updateRowNumbers() {
                    var index = 1;
                    $('.produk-row:visible').each(function() {
                        $(this).find('.no-urut').text(index);
                        index++;
                    });
                }

                function updateFilterOptions() {
                    var filterKategori = $('#filterKategori').val().toLowerCase();
                    var filterNamaProduk = $('#filterNamaProduk').val().toLowerCase();
                    var kategoriSet = new Set();
                    var produkSet = new Set();

                    $('.produk-row').each(function() {
                        var kategori = $(this).find('.kategori').text().toLowerCase();
                        var produk = $(this).find('.nama-produk').text().toLowerCase();

                        if (filterKategori === '' || kategori === filterKategori) {
                            produkSet.add(produk);
                        }
                        if (filterNamaProduk === '' || produk === filterNamaProduk) {
                            kategoriSet.add(kategori);
                        }
                    });

                    $('#filterKategori').empty().append('<option value="">Semua Kategori</option>');
                    kategoriSet.forEach(kategori => {
                        $('#filterKategori').append(
                            `<option value="${kategori}" ${kategori === filterKategori ? 'selected' : ''}>${kategori}</option>`
                            );
                    });

                    $('#filterNamaProduk').empty().append('<option value="">Semua Produk</option>');
                    produkSet.forEach(produk => {
                        $('#filterNamaProduk').append(
                            `<option value="${produk}" ${produk === filterNamaProduk ? 'selected' : ''}>${produk}</option>`
                            );
                    });
                }

                function applyFilters() {
                    var filterKategori = $('#filterKategori').val().toLowerCase();
                    var filterNamaProduk = $('#filterNamaProduk').val().toLowerCase();

                    $('.produk-row').each(function() {
                        var kategori = $(this).find('.kategori').text().toLowerCase();
                        var namaProduk = $(this).find('.nama-produk').text().toLowerCase();

                        var matchKategori = filterKategori === '' || kategori === filterKategori;
                        var matchNamaProduk = filterNamaProduk === '' || namaProduk === filterNamaProduk;

                        $(this).toggle(matchKategori && matchNamaProduk);
                    });

                    checkIfEmpty();
                    updateRowNumbers();
                    updateFilterOptions();
                }

                $('#filterKategori, #filterNamaProduk').on('input change', function() {
                    applyFilters();
                });

                updateFilterOptions();
                checkIfEmpty();
            });
        </script>

    </div>
@endsection
