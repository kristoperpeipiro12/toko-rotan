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
            "paging": true
            , "responsive": false
            , "searching": true
            , "deferRender": true
            , "lengthMenu": [
                    [10, 25, 50, 100, 500, -1]
                    , ['10', '25', '50', '100', '500', 'Semua']
                ]
                , "dom": '<"d-block d-lg-flex justify-content-between"lf<"btn btn-sm"B>r>t<"d-block d-lg-flex justify-content-between"ip>'
                , "buttons": [{
                            extend: 'excelHtml5'
                            , filename: 'Data Siswa - SD Kristen Pelita Hati - update ' +
                                tanggalHariIni
                            , text: 'XLSX'
                            , exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                , stripHtml: true
                                , modifier: {
                                    page: 'current'
                                }
                            }
                        }
                        , {
                            extend: 'pdfHtml5'
                            , filename: 'Data Siswa - SD Kristen Pelita Hati - update ' +
                                tanggalHariIni
                            , text: 'PDF'
                            , message: 'Data Siswa - SD Kristen Pelita Hati'
                            , messageBottom: 'Data dibuat otomatis oleh sistem : ' +
                                tanggalHariIni + ' ' + waktuHariIni + ' WIB'
                            , exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                , stripHtml: true
                                , modifier: {
                                    page: 'current'
                                }
                            }
                            , orientation: 'landscape'
                            , pageSize: 'LEGAL'
                            , customize: function(doc) {
                                doc.pageMargins = [20, 20, 20, 20];
                                doc.defaultStyle.fontSize = 10;
                                doc.styles.tableHeader.fontSize = 10;
                                doc.styles.title.fontSize = 14;
                                doc.content[0].text = doc.content[0].text.trim();
                                doc['footer'] = (function(page, pages) {
                                    return {
                                        columns: [
                                            'Data Siswa - SD Kristen Pelita Hati'
                                            , {
                                                alignment: 'right'
                                                , text: ['Page ', {
                                                    text: page
                                                        .toString()
                                                }, ' of ', {
                                                    text: pages
                                                        .toString()
                                                }]
                                            }
                                        ]
                                        , margin: [10, 0]
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

                    ]
                , "language": {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json'
                }
            , "columnDefs": [{
                "searchable": false
                , "orderable": false
                , "targets": 0
            }]
            , "order": [
                [1, 'asc']
            ]

        });

        table.on('order.dt search.dt', function() {
            table.column(0, {
                order: 'applied'
                , search: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
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
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($tagihan as $t) --}}
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                {{-- <td>{{ $t->kelas }}</td> --}}
                                {{-- <td style="width: 80%;">Rp. {{ number_format($t->tagihan_perbulan, 0, ',', '.') }}</td> --}}
                                {{-- <td class="d-flex justify-content-center"> --}}
                                    {{-- <a href="{{ route('tagihan.edit',$t->kelas) }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-pen-alt"></i></a> --}}
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

<!-- Modal Form -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body modal-content">
                <form id="addProductForm" action="#" method="POST" style="width: 100%">
                    @csrf
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="id_kategori" name="id_kategori" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    @endsection
