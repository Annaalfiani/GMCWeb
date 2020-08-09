@extends('templates.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                        <h4 class="mt-0 header-title">DETAIL FILM</h4>


                        <div class="media m-b-30">
                            <img class="d-flex align-self-start mr-3" src="{{$data->foto}}"
                                 alt="Generic placeholder image" width="220" height="300">
                            <div class="media-body">
                                <h5 class="mt-0 font-18">Judul</h5>
                                <p>{{$data->judul}}</p>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 font-18">Genre</h5>
                                <p>{{$data->genre}}</p>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 font-18">Durasi</h5>
                                <p>{{$data->durasi}}</p>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 font-18">Bahasa</h5>
                                <p>{{$data->bahasa}}</p>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 font-18">Sutradara</h5>
                                <p>{{$data->sutradara}}</p>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 font-18">Tanggal Rilis</h5>
                                <p>{{$data->tanggal_rilis}}</p>
                            </div>
                            {{--<div class="media-body">--}}
                                {{--<h5 class="mt-0 font-18">Pemain</h5>--}}
                               {{--@foreach($pemains as $pemain)--}}
                                {{--<p>{{$data->film->nama}}</p>--}}
                                   {{--@endforeach--}}
                            {{--</div>--}}
                        </div>

                    <div class="media m-b-30">
                        <div class="media-body">
                            <p><h5 class="mt-0 font-18">Sinopsis</h5></p>
                            <p>{{$data->sinopsis}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection