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
                    <a href="{{ route('admin.produk') }}" class="btn btn-primary mb-1">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Tambah Produk
                    </a>
                    <a href="{{ route('admin.produk_varian') }}" class="btn btn-info mb-1">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Tambah Varian
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Nama Produk</th>
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Stok</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($display_produk as $pv)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pv->produk->nama_produk }}</td>
                                        <td>{{ $pv->warna }}</td>
                                        <td>{{ $pv->ukuran }}</td>
                                        <td>{{ $pv->stok }}</td>
                                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal{{ $p->id_produk }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>






    </div>
@endsection
