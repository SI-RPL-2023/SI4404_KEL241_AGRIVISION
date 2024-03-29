@extends('dashboard.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="row">
    <div class="col card">

        <h1 class="text-center m-3">List Pasar </h1>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
            Tambahkan Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.storeMarketMaping')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body bg-white">
                            <div class="form-group m-3">
                                <label for="">Nama Pasar</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Keterangan</label>
                                <textarea type="text" name="description" class="form-control"> </textarea>
                            </div>

                            <div class="form-group m-3">
                                <label for="">Kecamatan Pasar</label>
                                <select name="kecamatan_id" class="form-control" id="">
                                    @foreach($kecamatan as $k)
                                    <option value="{{$k->id}}">{{$k->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-3">
                                <label for="">Luas (m&#xB2;)</label>
                                <input type="number" name="number" class="form-control">
                            </div>

                            <div class="form-group m-3">
                                <label for="">Jenis Pasar</label>
                                <select name="status" class="form-control" id="">
                                    <option value="Pasar Tradisional">Pasar Tradisional</option>
                                    <option value="Pasar Modern">Pasar Modern</option>
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
                        <th>Nama Pasar</th>
                        <th>Keterangan</th>
                        <th>Nama Provinsi</th>
                        <th>Nama Kota</th>
                        <th>Nama Kecamatan</th>
                        <th>Luas (m&#xB2;)</th>
                        <th>Jenis Pasar</th>
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
                        <td>{{$x->number}}</td>
                        <td>{{$x->status}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$x->id}}">
                                Edit Data
                            </button>

                            <a href="{{route('admin.deleteMarketMaping' , ['id'=>$x->id])}}" class="btn btn-danger"> Delete Data</a>
                        </td>
                    </tr>



                    <?php $t++ ?>
                    <div class="modal fade" id="edit{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pasar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('admin.updateMarketMaping' , ['id'=>$x->id])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body bg-white">
                                        <div class="form-group m-3">
                                            <label for="">Nama Pasar</label>
                                            <input type="text" name="title" value="{{$x->title}}" class="form-control">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Keterangan</label>
                                            <textarea type="text" name="description" class="form-control">{{$x->description}}</textarea>
                                        </div>


                                        <div class="form-group m-3">
                                            <label for="">Kecamatan Pasar</label>
                                            <select name="kecamatan_id" class="form-control" id="">
                                                @foreach($kecamatan as $k)
                                                <option @if($x->kecamatan_id == $k->id) selected @endif value="{{$k->id}}">{{$k->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Luas (m&#xB2;)</label>
                                            <input type="number" name="number" value="{{$x->number}}" class="form-control">
                                        </div>

                                        <div class="form-group m-3">
                                            <label for="">Jenis Pasar</label>
                                            <select name="status" class="form-control" id="">
                                                <option @if($x->status == "Pasar Tradisional") selected @endif value="Pasar Tradisional">Pasar Tradisional</option>
                                                <option @if($x->status == "Pasar Modern") selected @endif value="Pasar Modern">Pasar Modern</option>
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
