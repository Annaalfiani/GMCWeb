@extends('templates.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Users</h4>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Hp</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->telp}}</td>
                            <td>
                                <button class="btn btn-danger">Hapus</button>
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