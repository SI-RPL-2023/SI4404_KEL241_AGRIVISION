@extends('dashboard.main')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="row">
        <div class="col card w-50">

            <h1 class="text-center m-3">List Request Makanan</h1>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Requested</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Accepted</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">on Progress</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Done</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="m-3 p-3">
                        <table class="display" id="table1">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Request</th>
                                <th>Deskripsi</th>
                                <th>Nama Provinsi</th>
                                <th>Nama Kota</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Makanan</th>
                                <th>Satuan Unit</th>
                                <th>Jumlah Produksi</th>
                                <th>Status</th>
                                <th>User Yang Membuat</th>
                                <th>Dokumen Pendukung</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <?php $t = 1 ?>
                            <tbody>

                            @foreach($data as $x)
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
                                    <td>
                                        <a href="{{route('admin.acceptRequestFood' , ['id'=>$x->id])}}" class="btn btn-success">Accept Request</a>
                                        <a href="{{route('admin.rejectRequestFood' , ['id'=>$x->id])}}" class="btn btn-danger"> Tolak Request</a>
                                    </td>
                                </tr>

                                <?php  $t++ ;?>

                            @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="m-3 p-3">
                        <table class="display" id="table2">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Request</th>
                                <th>Deskripsi</th>
                                <th>Nama Provinsi</th>
                                <th>Nama Kota</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Makanan</th>
                                <th>Satuan Unit</th>
                                <th>Jumlah Produksi</th>
                                <th>Status</th>
                                <th>User Yang Membuat</th>
                                <th>Dokumen Pendukung</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <?php $t = 1 ?>
                            <tbody>

                            @foreach($accepted as $x)
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
                                    <td>
                                        <a href="{{route('admin.runProgressFood' , ['id'=>$x->id])}}" class="btn btn-success">Run progres</a>

                                    </td>
                                </tr>

                                <?php  $t++ ;?>

                            @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="m-3 p-3">
                        <table class="display" id="table3">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Request</th>
                                <th>Deskripsi</th>
                                <th>Nama Provinsi</th>
                                <th>Nama Kota</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Makanan</th>
                                <th>Satuan Unit</th>
                                <th>Jumlah Produksi</th>
                                <th>Status</th>
                                <th>User Yang Membuat</th>
                                <th>Dokumen Pendukung</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <?php $t = 1 ?>
                            <tbody>

                            @foreach($onprog as $x)
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
                                    <td>
                                        <a href="{{route('admin.doneProgressFood' , ['id'=>$x->id])}}" class="btn btn-success">Run progres</a>

                                    </td>
                                </tr>

                                <?php  $t++ ;?>

                            @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-3">
                    <div class="m-3 p-3">
                        <table class="display" id="table4">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Request</th>
                                <th>Deskripsi</th>
                                <th>Nama Provinsi</th>
                                <th>Nama Kota</th>
                                <th>Nama Kecamatan</th>
                                <th>Nama Makanan</th>
                                <th>Satuan Unit</th>
                                <th>Jumlah Produksi</th>
                                <th>Status</th>
                                <th>User Yang Membuat</th>
                                <th>Dokumen Pendukung</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <?php $t = 1 ?>
                            <tbody>

                            @foreach($done as $x)
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
                                    <td>
                                        <a class="btn btn-success">Finished</a>

                                    </td>
                                </tr>

                                <?php  $t++ ;?>

                            @endforeach

                            </tbody>


                        </table>
                    </div>

                </div>

            </div>


        </div>
    </div>




@endsection

@push('script')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );

        $(document).ready( function () {
            $('#table2').DataTable();
        } );
        $(document).ready( function () {
            $('#table3').DataTable();
        } );

        $(document).ready( function () {
            $('#table4').DataTable();
        } );


        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
