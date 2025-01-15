@extends('admin.layout.main')
@section('content')
    <script>
        $(document).ready(function() {
            var datetime = new Date();
            var tanggalHariIni = datetime.getDate() + '-' + datetime.getMonth() + '-' + datetime
                .getFullYear();
            var waktuHariIni = datetime.getHours() + ':' + datetime.getMinutes() + ':' + datetime
                .getSeconds();

            var table = $('#dataTable').DataTable({
                "paging": true,
                "responsive": false,
                "searching": true,
                "deferRender": true,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, -1],
                    ['10', '25', '50', '100', '500', 'Semua']
                ],
                "dom": '<"d-block d-lg-flex justify-content-between"lf<"btn btn-sm"B>r>t<"d-block d-lg-flex justify-content-between"ip>',
                "buttons": [{
                        extend: 'excelHtml5',
                        filename: 'Data Siswa - SD Kristen Pelita Hati - update ' +
                            tanggalHariIni,
                        text: 'XLSX',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            stripHtml: true,
                            modifier: {
                                page: 'current'
                            }
                        }
                    }, {
                        extend: 'pdfHtml5',
                        filename: 'Data Siswa - SD Kristen Pelita Hati - update ' +
                            tanggalHariIni,
                        text: 'PDF',
                        message: 'Data Siswa - SD Kristen Pelita Hati',
                        messageBottom: 'Data dibuat otomatis oleh sistem : ' +
                            tanggalHariIni + ' ' + waktuHariIni + ' WIB',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            stripHtml: true,
                            modifier: {
                                page: 'current'
                            }
                        },
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        customize: function(doc) {
                            doc.pageMargins = [20, 20, 20, 20];
                            doc.defaultStyle.fontSize = 10;
                            doc.styles.tableHeader.fontSize = 10;
                            doc.styles.title.fontSize = 14;
                            doc.content[0].text = doc.content[0].text.trim();
                            doc['footer'] = (function(page, pages) {
                                return {
                                    columns: [
                                        'Data Siswa - SD Kristen Pelita Hati', {
                                            alignment: 'right',
                                            text: ['Page ', {
                                                text: page
                                                    .toString()
                                            }, ' of ', {
                                                text: pages
                                                    .toString()
                                            }]
                                        }
                                    ],
                                    margin: [10, 0]
                                }
                            });
                            var objLayout = {};
                            objLayout['hLineWidth'] = function(i) {
                                return .5;
                            };
                            objLayout['vLineWidth'] = function(i) {
                                return .5;
                            };
                            objLayout['hLineColor'] = function(i) {
                                return '#aaa';
                            };
                            objLayout['vLineColor'] = function(i) {
                                return '#aaa';
                            };
                            objLayout['paddingLeft'] = function(i) {
                                return 4;
                            };
                            objLayout['paddingRight'] = function(i) {
                                return 4;
                            };
                            doc.content[1].layout = objLayout;
                        }
                    },

                ],
                "language": {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json'
                },
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [
                    [1, 'asc']
                ]

            });

            table.on('order.dt search.dt', function() {
                table.column(0, {
                    order: 'applied',
                    search: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>

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
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Kategori</th>
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
                                @foreach ($produk as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->kategori->nama_kategori }}</td>
                                        <td>{{ $p->nama_produk }}</td>
                                        <td>{{ $p->warna }}</td>
                                        <td>{{ $p->ukuran }}</td>
                                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                        <td>{{ $p->stok }}</td>
                                        <td>
                                            @if ($p->gambar)
                                                <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama_produk }}"
                                                    width="100">
                                            @else
                                                <span>Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal{{ $p->id_produk }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Tombol Delete -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteProductModal{{ $p->id_produk }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

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
                                                    <p>Apakah Anda yakin ingin menghapus produk
                                                        <strong>{{ $p->nama_produk }}</strong>?
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


        <!-- Modal add Form -->
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
                    <div class="modal-body modal-content">
                        <form id="addProductForm" action="{{ route('admin.produk.store') }}" method="POST"
                            enctype="multipart/form-data" style="width: 100%">
                            @csrf
                            <!-- Dropdown Kategori -->
                            <div class="mb-3">
                                <label for="id_kategori" class="form-label">Kategori</label>
                                <select class="form-select" id="id_kategori" name="id_kategori" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
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
                                    <input type="text" class="form-control" id="harga" name="harga" required
                                        placeholder="0">
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
                                    accept="image/*" onchange="previewImage(event)" required>
                            </div>

                            <!-- Preview Gambar -->
                            <div class="mb-3 d-flex justify-content-center align-items-center">
                                <img id="imagePreview" src="#" alt="Preview Gambar"
                                    style="max-width: 200px; display: none; border-radius: 8px;" />
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div class="modal fade" id="editProductModal{{ $p->id_produk }}" tabindex="-1"
            aria-labelledby="editProductModalLabel{{ $p->id_produk }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-content">
                        <form action="{{ route('admin.produk.update', $p->id_produk) }}" method="POST" style="width: 100%"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Dropdown Kategori -->
                            <div class="mb-3">
                                <label for="edit_id_kategori" class="form-label">Kategori</label>
                                <select class="form-control" name="id_kategori" required>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id_kategori }}"
                                            {{ $p->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                                            {{ $k->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nama Produk -->
                            <div class="mb-3">
                                <label for="edit_nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk"
                                    value="{{ $p->nama_produk }}" required>
                            </div>

                            <!-- Warna -->
                            <div class="mb-3">
                                <label for="edit_warna" class="form-label">Warna</label>
                                <input type="text" class="form-control" name="warna" value="{{ $p->warna }}">
                            </div>

                            <!-- Ukuran -->
                            <div class="mb-3">
                                <label for="edit_ukuran" class="form-label">Ukuran</label>
                                <input type="text" class="form-control" name="ukuran" value="{{ $p->ukuran }}">
                            </div>

                            {{-- Harga --}}
                            <div class="mb-3">
                                <label for="edit_harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="harga" name="harga"
                                        value="{{ number_format($p->harga, 0, ',', '.') }}" required
                                        oninput="formatHarga(this)" onblur="clearFormatHarga(this)">
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="mb-3">
                                <label for="edit_stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok" value="{{ $p->stok }}"
                                    required>
                            </div>

                            <!-- Gambar Produk -->
                            <div class="mb-3">
                                <label for="edit_gambar" class="form-label">Gambar Produk</label>
                                <input type="file" class="form-control" name="gambar" accept="image/*">
                                @if ($p->gambar)
                                    <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama_produk }}"
                                        width="100" class="mt-2">
                                @endif
                            </div>

                            <!-- Tombol Simpan dan Batal -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('imagePreview');
                    output.src = reader.result;
                    output.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            }

            const hargaInput = document.getElementById('harga');

            hargaInput.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, '');
                value = new Intl.NumberFormat('id-ID').format(value);
                this.value = value;
            });

            // Saat submit, ubah format Rp ke angka biasa
            const form = document.querySelector('form');
            form.addEventListener('submit', function() {
                hargaInput.value = hargaInput.value.replace(/\./g, '');
            });


            function formatHarga(input) {
                let value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
                if (value) {
                    input.value = parseInt(value, 10).toLocaleString('id-ID'); // Format ke IDR (ribuan)
                }
            }

            function clearFormatHarga(input) {
                // Saat kehilangan fokus, hapus format ribuan agar data yang dikirim bersih
                input.value = input.value.replace(/\./g, '');
            }
        </script>



    </div>
@endsection
