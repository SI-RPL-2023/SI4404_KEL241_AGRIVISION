<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>Agri Vision Landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{url('vendors')}}/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="{{url('css')}}/landing-page.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{url('images')}}/logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="components.html">Perbandingan</a>
                    </li>
                    @guest


                    @else
                    @if(\Illuminate\Support\Facades\Auth::user()->role =='admin')
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="{{route('admin.index')}}">Dashboard Admin</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="btn btn-danger rounded ml-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>
    <!-- End of page navibation -->

    <!-- Page Header -->
    <header class="header" id="home">
        <div class="container">
            <div class="infos">
                <h6 class="subtitle">Welcome to</h6>
                <h6 class="title">Agri Vision</h6>
                <br>
                <p>Aplikasi Pemetaan Pangan</p>

                <div class="buttons pt-3">
                    <button class="btn btn-primary rounded">Request Pangan</button>
                    <button class="btn btn-dark rounded">Periksa Request</button>
                </div>

            </div>
            <div class="img-holder">
                <img src="{{url('images')}}/man.svg" alt="">
            </div>
        </div>

        <!-- Header-widget -->
        <div class="widget">
            <div class="widget-item">
                <h2>124</h2>
                <p>Kecamatan yang Terbantu</p>
            </div>
            <div class="widget-item">
                <h2>456</h2>
                <p>Kematan Sedang Progress</p>
            </div>
            <div class="widget-item">
                <h2>789</h2>
                <p>Kematan Maju Pangan</p>
            </div>
        </div>
    </header>
    <!-- End of Page Header -->

    <!-- About section -->
    <section id="about" class="section mt-3">
        <div class="container mt-5">
            <div class="row text-center text-md-left">
                <div class="col-md-3">
                    <img src="{{url('images')}}/avatar.png" alt="" class="img-thumbnail mb-4">
                </div>
                <div class="pl-md-4 col-md-9">
                    <h6 class="title">Agri Vision</h6>
                    <p class="subtitle">Aplikasi Pemetaan Pangan</p>
                    <p>Agri Vision adalah sebuah website yang dirancang untuk membantu dalam pengumpulan data pangan di suatu wilayah. Website ini bertujuan untuk memfasilitasi pengumpulan informasi yang relevan tentang produksi pangan, kondisi pertanian, dan faktor-faktor terkait lainnya. Website ini juga menyediakan fitur analisis data yang canggih, yang memungkinkan pengguna untuk menginterpretasikan data yang dikumpulkan. Dengan menggabungkan teknologi dan data, Agri Vision berperan sebagai sarana untuk</p>
                    <p>meningkatkan efisiensi, ketahanan, dan keberlanjutan sektor pertanian. Dengan memungkinkan pengumpulan data pangan yang komprehensif dan berbagi pengetahuan antara pemangku kepentingan, Agri Vision berharap dapat berkontribusi pada pencapaian keamanan pangan global yang lebih baik.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service section -->
    <section id="service" class="section">
        <div class="container text-center">
            <h6 class="section-title mb-4">Apa yang Kami Lakukan</h6>
            <p class="mb-5 pb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In alias dignissimos. <br> rerum commodi corrupti, temporibus non quam.</p>

            <div class="row">
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-pie-chart"></i>
                            <h5>Pemetaan Pangan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-desktop"></i>
                            <h5>Visualisasi Data Pangan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-hand-stop"></i>
                            <h5>Pemasok & Permintaan Pangan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-map"></i>
                            <h5>Lokasi Pangan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Sectoin -->

    <!-- Contact Section -->
    <section id="contact" class="position-relative section">
        <div class="container text-center">
            <h6 class="section-title mb-4">Kontak</h6>
            <div class="contact text-left">
                <div class="form">
                    <h6 class="section-title mb-4">Customer Service & Review</h6>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <textarea name="contact-message" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block rounded w-lg">Send Message</button>
                    </form>
                </div>
                <div class="contact-infos">
                    <div class="item">
                        <i class="ti-location-pin"></i>
                        <div class="">
                            <h5>Location</h5>
                            <p> Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang </p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="ti-mobile"></i>
                        <div>
                            <h5>Phone Number</h5>
                            <p>(123) 456-7890</p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="ti-email"></i>
                        <div class="mb-0">
                            <h5>Email Address</h5>
                            <p>info@website.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="map">
            <iframe src="https://snazzymaps.com/embed/61257"></iframe>
        </div>
    </section>
    <!-- End of Contact Section -->

    <!-- Page Footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <p>Copyright
                        <script>
                            document.write(new Date().getFullYear())

                        </script>
                        &copy;
                        Agri Vision
                </div>
            </div>
        </div>
    </footer>
    <!-- End of page footer -->
    <!-- core  -->
    <script src="{{url('vendors')}}/jquery/jquery-3.4.1.js"></script>
    <script src="{{url('vendors')}}/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
    <script src="{{url('vendors')}}/bootstrap/bootstrap.affix.js"></script>

    <!-- steller js -->
    <script src="{{url('js')}}/landing-page.js"></script>

</body>

</html>
