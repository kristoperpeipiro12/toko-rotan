@extends('auth.main')
@section('title', 'Daftar')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img"
                            style="background-image: url({{ asset('assets/images/dummy-images/welcome-img.jpg') }});">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                                <div class="w-100">

                                </div>
                            </div>
                            <form action="{{ route('register.proses') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" name="name" placeholder="Nama Pengguna" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" name="email" placeholder="contoh@gmail.com" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control"
                                        required="">
                                </div>
                                {{-- <div class="form-group mb-3">
                                <label class="label" for="alamat">Alamat</label>
                                <input type="text" name="alamat" placeholder="Jalan;Komplek;Nomor Rumah"
                                    class="form-control" required="">
                            </div> --}}
                                <div class="form-group mb-3">
                                    <label class="label" for="nowa">Nomor WA</label>
                                    <input type="text" name="no_hp" placeholder="+ 62" class="form-control"
                                        id="onlyNumber" required="">
                                </div>


                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Daftar</button>
                                </div>
                                <div class="form-group d-md-flex">

                                </div>
                            </form>
                            <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Masuk
                                    Sekarang!</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('onlyNumber').addEventListener('input', function(event) {
            this.value = this.value.replace(/[^0-9]/g, ''); // Hanya angka 0-9 yang diizinkan
        });
    </script>
@endsection
