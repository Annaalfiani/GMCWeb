@extends('templates.manager')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Laporan Penjualan Tiket</h4>
            <div class="align-right">
                <a href="{{route('export.excel')}}">

                    <button class="btn btn-success fa fa-print">Export Laporan</button>
                </a>
                <p></p>
            </div>
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->customers->name}}</td>
                                <td>{{$data->films->judul}}</td>
                                <td>{{$data->studios->nama_studio}}</td>
                                <td>
                                    @foreach($data->orderdetails as $orderdetail)
                                        {{$orderdetail->kursi->nama_kursi}}<br/><br/>
                                    @endforeach
                                </td>
                                <td>{{$data->tanggal}}</td>
                                <td>{{$data->jam}}</td>
                                <td>{{$data->total_harga}}</td>
                                {{--<td>--}}
                                {{--<button class="btn btn-outline-primary">View</button>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection