@extends('admin.layout.main')
@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // ===== Export ke Excel =====
            document.getElementById("exportExcel").addEventListener("click", function() {
                let table = document.getElementById("example");

                if (!table) {
                    alert("Tabel tidak ditemukan!");
                    return;
                }

                let clonedTable = table.cloneNode(true);
                let rows = clonedTable.rows;

                for (let i = 0; i < rows.length; i++) {
                    if (rows[i].cells.length > 7) {
                        rows[i].deleteCell(-1);


                    }
                }

                let wsData = [
                    ["Laporan Produk"],
                    ["Tanggal: " + new Date().toLocaleDateString()],
                    [],
                    ...XLSX.utils.sheet_to_json(XLSX.utils.table_to_sheet(clonedTable), {
                        header: 1
                    })
                ];

                let ws = XLSX.utils.aoa_to_sheet(wsData);
                let wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "Varian Produk");


                let fileName = `Daftar-Semua-Produk_${new Date().toISOString().slice(0, 10)}.xlsx`;
                XLSX.writeFile(wb, fileName);
            });

            // ===== Export ke PDF =====
            document.getElementById("exportPDF").addEventListener("click", function() {
                let {
                    jsPDF
                } = window.jspdf;
                let pdf = new jsPDF("l", "mm", "legal");

                let title = "Laporan Produk";
                let date = "Tanggal: " + new Date().toLocaleDateString();
                let footer = "Generated by Sistem, " + new Date().toLocaleString();

                // Set font for title
                pdf.setFontSize(16);
                pdf.text(title, 14, 15);

                // Set font for date
                pdf.setFontSize(10);
                pdf.text(date, 14, 22);

                // Get table data
                let tableElement = document.getElementById("example");

                if (!tableElement) {
                    alert("⚠️ ERROR: Tabel tidak ditemukan! Pastikan ID tabel adalah 'example'.");
                    return;
                }

                let headers = [];
                let rows = [];

                // Iterate over the table and prepare data
                let tableRows = tableElement.querySelectorAll("tr");
                tableRows.forEach((row, rowIndex) => {
                    let rowData = [];
                    let cells = row.querySelectorAll("th, td");

                    cells.forEach((cell, cellIndex) => {

                        if (cellIndex < 7) {
                            rowData.push(cell.innerText.trim());
                        }
                    });


                    if (rowIndex === 0) {
                        headers = rowData;
                    } else {
                        rows.push(rowData);
                    }
                });


                pdf.autoTable({
                    head: [headers],
                    body: rows,
                    startY: 30, // Start table at y position 30
                    theme: 'striped', // Striped rows for readability
                    styles: {
                        fontSize: 8,
                        cellPadding: 3
                    },
                    margin: {
                        top: 20
                    },
                });

                // Add footer
                pdf.setFontSize(8);
                pdf.text(footer, 14, pdf.internal.pageSize.height - 10);

                // Save PDF with date in filename
                let fileName = `Daftar-Semua-Produk_${new Date().toISOString().slice(0, 10)}.pdf`;
                pdf.save(fileName);
            });
        });
    </script>
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
                            <div class="d-flex justify-content-end mb-3">
                                <button id="exportExcel" class="btn btn-success me-2">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </button>
                                <button id="exportPDF" class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </button>
                            </div>
                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
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
                    var selectedProduct = $('#filterNamaProduk').val().toLowerCase();
                    var warnaSet = new Set();
                    var ukuranSet = new Set();

                    $('.produk-row').each(function() {
                        var namaProduk = $(this).data('nama');
                        var warna = $(this).data('warna');
                        var ukuran = $(this).data('ukuran');

                        if (selectedProduct === '' || namaProduk === selectedProduct) {
                            warnaSet.add(warna);
                            ukuranSet.add(ukuran);
                        }
                    });

                    $('#filterWarna').empty().append('<option value="">Semua Warna</option>');
                    warnaSet.forEach(warna => {
                        $('#filterWarna').append(`<option value="${warna}">${warna}</option>`);
                    });

                    $('#filterUkuran').empty().append('<option value="">Semua Ukuran</option>');
                    ukuranSet.forEach(ukuran => {
                        $('#filterUkuran').append(`<option value="${ukuran}">${ukuran}</option>`);
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

                        $(this).toggle(matchNama && matchWarna && matchUkuran);
                    });

                    checkIfEmpty();
                    updateRowNumbers();
                }

                $('#filterNamaProduk').on('change', function() {
                    updateFilterOptions();
                    applyFilters();
                });

                $('#filterWarna, #filterUkuran').on('change', function() {
                    applyFilters();
                });

                updateFilterOptions();
                checkIfEmpty();
            });
        </script>



    </div>
@endsection
