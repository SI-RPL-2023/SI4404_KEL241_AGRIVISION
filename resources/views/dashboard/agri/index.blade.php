@extends('dashboard.main')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="row">
        <div class="col card w-50">

            <h1 class="text-center m-3">List Agri Maping </h1>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                Tambahkan Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('admin.storeAgri')}}" method="post">
                            @csrf
                            @method('post')
                            <div class="modal-body bg-white">
                                <div class="form-group m-3">
                                    <label for="">Nama Pabrik</label>
                                    <input type="text" name="title" class="form-control">
                                </div>

                                <div class="form-group m-3">
                                    <label for="">Deskripsi</label>
                                    <textarea type="text" name="description" class="form-control"> </textarea>
                                </div>

                                <div class="form-group m-3">
                                    <label for="">Nama Pangan</label>
                                    <select name="food_id" class="form-control" id="">
                                        @foreach($food as $f)
                                            <option value="{{$f->id}}">{{$f->food_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group m-3">
                                    <label for="">Kecamatan Pabrik</label>
                                    <select name="kecamatan_id" class="form-control" id="">
                                        @foreach($kecamatan as $k)
                                            <option value="{{$k->id}}">{{$k->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group m-3">
                                    <label for="">Produksi</label>
                                    <input type="number" name="number" class="form-control">
                                </div>

                                <div class="form-group m-3">
                                    <label for="">Masukan Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="Pabrik">Pabrik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="m-3 p-3">
                <table class="display" id="table1">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama petani</th>
                        <th>Deskripsi</th>
                        <th>Nama Provinsi</th>
                        <th>Nama Kota</th>
                        <th>Nama Kecamatan</th>
                        <th>Nama Makanan</th>
                        <th>Satuan Unit</th>
                        <th>Jumlah Produksi</th>
                        <th>Status</th>
                        <th>User Yang Membuat</th>
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
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                                    Edit Data
                                </button>

                                <a href="{{route('admin.deleteAgri' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
                            </td>
                        </tr>



                        <?php $t++ ?>
                        <div class="modal fade" id="edit{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.updateAgri' , ['id'=>$x->id])}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body bg-white">
                                            <div class="form-group m-3">
                                                <label for="">Nama Pabrik</label>
                                                <input type="text" name="title" value="{{$x->title}}" class="form-control">
                                            </div>

                                            <div class="form-group m-3">
                                                <label for="">Deskripsi</label>
                                                <textarea type="text" name="description" class="form-control">{{$x->description}}</textarea>
                                            </div>

                                            <div class="form-group m-3">
                                                <label for="">Nama Pangan</label>
                                                <select name="food_id" class="form-control" id="">
                                                    @foreach($food as $f)
                                                        <option @if($f->id == $x->food_id) selected @endif value="{{$f->id}}">{{$f->food_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group m-3">
                                                <label for="">Kecamatan Pabrik</label>
                                                <select name="kecamatan_id" class="form-control" id="">
                                                    @foreach($kecamatan as $k)
                                                        <option @if($x->kecamatan_id == $k->id) selected @endif value="{{$k->id}}">{{$k->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group m-3">
                                                <label for="">Produksi</label>
                                                <input type="number" name="number" value="{{$x->number}}" class="form-control">
                                            </div>

                                            <div class="form-group m-3">
                                                <label for="">Masukan Status</label>
                                                <select name="status" class="form-control" id="">
                                                    <option @if($x->status == "Pabrik") selected @endif value="Pabrik">Pabrik</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>


                    @endforeach

                    </tbody>


                </table>
            </div>
        </div>
    </div>




@endsection

@push('script')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );

        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
