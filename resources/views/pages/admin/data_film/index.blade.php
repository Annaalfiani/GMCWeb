@extends('templates.admin')
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header-title">
                <h4>Data Film</h4>
                <a href="{{route('data_film.create')}}">
                    <button class="float-right btn btn-primary"><i class="fa fa-plus"></i></button>
                </a>
            </div>

            <div class="row">
                @foreach($datas as $data)
                    <div class="col-md-6 col-lg-6 col-xl-2">
                        <!-- Simple card -->
                        <div class="card m-b-30">
                            <img class="card-img-top" src="{{asset($data->foto)}}" height="250"
							style="object-fit: cover; object-position: center">
                            <div class="card-body">
                                <h4 class="card-title font-20 mt-0">
                                    <a href="{{route('data_film.show', $data->id)}}">{{$data->judul}}</a>
                                </h4>
                                <p class="card-text">{{$data->genre}}</p>
                                <div class="d-flex justify-content-center">
                                    <span class="badge badge-success">
                                        {{ $result[$data->id] ? $result[$data->id] : '' }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <a href="{{route('data_film.edit', $data->id)}}" class="card-link">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                </a>
                                <a href="{{route('data_film.destroy', $data->id)}}" class="card-link">
                                    <button class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')">
                                        <i class="fa fa-trash"></i>

                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>

                @endforeach
                <br>
            </div>
        </div>
    </div>

@endsection