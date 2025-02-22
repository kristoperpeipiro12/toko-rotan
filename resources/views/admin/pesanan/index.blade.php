@extends('admin.layout.main')
@section('content')
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
                        <table class="table align-items-center table-flush table-hover" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th class="mini-th">No</th>
                                    <th>Id_Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($kategori as $k) --}}
                                {{-- <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->id_kategori }}</td>
                                        <td>{{ $k->nama_kategori }}</td>
                                        <td class="d-flex justify-content-center">

                                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal{{ $k->id_kategori }}">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteCategoryModal{{ $k->id_kategori }}"
                                                data-id="{{ $k->id_kategori }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr> --}}

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
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Add Kategori -->
        {{-- <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
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
        </div> --}}


        <!-- Modal Edit kategori -->
        {{-- @foreach ($kategori as $k)
            <div class="modal fade" id="editProductModal{{ $k->id_kategori }}" tabindex="-1"
                aria-labelledby="editProductModalLabel{{ $k->id_kategori }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProductForm{{ $k->id_kategori }}"
                                action="{{ route('admin.kategori.update', $k->id_kategori) }}" method="POST"
                                enctype="multipart/form-data" style="width: 100%">
                                @csrf
                                @method('PUT')

                                <!-- nama _kategori -->
                                <div class="mb-3">
                                    <label for="edit_nama" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="edit_nama" name="nama_kategori"
                                        value="{{ old('nama_kategori', $k->nama_kategori) }}" required>
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}


    </div>
@endsection
