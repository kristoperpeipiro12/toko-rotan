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

        $('#editCategoryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_kategori = button.data('id'); // Ambil data-id
            var nama_kategori = button.data('nama'); // Ambil data-nama

            var modal = $(this);
            modal.find('#edit_id_kategori').val(id_kategori); // Set ID Kategori ke input hidden
            modal.find('#edit_nama_kategori').val(nama_kategori).focus(); // Set Nama Kategori ke input text
        });



        // Delete Category Modal
        $('#deleteCategoryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_kategori = button.data('id');

            var modal = $(this);
            modal.find('#delete_id_kategori').val(id_kategori);
            var actionUrl = '{{ route('admin.kategori.delete', ':id') }}';
            actionUrl = actionUrl.replace(':id', id_kategori);
            modal.find('#deleteCategoryForm').attr('action', actionUrl);
        });
        $('#deleteCategoryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var id_kategori = button.data('id');

            var modal = $(this);
            modal.find('#delete_id_kategori').val(id_kategori);
        });
    </script>

    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori</li>
            </ol>
        </div>

        <div class="col-lg-15">
            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
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
                                    <th>Id_Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $k)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->id_kategori }}</td>
                                        <td>{{ $k->nama_kategori }}</td>
                                        <td class="d-flex justify-content-center">
                                            <!-- Tombol Edit -->
                                            <a href="#" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal" data-id="{{ $k->id_kategori }}"
                                                data-nama="{{ $k->nama_kategori }}">
                                                <i class="fas fa-pen-alt"></i>
                                            </a>

                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteCategoryModal{{ $k->id_kategori }}"
                                                data-id="{{ $k->id_kategori }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Delete Kategori -->
                                    <div class="modal fade" id="deleteCategoryModal{{ $k->id_kategori }}" tabindex="-1"
                                        aria-labelledby="deleteCategoryModalLabel{{ $k->id_kategori }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteCategoryModalLabel{{ $k->id_kategori }}">Hapus Kategori
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus kategori
                                                        <strong>{{ $k->nama_kategori }}</strong>?
                                                    </p>
                                                    <form method="POST"
                                                        action="{{ route('admin.kategori.delete', $k->id_kategori) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </div>
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

        <!-- Modal Add Kategori -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-content">
                        <form id="addProductForm" action="{{ route('admin.kategori.store') }}" method="POST"
                            style="width: 100%">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Edit Kategori -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-content">
                        <form id="editCategoryForm"
                            action="{{ route('admin.kategori.update', ['id' => $k->id_kategori]) }}" method="POST"
                            style="width: 100%">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_kategori" id="edit_id_kategori">
                            <div class="mb-3">
                                <label for="edit_nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $k->nama_kategori) }}" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
