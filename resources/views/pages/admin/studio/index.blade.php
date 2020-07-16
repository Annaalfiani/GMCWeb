@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Data Studio</h4>
                    <div class="button-items">
                        <a href="{{route('studio.create')}}">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Create
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
<p></p>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Studio</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_studio}}</td>

                            <td>
                                {{--<a href="{{route('studio.edit', $data->id)}}">--}}
                                    {{--<button class="btn btn-warning">--}}
                                        {{--<i class="fa fa-pencil">--}}
                                        {{--</i>--}}

                                    {{--</button>--}}
                                {{--</a>--}}
                                <a  href="{{route('studio.destroy', $data->id)}}">
                                    <button class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')">
                                        <i class="fa fa-trash"></i>

                                    </button>
                                </a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection