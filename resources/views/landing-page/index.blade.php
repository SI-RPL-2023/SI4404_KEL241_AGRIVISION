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

    {{--    table --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


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
                        <a class="- btn btn-primary rounded ml-4" href="{{route('banding')}}">Perbandingan</a>
                    </li>

                    @guest
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="{{route('login')}}">Login</a>
                    </li>



                    @else
                    <button class="btn btn-primary rounded ml-4" data-toggle="modal" data-target="#update">Update Profile</button>






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
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <h6 class="subtitle">Welcome to</h6>
                <h6 class="title">Agri Vision</h6>
                <br>
                <p>Aplikasi Pemetaan Pangan</p>

                <div class="buttons pt-3">
                    <button class="btn btn-primary rounded" data-toggle="modal" data-target="#tambah">Request Pangan</button>
                    <button class="btn btn-primary rounded" data-toggle="modal" data-target="#tambahNon">Request Pembuatan Pasar Daerah</button> <br>

                    @guest
                    @else
                    <button class="btn btn-dark rounded mt-2" data-toggle="modal" data-target="#requestFood">Periksa Request Pangan</button>
                    <div class="modal fade" id="requestFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl    modal-fullscreen" style="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Food Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive display" id="table3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Request</th>
                                                <th>Deskripsi</th>
                                                <th>Nama Provinsi</th>
                                                <th>Nama Kota</th>
                                                <th>Nama Kecamatan</th>
                                                <th>Nama Pangan</th>
                                                <th>Satuan Unit</th>
                                                <th>Jumlah Produksi</th>
                                                <th>Status</th>
                                                <th>User yang Request</th>
                                                <th>Dokumen Pendukung</th>
                                            </tr>
                                        </thead>
                                        <?php $t = 1 ?>
                                        <tbody>

                                            @foreach($foodreq as $x)
                                            <tr>
                                                <td>{{$t}}</td>
                                                <td>{{$x->title}}</td>
                                                <td>{{$x->description}}</td>
                                                <td>{{$x->provinsi->name}}</td>
                                                <td>{{$x->kota->name}}</td>
                                                <td>{{$x->kecamatan->name}}</td>
                                                <td>{{$x->food->food_name}}</td>
                                                <td>{{$x->food->unit}}</td>
                                                <td>{{$x->number}} {{$x->food->unit}}</td>
                                                <td>{{$x->status}}</td>
                                                <td>{{$x->user->name}}</td>
                                                <td><a href="{{route('admin.downloadDocFood' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a></td>
                                            </tr>

                                            <?php  $t++ ;?>

                                            @endforeach

                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-dark rounded mt-2" data-toggle="modal" data-target="#requestNonFood">Periksa Request Pembuatan Pasar Daerah</button>
                    <div class="modal fade" id="requestNonFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl    modal-fullscreen" style="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Request Pembuatan Pasar Daerah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive display" id="table3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Judul Permintaan</th>
                                                <th>Deskripsi</th>
                                                <th>Nama Provinsi</th>
                                                <th>Nama Kota</th>
                                                <th>Nama Kecamatan</th>
                                                <th>Luas Pasar yang Dibangun (m&#xB2;)</th>
                                                <th>Status</th>
                                                <th>User yang Request</th>
                                                <th>Dokumen Pendukung</th>
                                            </tr>
                                        </thead>
                                        <?php $t = 1 ?>
                                        <tbody>

                                            @foreach($foodnonreq as $x)
                                            <tr>
                                                <td>{{$t}}</td>
                                                <td>{{$x->title}}</td>
                                                <td>{{$x->description}}</td>
                                                <td>{{$x->provinsi->name}}</td>
                                                <td>{{$x->kota->name}}</td>
                                                <td>{{$x->kecamatan->name}}</td>
                                                <td>{{$x->number}}</td>
                                                <td>{{$x->status}}</td>
                                                <td>{{$x->user->name}}</td>
                                                <td><a href="{{route('admin.downloadDocNonFood' , ['id'=>$x->id])}}" class="btn btn-danger">Download Dokumen Pendukung</a></td>
                                            </tr>

                                            <?php  $t++ ;?>

                                            @endforeach

                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @guest
                                <div class="modal-body">
                                    <h1 class="text-center justify-content-center">Harap Login Terlebih Dahulu</h1>
                                </div>
                                @else
                                <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body bg-white">
                                        <div class="form-group m-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">NIK</label>
                                            <input type="number" name="NIK" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->NIK}}">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                    @endguest


                </div>

                <!-- Modal -->
                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Request Pangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @guest
                            <div class="modal-body">
                                <h1 class="text-center justify-content-center">Harap Login Terlebih Dahulu</h1>
                            </div>
                            @else
                            <form action="{{route('storeFoodRequest')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="modal-body bg-white">
                                    <div class="form-group m-3">
                                        <label for="">Nama Permintaan</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Deskripsi</label>
                                        <textarea type="text" name="description" class="form-control"> </textarea>
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Kecamatan</label>
                                        <select name="kecamatan_id" class="form-control" id="">
                                            @foreach($kecamatan as $k)
                                            <option value="{{$k->id}}">{{$k->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Nama Pangan</label>
                                        <select name="food_id" class="form-control" id="">
                                            @foreach($food as $f)
                                            <option value="{{$f->id}}">{{$f->food_name."/".$f->unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Kebutuhan</label>
                                        <input type="number" name="number" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="file">Upload File Pendukung</label>
                                        <input type="file" class="form-control-file" id="file" name="file">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tambahNon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Request Pembuatan Pasar Daerah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @guest
                            <div class="modal-body">
                                <h1 class="text-center justify-content-center">Harap Login Terlebih Dahulu</h1>
                            </div>
                            @else
                            <form action="{{route('storeRequest')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="modal-body bg-white">
                                    <div class="form-group m-3">
                                        <label for="">Judul Permintaan</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Latar Belakang</label>
                                        <textarea type="text" name="description" class="form-control"> </textarea>
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Kecamatan</label>
                                        <select name="kecamatan_id" class="form-control" id="">
                                            @foreach($kecamatan as $k)
                                            <option value="{{$k->id}}">{{$k->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Luas Pasar yang Dibangun (m&#xB2;)</label>
                                        <input type="number" name="number" class="form-control">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Masukan Jenis Pasar</label>
                                        <select name="tipe" class="form-control" id="">
                                            <option value="Pasar Tradisional">Pasar Tradisional</option>
                                            <option value="Pasar Modern">Pasar Modern</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="file">Upload File Pendukung</label>
                                        <input type="file" class="form-control-file" id="file" name="file">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>



            </div>
            <div class="img-holder">
                <img src="{{url('images')}}/man.svg" alt="">
            </div>
        </div>

        <!-- Header-widget -->
        <div class="widget">
            <div class="widget-item">
                <h2>{{ $done }}</h2>
                <p>Kecamatan yang Terbantu </p>
            </div>
            <div class="widget-item">
                <h2>{{ $onprog }}</h2>
                <p>kecamatan Sedang Progress</p>
            </div>
            <div class="widget-item">
                <h2>{{$requested}}</h2>
                <p>kecamatan sudah di ajukan</p>
            </div>
        </div>
    </header>


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
                            <h5>Permintaan Pangan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="icon ti-map"></i>
                            <h5>Pemasok Pangan</h5>
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
            <h6 class="section-title mb-4">Kontak, Kritik dan Saran</h6>
            <div class="contact text-left">
                <div class="form">
                    <h6 class="section-title mb-4">Kritik dan Saran</h6>
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
                            <p>info@agrivision.gov.id</p>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#table3').DataTable();
        });

    </script>

</body>

</html>
