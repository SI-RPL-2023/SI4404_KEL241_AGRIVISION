<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>Agri Vision Landing page | Perbandingan Permintaan</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{url('vendors')}}/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="{{url('css')}}/landing-page.css">

    {{--    table --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{--    table --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{url('images')}}/logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="{{route('banding')}}">Perbandingan</a>
                    </li>

                    @guest
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="{{route('login')}}">Login</a>
                    </li>



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



    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="section p-5 mt-5">
        <div class="row">
            <div class="col card w-50">
                <h2 class="text-center m-3">Data Wilayah {{$kecamatan->name}} dan {{$kecamatan2->name}} </h2>

                <form action="{{route('banding.kecamatan')}}" class="m-3" method="get">
                    @csrf
                    @method('get')
                    <div class="form-group d-flex">
                        <label for="">Bandingkan Kecamatan</label>
                        <select name="kecamatan_id" id="" class="form-control m-2">
                            @foreach($kecamatanAll as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                            @endforeach
                        </select>

                        <select name="kecamatan_id2" id="" class="form-control m-2">
                            @foreach($kecamatanAll as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>

                </form>


                <form action="{{route('banding.kota')}}" class="m-3" method="get">
                    @csrf
                    @method('get')
                    <div class="form-group d-flex">
                        <label for="">Search Kota</label>
                        <select name="kecamatan_id" id="" class="form-control m-2">
                            @foreach($kota as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                            @endforeach
                        </select>

                        <select name="kecamatan_id2" id="" class="form-control m-2">
                            @foreach($kota as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                            @endforeach
                        </select>

                        <button class="btn btn-success" type="submit">Search</button>
                    </div>

                </form>

                <form action="{{route('banding.provinsi')}}" class="m-3" method="get">
                    @csrf
                    @method('get')
                    <div class="form-group d-flex">
                        <label for="">Search Provinsi</label>
                        <select name="kecamatan_id" id="" class="form-control m-2">
                            @foreach($provinsi as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                            @endforeach
                        </select>

                        <select name="kecamatan_id2" id="" class="form-control m-2">
                            @foreach($provinsi as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>

                </form>


                <div class="m-3">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>


    </div>


    <script>
        $(document).ready(function () {
            $('#table1').DataTable();
        });

        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pasar', 'Produsen', 'Pertanian/Peternakan', 'Request Pangan', 'Request Pembuatan Pasar Daerah'],
                datasets: [{
                    label: 'Data Wilayah {{$kecamatan->name}}',
                    data: [{
                        {
                            $pasar
                        }
                    }, {
                        {
                            $pabrik
                        }
                    }, {
                        {
                            $agri
                        }
                    }, {
                        {
                            $foodRequest
                        }
                    }, {
                        {
                            $nonFoodRequest
                        }
                    }],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Data Wilayah {{$kecamatan2->name}}',
                    data: [{
                        {
                            $pasar2
                        }
                    }, {
                        {
                            $pabrik2
                        }
                    }, {
                        {
                            $agri2
                        }
                    }, {
                        {
                            $foodRequest2
                        }
                    }, {
                        {
                            $nonFoodRequest2
                        }
                    }],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>

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




</body>

</html>
