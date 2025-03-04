<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'SPK-SAW')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    



    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo2.png') }}" alt="" style="max-height: 35px;">
                <span class="d-none d-lg-block">SPK-SAW</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>oi</h6>
                            <span>oi</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="#" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
        </nav>

    </header>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : 'collapsed' }}" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Master Data</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('kriteria*') ? 'active' : 'collapsed' }}" href="{{ route('kriteria.index') }}">
                    <i class="bi bi-box"></i>
                    <span>Data Kriteria</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('tanaman*') ? 'active' : 'collapsed' }}" href="{{route('tanaman.index')}}">
                    <i class="bi bi-list"></i>
                    <span>Data tanaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('subkriteria*') ? 'active' : 'collapsed' }}" href="{{route('subkriteria.index')}}">
                    <i class="bi bi-cash-coin"></i>
                    <span>Subkriteria Tanaman</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('tanah*') ? 'active' : 'collapsed' }}" href="{{route('tanah.index')}}">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                    <span>Data tanah</span>
                </a>
            </li>

            <li class="nav-heading">SAW</li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('perhitungan*') ? 'active' : 'collapsed' }}" href="{{route('perhitungan.index')}}">
                    <i class="bi bi-graph-up"></i>
                    <span>Perhitungan</span>
                </a>
            </li>
            <!-- End of Additional Menu -->
        </ul>
    </aside>

    <!-- Main Content -->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                @yield('content')
            </div>
        </section>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="py-2 px-2 text-center bottom">
            <p class="mb-0 fs-6">&copy; {{ date('Y') }} Aplikasi Perhitungan Metode SAW</p>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


    @stack('scripts')
</body>

</html>