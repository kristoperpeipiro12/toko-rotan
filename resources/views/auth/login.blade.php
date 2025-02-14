@extends('auth.main')
@section('title', 'Login')
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
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div class="w-100">

                                </div>
                            </div>
                            <form action="{{ route('login.proses') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" name="email_or_name" placeholder="Nama Pengguna"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Kata Sandi" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Masuk</button>
                                </div>
                                @if (request()->headers->has('referer'))
                                    <div class="form-group d-md-flex">
                                        <a href="{{ url()->previous() }}" class="btn btn-primary form-control">Kembali</a>
                                    </div>
                                @endif
                            </form>
                            <p class="text-center">Belum terdaftar? <a href="{{ route('register') }}">Daftar
                                    Sekarang!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
