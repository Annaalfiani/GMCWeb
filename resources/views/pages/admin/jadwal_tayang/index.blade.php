@extends('templates.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Jadwal Tayang</h4>
            <div class="button-items">
                <a href="{{route('jadwal_tayang.create')}}">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Create
                        <i class="fa fa-plus"></i>
                    </button>
                </a>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Film</th>
                            <th>Nama Studio</th>
                            <th>Harga Biasa</th>
                            <th>Harga Weekend</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->datafilm->judul}}</td>
                                <td>{{$data->studio->nama_studio}}</td>


                                {{--@foreach($data->jam_tayangs as $jam)
                                    <td>{{$jam->jam_tayang}}</td>
                                @endforeach--}}


                                <td>Rp. {{number_format($data->harga,0,',','.')}}</td>
                                <td>Rp. {{number_format($data->harga_weekend,0,',','.')}}</td>
                                <td>
                                    <a href="{{route('jadwal_tayang.destroy', $data->id)}}" class="card-link">
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')">
                                            <i class="fa fa-trash"></i>

                                        </button>
                                    </a>
                                    <a href="{{route('jadwal_tayang.show', $data->id)}}">
                                        <button class="btn btn-default">
                                            <i class="fa fa-eye">
                                            </i>

                                        </button>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection