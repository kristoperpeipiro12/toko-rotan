<!DOCTYPE HTML>
<html>

@include('customer.includes.header')

<body>
    @yield('content')
    <!-- jQuery -->
    <script src="{{ asset('clone/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('clone/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('clone/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('clone/js/jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('clone/js/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('clone/js/jquery.countTo.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('clone/js/jquery.flexslider-min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('clone/js/main.js') }}"></script>
    
</body>

</html>
