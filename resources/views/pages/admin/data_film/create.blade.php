@extends('templates.admin')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Tambah Data Film</h4>

                        <form method="POST" action="{{route('data_film.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2">Poster Film</label>
                                <div class="col-md-5">
                                    <input type="file" class="filestyle {{$errors->has('foto')?'is-invalid':''}}"
                                           name="foto" value="{{old('foto')}}" data-buttonname="btn-secondary">
                                    @if ($errors->has('foto'))
                                        <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('foto') }}</b></p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{$errors->has('judul')?'is-invalid':''}}"
                                           name="judul" value="{{old('judul')}}" type="text">

                                    @if ($errors->has('judul'))
                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('judul') }}</b></p>
                                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sinopsis</label>
                                <div class="col-sm-10">
                                    <textarea required class="form-control {{$errors->has('sinopsis')?'is-invalid':''}}"
                                              name="sinopsis" value="{{old('sinopsis')}}" rows="5"></textarea>

                                    @if ($errors->has('sinopsis'))
                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('sinopsis') }}</b></p>
                                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gendre</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="genre">
                                        <option>Romantic</option>
                                        <option>Horor</option>
                                        <option>Comedy</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-time-input" class="col-sm-2 control-label">Durasi</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="time" value="{{old('durasi')}}" name="durasi"
                                           id="example-time-input">

                                    @if ($errors->has('durasi'))
                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('durasi') }}</b></p>
                                                    </span>
                                    @endif
                                </div>

                            </div>

                            {{--<div class="form-group row">--}}
                            {{--<label class="col-sm-2 col-form-label">Status</label>--}}
                            {{--<div class="col-sm-10">--}}
                            {{--<input type="checkbox" id="switch1" checked switch="none" checked/>--}}
                            {{--<label for="switch1" data-on-label="On"--}}
                            {{--data-off-label="Off"></label>--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            <div class="form-group m-b-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div>

@endsection