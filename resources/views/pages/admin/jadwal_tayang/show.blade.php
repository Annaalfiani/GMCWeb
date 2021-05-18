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
                            <th>Harga Hari Biasa</th>
                            <th>Harga Hari Weekend</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>{{\Carbon\Carbon::parse($tanggal_mulai)->translatedFormat('d F Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($tanggal_selesai)->translatedFormat('d F Y')}}</td>
                            <td>{{$data->studio->nama_studio}}</td>
                            <td>
                                @foreach($jams as $jam)
                                    {{ \Carbon\Carbon::parse($jam)->format('H:i').' WIB'}}<br/>
                                @endforeach
                            </td>
                            <td>Rp. {{number_format($data->harga,0,',','.')}}</td>
                            <td>Rp. {{number_format($data->harga_weekend,0,',','.')}}</td>
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