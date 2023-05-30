@extends('dashboard.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="row">
    <div class="col card w-50">

        <h1 class="text-center m-3">List Produsen</h1>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
            Tambahkan Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produsen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.storeFoodProd')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body bg-white">
                            <div class="form-group m-3">
                                <label for="">Nama Produsen</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Keterangan</label>
                                <textarea type="text" name="description" class="form-control"> </textarea>
                            </div>

                            <div class="form-group m-3">
                                <label for="">Kecamatan Produsen</label>
                                <select name="kecamatan_id" class="form-control" id="">
                                    @foreach($kecamatan as $k)
                                    <option value="{{$k->id}}">{{$k->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-3">
                                <label for="">Nama Pangan yang Diproduksi</label>
                                <select name="food_id" class="form-control" id="">
                                    @foreach($food as $f)
                                    <option value="{{$f->id}}">{{$f->food_name."/".$f->unit}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-3">
                                <label for="">Rata-Rata Produksi Perhari</label>
                                <input type="number" name="number" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Jenis Produksi</label>
                                <select name="status" class="form-control" id="">
                                    <option value="nabati">Nabati</option>
                                    <option value="hewani">Hewani</option>
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
                        <th>Nama Produsen</th>
                        <th>Keterangan</th>
                        <th>Nama Provinsi</th>
                        <th>Nama Kota</th>
                        <th>Nama Kecamatan</th>
                        <th>Nama Pangan yang Diproduksi</th>
                        <th>Satuan Unit</th>
                        <th>Rata-Rata Produksi Perhari</th>
                        <th>Jenis Produksi</th>
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
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                                Edit Data
                            </button>

                            <a href="{{route('admin.deleteFoodProd' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
                        </td>
                    </tr>



                    <?php $t++ ?>
                    <div class="modal fade" id="edit{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Produsen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('admin.updateFoodProd' , ['id'=>$x->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body bg-white">
                                        <div class="form-group m-3">
                                            <label for="">Nama Produsen</label>
                                            <input type="text" name="title" value="{{$x->title}}" class="form-control">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Keterangan</label>
                                            <textarea type="text" name="description" class="form-control">{{$x->description}}</textarea>
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Kecamatan Produsen</label>
                                            <select name="kecamatan_id" class="form-control" id="">
                                                @foreach($kecamatan as $k)
                                                <option @if($x->kecamatan_id == $k->id) selected @endif value="{{$k->id}}">{{$k->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Nama Pangan yang Diproduksi</label>
                                            <select name="food_id" class="form-control" id="">
                                                @foreach($food as $f)
                                                <option @if($f->id == $x->food_id) selected @endif value="{{$f->id}}">{{$f->food_name."/".$f->unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Rata-Rata Produksi Perhari</label>
                                            <input type="number" name="number" value="{{$x->number}}" class="form-control">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Jenis Produksi</label>
                                            <select name="status" class="form-control" id="">
                                                <option @if($x->status == "Nabati") selected @endif value="Nabati">Nabati</option>
                                                <option @if($x->status == "Hewani") selected @endif value="Hewani">Hewani</option>
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
    $(document).ready(function () {
        $('#table1').DataTable();
    });

    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
@endpush
