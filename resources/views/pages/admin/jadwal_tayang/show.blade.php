@extends('templates.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h1 class="header-title">{{$data->datafilm->judul}}</h1>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Studio</th>
                            <th>Jam Tayang</th>
                            <th>Harga</th>
                        </tr>
                        </thead>


                        <tbody>
                        <tr>
                            <td>{{$data->tanggal_mulai}}</td>
                            <td>{{$data->tanggal_selesai}}</td>
                            <td>{{$data->studio->nama_studio}}</td>
                            <td>
                                {{--<div class="btn-group m-b-10">--}}
                                    {{--<button type="button" class="btn btn-primary">Jam Tayang</button>--}}
                                    {{--<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--<span class="sr-only">Toggle Dropdown</span>--}}
                                    {{--</button>--}}
                                    {{--<div class="dropdown-menu">--}}
                                        {{--@foreach($data->jam_tayangs as $jam_tayang)--}}
                                            {{--<p>{{ $jam_tayang->jam_tayang }}</p>--}}
                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                @foreach($data->jam_tayangs as $jam_tayang)
                                    <p>{{ $jam_tayang->jam_tayang }}</p>
                                @endforeach
                            </td>
                            <td>{{$data->harga}}</td>
                        </tr>
                        </tbody>
                        <p>

                        </p>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection