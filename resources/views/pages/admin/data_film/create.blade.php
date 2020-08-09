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
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sutradara</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{$errors->has('sutradara')?'is-invalid':''}}"
                                           name="sutradara" value="{{old('sutradara')}}" type="text">

                                    @if ($errors->has('sutradara'))
                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('sutradara') }}</b></p>
                                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bahasa</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="bahasa">
                                        <option>Arab</option>
                                        <option>Korea</option>
                                        <option>Indonesia</option>
                                        <option>Inggris</option>
                                        <option>Thailand</option>
                                        <option>Spanyol</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Genre</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="genre">
                                        <option>Romantic</option>
                                        <option>Horor</option>
                                        <option>Comedy</option>
                                        <option>Drama</option>
                                        <option>Animation</option>
                                        <option>Action</option>
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


                            <div class="form-group mt-1 row">
                                <label class="col-sm-2 col-form-label">Pemain</label>
                                <div id="myRepeatingFields" class="col-sm-10">

                                    <div class="entry input-group col-xs-6 input-group" style="margin-top: 10px;">
                                <span class="input-group-addon">
                                    <span class="glyphicon"></span>
                                </span>
                                        <input type="text" class="form-control" name="pemain[]"
                                               style="cursor: pointer; background: white">
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add">
                                            <span class="fa fa-plus" aria-hidden="true" style="font-size: 12px;"></span>
                                        </button>
                                    </span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-2">Tanggal Rilis</label>
                                <div class="col-sm-10">
                                  <div id="datepicker-popup" class="input-group date datepicker">
                                    <input type="text" class="form-control" name="tanggal_rilis">
                                    <span class="input-group-addon input-group-append border-left">
                          <span class="icon-calendar input-group-text"></span>
                        </span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group m-b-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a href="{{route('data_film.index')}}" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div>

@endsection