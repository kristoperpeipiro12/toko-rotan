<!doctype html>
<html lang="en">
@include('auth.includes.header')

<body>
    @yield('content')


@include('sweetalert::alert')
    @include('auth.includes.footer')
</body>

</html>
