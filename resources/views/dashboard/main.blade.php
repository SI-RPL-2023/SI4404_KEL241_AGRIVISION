<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>AGRI VISION</title>
    <link rel="stylesheet" href="{{url('vendors')}}/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{url('vendors')}}/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="{{url('vendors')}}/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="{{url('vendors')}}/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{url('vendors')}}/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="{{url('css')}}/dashboard.css" />
    <link rel="shortcut icon" href="{{url('images')}}/logo-mini.png" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{--    table --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


</head>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="{{route('home')}}"><img src="{{url('images')}}/logo.png" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="{{route('home')}}"><img src="{{url('images')}}/logo-mini.png" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{url('images')}}/faces/face1.png" alt="profile" />
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column pr-3">
                            <span class="font-weight-medium mb-2">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                            <span class="font-weight-normal">{{\Illuminate\Support\Facades\Auth::user()->role}}</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.foodReqIndex')}}">
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        <span class="menu-title">Pemetaan Request <br> Pangan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.NonFoodRequestIndex')}}">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Pemetaan Request Non <br>Pangan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.foodIndex')}}">
                        <i class="mdi mdi-food menu-icon"></i>
                        <span class="menu-title">List Pangan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.foodProdIndex')}}">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">Data Produsen</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.marketMapingIndex')}}">
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        <span class="menu-title">Data Pasar</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.agriIndex')}}">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Data Pertanian dan Peternakan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#visualisasi" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-table-large menu-icon"></i>
                        <span class="menu-title">Visualisasi</span>
                    </a>

                    <div class="collapse" id="visualisasi">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('visualisasi.wilayah.index')}}">Per Wilayah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('visualisasi.wilayah.banding')}}">Perbandingan Wilayah</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <span class="nav-link" href="#">
                        <span class="menu-title">Data warga</span>
                    </span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#pemetaan" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Pemetaan Warga</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="pemetaan">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.wargaProvinsi')}}">Provinsi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.wargaKota')}}">Kabupaten / Kota</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.wargaKecamatan')}}">Kecamatan</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item sidebar-actions">
                    <div class="nav-link">
                        <div class="mt-4">
                            <ul class="mt-4 pl-0">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="{{url('images')}}/logo-mini.png" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                        <li class="nav-item nav-profile dropdown border-0">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                                <img class="nav-profile-img mr-2" alt="" src="{{url('images')}}/faces/face1.png" />
                                <span class="profile-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i> {{ __('Logout') }} </a>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper pb-0">

                    @yield('content')

                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © agrivision.com 2023</span>
                    </div>
                </footer>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('vendors')}}/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{url('vendors')}}/chart.js/Chart.min.js"></script>
    <script src="{{url('vendors')}}/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{url('vendors')}}/flot/jquery.flot.js"></script>
    <script src="{{url('vendors')}}/flot/jquery.flot.resize.js"></script>
    <script src="{{url('vendors')}}/flot/jquery.flot.categories.js"></script>
    <script src="{{url('vendors')}}/flot/jquery.flot.fillbetween.js"></script>
    <script src="{{url('vendors')}}/flot/jquery.flot.stack.js"></script>
    <script src="{{url('vendors')}}/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('js')}}/dashboard/off-canvas.js"></script>
    <script src="{{url('js')}}/dashboard/hoverable-collapse.js"></script>
    <script src="{{url('js')}}/dashboard/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{url('js')}}/dashboard/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('script')

</body>

</html>
