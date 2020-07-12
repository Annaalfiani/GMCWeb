@extends('templates.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data table</h4>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Film</th>
                            <th>Studio</th>
                            <th>Nomor Kursi</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Total Harga</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->customers->name}}</td>
                            <td>{{$data->films->judul}}</td>
                            <td>{{$data->studios->nama_studio}}</td>
                            @foreach($data->orderdetails as $orderdetail)
                            <td>{{$orderdetail->kursi->nama_kursi}}</td>
                            @endforeach
                            <td>{{$data->tanggal}}</td>
                            <td>{{$data->jam}}</td>
                            <td>{{$data->total_harga}}</td>
                            <td>
                                <button class="btn btn-outline-primary">View</button>
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