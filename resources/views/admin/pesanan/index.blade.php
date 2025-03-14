@extends('admin.layout.main')
@section('content')
    <!-- DataTable with Hover -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Admin</li>
                <li class="breadcrumb-item" aria-current="page">Pesanan</li>
            </ol>
        </div>

        <div class="col-lg-15">
            <div class="card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Produk</th>
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah</th>
                                    <th>Biaya</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkout as $pesanan)
                                    <tr class="produk-row">
                                        <td class="no-urut" style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $pesanan->customer->name }}</td>
                                        <td>{{ $pesanan->produk_varian->produk->nama_produk }}</td>
                                        <td>{{ $pesanan->produk_varian->warna }}</td>
                                        <td>{{ $pesanan->produk_varian->ukuran }}</td>
                                        <td>{{ $pesanan->jumlah }} @pcs</td>
                                        <td>{{ $pesanan->jumlah * $pesanan->produk_varian->harga }}</td>
                                        <td>{{ $pesanan->status }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal{{ $pesanan->id_checkout }}">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteCategoryModal{{ $pesanan->id_checkout }}"
                                                data-id="{{ $pesanan->id_checkout }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Delete Kategori -->
                                    {{-- <div class="modal fade" id="deleteCategoryModal{{ $k->id_kategori }}" tabindex="-1"
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
                                                    <p>Apakah Anda yakin ingin menghapus kategori ini?</p>
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
                                    </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
