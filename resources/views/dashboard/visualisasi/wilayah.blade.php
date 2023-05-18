@extends('dashboard.main')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="row">
        <div class="col card w-50">
            <h2 class="text-center m-3">Data Wilayah {{$kecamatan->name}} </h2>

            <form action="{{route('visualisasi.search.kecamatan')}}" class="m-3" method="get">
                @csrf
                @method('get')
                <div class="form-group d-flex">
                    <label for="">Search Kecamatan</label>
                <select name="kecamatan_id" id="" class="form-control">
                    @foreach($kecamatanAll as $x)
                        <option value="{{$x->id}}">{{$x->name}}</option>
                    @endforeach
                </select>
                    <button class="btn btn-success" type="submit">Search</button>
                </div>

            </form>


            <form action="{{route('visualisasi.search.kota')}}" class="m-3" method="get">
                @csrf
                @method('get')
                <div class="form-group d-flex">
                    <label for="">Search Kota</label>
                    <select name="kecamatan_id" id="" class="form-control">
                        @foreach($kota as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success" type="submit">Search</button>
                </div>

            </form>

            <form action="{{route('visualisasi.search.provinsi')}}" class="m-3" method="get">
                @csrf
                @method('get')
                <div class="form-group d-flex">
                    <label for="">Search Kota</label>
                    <select name="kecamatan_id" id="" class="form-control">
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

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['pasar', 'pabrik', 'Pertainian', 'Request Pangan', 'Request Non Pangan'],
                datasets: [{
                    label: 'Jumlah Data',
                    data: [{{$pasar}}, {{$pabrik}}, {{$agri}}, {{$foodRequest}}, {{$nonFoodRequest}} ],
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
@endpush
