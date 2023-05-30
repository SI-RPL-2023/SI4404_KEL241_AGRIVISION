@extends('dashboard.main')

@section('content')


@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="row">
    <div class="col card">

        <h1 class="text-center m-3">Pemetaan Kota</h1>


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
                    <form action="{{route('admin.storeKota')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body bg-white">
                            <div class="form-group m-3">
                                <label for="">Nama Kota</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Nama Provinsi</label>
                                <select name="id_provinsi" class="form-control form-control-lg">
                                    @foreach($provinsi as $pro)
                                    <option value="{{$pro->id}}">{{$pro->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-3">
                                <label for="">Jumlah Kepala Keluarga</label>
                                <input type="number" name="no_head_citizen" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Jumlah Masyarakat</label>
                                <input type="number" name="no_citizen" class="form-control">
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
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>Nama Kota</th>
                    <th>Nama Provinsi</th>
                    <th>Jumlah Kepala Keluarga</th>
                    <th>Jumlah masyarakat</th>
                    <th>Aksi</th>
                </tr>
                <?php $t = 1 ?>
                @foreach($data as $x)
                <tr>
                    <td>{{$t}}</td>
                    <td>{{$x->name}}</td>
                    <td>{{$x->provinsi->name}}</td>
                    <td>{{$x->no_head_citizen}}</td>
                    <td>{{$x->no_citizen}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                            Edit Data
                        </button>

                        <a href="{{route('admin.deleteKota' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
                    </td>
                </tr>

                <div class="modal fade" id="edit{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('admin.updateKota' , ['id'=>$x->id])}}" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-body bg-white">
                                    <div class="form-group m-3">
                                        <label for="">Nama Provinsi</label>
                                        <input type="text" name="name" class="form-control" value="{{$x->name}}">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Jumlah Kepala Keluarga</label>
                                        <input type="number" name="no_head_citizen" value="{{$x->no_head_citizen}}" class="form-control">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Jumlah Masyarakat</label>
                                        <input type="number" name="no_citizen" value="{{$x->no_citizen}}" class="form-control">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Nama Provinsi</label>
                                        <select name="id_provinsi" class="form-control form-control-lg">
                                            @foreach($provinsi as $pro)


                                            <option value="{{$pro->id}}" @if($pro->id == $x->provinsi_id) selected @endif >{{$pro->name}}</option>
                                            @endforeach
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



                <?php $t++ ?>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
