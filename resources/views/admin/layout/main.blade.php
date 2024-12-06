<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $pageTitle }} </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('focus/./images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('focus/./vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('focus/./vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('focus/./vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{asset('focus/./vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('focus/./css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('form/style.css') }}">


    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">





</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-abbr" src="{{asset('focus/./images/logo.png')}}" alt="">
                <span class="brand-title">AL-ZAHRA</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">

                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ route('login') }}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{ route('admin.dashboard') }}" aria-expanded="false"><i class="icon-speedometer"></i><span class="nav-text">Dashboard</span></a></li>
                    <li><a href="{{ route('admin.produk') }}" aria-expanded="false"><i class="icon fas fa-gem"></i><span class="nav-text">Produk</span></a></li>
                    <li><a href="{{ route('admin.kategori') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Kategori</span></a></li>
                    <li><a href="{{ route('admin.datawilayah') }}" aria-expanded="false"><i class="icon icon-world-2"></i><span class="nav-text">Data Wilayah</span></a></li>

                   <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                           <i class="fa fa-shopping-cart"></i><span class="nav-text">Pesanan</span>
                       </a>
                       <ul aria-expanded="false">
                           <li><a href="{{ route('pesanan.dikemas') }}"><i class="fa fa-box-open"></i>Dikemas</a></li>
                           <li><a href="{{ route('pesanan.dikirim') }}"><i class="fa fa-truck"></i>Dikirim</a></li>
                           <li><a href="{{ route('pesanan.konfirmasi') }}"><i class="fa fa-clipboard-check"></i> Konfirmasi</a></li>
                           <li><a href="{{ route('pesanan.selesai') }}"><i class="fa fa-check"></i>Selesai</a></li>
                       </ul>
                   </li>


                    <li><a href="{{ route('login') }}" aria-expanded="false"><i class="fas fa-sign-out-alt"></i><span class="nav-text">Logout</span></a></li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>
                    Copyright © Designed &amp; Developed by
                    <a href="#" target="_blank">Bukan Saya</a>
                    {{ date('Y') }}
                </p>

            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('focus/./vendor/global/global.min.js')}}"></script>
    <script src="{{asset('focus/./js/quixnav-init.js')}}"></script>
    <script src="{{asset('focus/./js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{asset('focus/./vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('focus/./vendor/morris/morris.min.js')}}"></script>


    <script src="{{asset('focus/./vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('focus/./vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{asset('focus/./vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('focus/./vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('focus/./vendor/flot/jquery.flot.resize')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('focus/./vendor/owl-carousel/js/owl.carousel.min')}}"></script>

    <!-- Counter Up -->
    <script src="{{asset('focus/./vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('focus/./vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('focus/./vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


    <script src="{{asset('focus/./js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{ asset('focus/./vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('focus/./js/plugins-init/datatables.init.js') }}"></script>
</body>

</html>
