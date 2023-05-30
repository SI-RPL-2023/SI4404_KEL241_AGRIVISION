@extends('dashboard.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="row">
    <div class="col card">

        <h1 class="text-center m-3">List Kategori Pangan</h1>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
            Tambahkan Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori Pangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.storeFood')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body bg-white">
                            <div class="form-group m-3">
                                <label for="">Nama Pangan</label>
                                <input type="text" name="food_name" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Satuan Unit</label>
                                <input type="text" name="unit" class="form-control">
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
                    <th>Nama Pangan</th>
                    <th>Satuan Unit</th>
                    <th>Aksi</th>
                </tr>
                <?php $t = 1 ?>
                @foreach($data as $x)
                <tr>
                    <td>{{$t}}</td>
                    <td>{{$x->food_name}}</td>
                    <td>{{$x->unit}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                            Edit Data
                        </button>

                        <a href="{{route('admin.deleteFood' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
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
                            <form action="{{route('admin.updateFood' , ['id'=>$x->id])}}" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-body bg-white">
                                    <div class="form-group m-3">
                                        <label for="">Nama Pangan</label>
                                        <input type="text" name="food_name" class="form-control" value="{{$x->food_name}}">
                                    </div>

                                    <div class="form-group m-3">
                                        <label for="">Satuan Unit</label>
                                        <input type="text" name="unit" value="{{$x->unit}}" class="form-control">
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
