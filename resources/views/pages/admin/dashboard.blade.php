@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info"><i class=""></i>{{count(App\Order::all())}}</h3>
                    Data Customer
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-danger"><i class=""></i>{{count(App\DataFilm::all())}}</h3>
                    Data Film
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary"><i class=""></i>{{count(App\JadwalTayang::all())}}</h3>
                    Jadwal Tayang
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card text-center m-b-30">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple"><i class=""></i>{{count(App\Studio::all())}}</h3>
                    Data Studio
                </div>
            </div>
        </div>
    </div>

    @endsection