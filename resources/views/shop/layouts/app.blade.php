<!DOCTYPE html>
<html lang="en">

@include('shop.includes.header')

<body>
    @include('shop.includes.whatsapp-icon')
    @yield('content')
    @include('sweetalert::alert')

    {{-- letakkan JS di bawah baris ini! --}}
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/shop/navbar.js') }}"></script>
    <script src="https://kit.fontawesome.com/b902581f05.js" crossorigin="anonymous"></script>
</body>

</html>
