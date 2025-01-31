@extends('admin.layout.main')
@section('content')
    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Varian Produk</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Varian Produk</li>
            </ol>
        </div>

        <div class="col-lg-15">
            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Varian Produk</h6>
                    <a href="#" class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="wrap-filter-cus">
                            <div class="wrap-filter-produk">
                                <form action="admin.produk_varian.f_produk" method="POST">
                                    @csrf
                                    <label for="f_id_pro" class="form-label">Filter Produk</label>
                                    <select name="id_produk" id="f_id_pro">
                                        <option value=""></option>
                                        @foreach ($produk as $p)
                                            <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                            <div class="wrap-filter-warna"></div>
                            <div class="wrap-filter-ukuran"></div>
                        </div>
                        <table class="table align-items-center table-flush table-hover" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Nama Produk</th>
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk_varian as $pv)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pv->produk->nama_produk }}</td>
                                        <td>{{ $pv->warna }}</td>
                                        <td>{{ $pv->ukuran }}</td>
                                        <td>Rp {{ number_format($pv->harga, 0, ',', '.') }}</td>

                                        <td>{{ $pv->stok }}</td>
                                        <td>
                                            @if ($pv->gambar)
                                                <img src="{{ asset('storage/' . $pv->gambar) }}"
                                                    alt="{{ $pv->nama_produk }}" width="100">
                                            @else
                                                <span>Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal{{ $pv->id_varian }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteProductModal{{ $pv->id_varian }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteProductModal{{ $pv->id_varian }}" tabindex="-1"
                                        aria-labelledby="deleteProductModalLabel{{ $pv->id_varian }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus varian produk
                                                        <strong>{{ $pv->produk->nama_produk }}</strong>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{ route('admin.produk_varian.delete', $pv->id_varian) }}"
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

        <!-- Modal Add Varian Produk -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Tambah Varian Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="{{ route('admin.produk_varian.store') }}" method="POST"
                            enctype="multipart/form-data" style="width: 100%">
                            @csrf
                            <!-- Dropdown Produk -->
                            <div class="mb-3">
                                <label for="id_produk" class="form-label">Produk</label>
                                <select class="form-select" id="id_produk" name="id_produk" required>
                                    <option value="" disabled selected>Pilih Produk</option>
                                    <!-- Placeholder option -->
                                    @foreach ($produk as $p)
                                        <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Warna -->
                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" id="warna" name="warna" required>
                            </div>

                            <!-- Ukuran -->
                            <div class="mb-3">
                                <label for="ukuran" class="form-label">Ukuran</label>
                                <input type="text" class="form-control" id="ukuran" name="ukuran" required>
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control format-rupiah" id="harga"
                                        name="harga" required>
                                </div>
                            </div>
                            <!-- Stok -->
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" required>
                            </div>


                            <!-- Gambar Produk -->
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" id="gambar" name="gambar"
                                    accept="image/*" onchange="previewImage(event)">
                            </div>

                            <!-- Preview Gambar -->
                            <div class="mb-3 text-center">
                                <img id="preview" src="" alt="Preview Gambar"
                                    style="max-width: 200px; display: none; margin: 0 auto; border-radius: 8px;" />
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
        @foreach ($produk_varian as $pv)
            <div class="modal fade" id="editProductModal{{ $pv->id_varian }}" tabindex="-1"
                aria-labelledby="editProductModalLabel{{ $pv->id_varian }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Varian Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProductForm{{ $pv->id_varian }}"
                                action="{{ route('admin.produk_varian.update', $pv->id_varian) }}" method="POST"
                                enctype="multipart/form-data" style="width: 100%">
                                @csrf
                                @method('PUT')

                                <!-- Dropdown Kategori -->
                                <div class="mb-3">
                                    <label for="edit_id_kategori" class="form-label">Produk</label>
                                    <select class="form-select" id="edit_id_kategori" name="id_produk" required>
                                        @foreach ($produk as $p)
                                            <option value="{{ $p->id_produk }}"
                                                @if ($p->id_produk == old('id_produk', $p->id_produk)) selected @endif>
                                                {{ $p->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Warna -->
                                <div class="mb-3">
                                    <label for="edit_warna" class="form-label">Warna</label>
                                    <input type="text" class="form-control" id="edit_warna" name="warna"
                                        value="{{ old('warna', $pv->warna) }}" required>
                                </div>

                                <!-- Ukuran -->
                                <div class="mb-3">
                                    <label for="edit_ukuran" class="form-label">Ukuran</label>
                                    <input type="text" class="form-control" id="edit_ukuran" name="ukuran"
                                        value="{{ old('ukuran', $pv->ukuran) }}" required>
                                </div>
                                <!-- Harga -->
                                <div class="mb-3">
                                    <label for="edit_harga" class="form-label">Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control format-rupiah" id="edit_harga"
                                            name="harga" value="{{ old('harga', $pv->harga) }}" required>
                                    </div>
                                </div>


                                <!-- Stok -->
                                <div class="mb-3">
                                    <label for="edit_stok" class="form-label">Stok</label>
                                    <input type="number" class="form-control" id="edit_stok" name="stok"
                                        value="{{ old('stok', $pv->stok) }}" required>
                                </div>

                                {{-- gambar --}}
                                <div class="mb-3">
                                    <label for="edit_gambar" class="form-label">Gambar Produk</label>
                                    <input type="file" class="form-control" id="edit_gambar" name="gambar"
                                        accept="image/*" onchange="previewEditImage(event)">
                                </div>

                                <!-- Preview Edit Gambar -->
                                <div class="mb-3 text-center">
                                    <img id="edit_preview" src="" alt="Preview Edit Gambar"
                                        style="max-width: 200px; display: none; margin: 0 auto; border-radius: 8px;" />
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

        <script>
            function previewImage(event) {
                var input = event.target;
                var preview = document.getElementById('preview');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function previewEditImage(event) {
                var input = event.target;
                var preview = document.getElementById('edit_preview');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function formatRupiah(event) {
                let input = event.target;
                let value = input.value.replace(/[^0-9]/g, '');
                let rawValue = parseInt(value, 10);
                if (isNaN(rawValue)) {
                    input.value = '';
                    document.getElementById('harga_raw').value = '';
                    return;
                }

                input.value = rawValue.toLocaleString('id-ID');

                document.getElementById('harga_raw').value = rawValue;
            }

            const hargaInput = document.getElementById('harga');
            hargaInput.addEventListener('input', formatRupiah);

            const editHargaInput = document.getElementById('edit_harga');
            if (editHargaInput) {
                editHargaInput.addEventListener('input', formatRupiah);
            }

            // Stock Validation
            const stokInput = document.getElementById('stok');
            const stokError = document.getElementById('stok-error');

            stokInput.addEventListener('input', function() {
                if (stokInput.value < 0) {
                    stokInput.value = '';
                    stokError.style.display = 'block';
                } else {
                    stokError.style.display = 'none';
                }
            })
        </script>

    </div>
@endsection
