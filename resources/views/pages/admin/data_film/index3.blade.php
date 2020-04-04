@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            @if($message = Session::get('create'))
                <div class="alert alert-success alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{$message}}
                </div>
            @endif

            @if($message = Session::get('update'))
                <div class="alert alert-success alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{$message}}
                </div>
            @endif

            @if($message = Session::get('delete'))
                <div class="alert alert-success alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{$message}}
                </div>
            @endif
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Data Film</h4>
                    <div class="button-items">
                        <a href="{{route('data_film.create')}}">
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
                            <th>Poster</th>
                            <th>Judul</th>
                            <th>Sinopsis</th>
                            <th>Genre</th>
                            <th>Durasi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{asset('uploads/admin/'.$data->foto)}}" width="70" height="100"> </td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->sinopsis}}</td>
                            <td>{{$data->genre}}</td>
                            <td>{{$data->durasi}}</td>

                            <td>
                                <div>
                                    <input type="checkbox" id="switch1" checked switch="none" checked/>
                                    <label for="switch1" data-on-label="On"
                                           data-off-label="Off"></label>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('data_film.edit', $data->id)}}">
                                <button class="btn btn-warning">
                                    <i class="fa fa-pencil">
                                    </i>

                                </button>
                                </a>
                                <a  href="{{route('data_film.destroy', $data->id)}}">
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