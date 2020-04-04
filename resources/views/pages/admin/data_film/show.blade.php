@extends('templates.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                        <h4 class="mt-0 header-title">{{$data->judul}}</h4>
                        <p class="text-muted m-b-30 font-14">{{$data->created_at}}</p>

                        <div class="media m-b-30">
                            <img class="d-flex align-self-start mr-3" src="{{asset('uploads/admin/'.$data->foto)}}"
                                 alt="Generic placeholder image" width="220" height="300">
                            <div class="media-body">
                                <h5 class="mt-0 font-18">Sinopsis</h5>
                                <p>{{$data->sinopsis}}</p>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection