@extends('templates.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">

                    <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Data Film</h4>
                        <form method="POST" action="{{route('data_film.update', $data->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">File upload</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="old_foto" class="filestyle" value="{{$data->foto}}"/>
                                        <input class="form-control {{$errors->has('foto')?'is-invalid':''}}"
                                               type="file" name="foto" onchange="loadfile(event)" id="foto"/>
                                        <br/>
                                        <img id="output" class="img-fluid" height="100" width="100"
                                             src="{{asset('uploads/admin/'.$data->foto)}}">
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
                                               name="judul" value="{{$data->judul}}" type="text">

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
                                              name="sinopsis" rows="5">{{$data->sinopsis}}</textarea>

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
                                            <option value="Romatic" @if($data->genre=='Romantic'){{ "selected" }} @endif>
                                                Romantic
                                            </option>
                                            <option value="Horor" @if($data->genre=='Horor'){{ "selected" }} @endif>
                                                Horor
                                            </option>
                                            <option value="Comedy" @if($data->genre=='Comedy'){{ "selected" }} @endif>
                                                Comedy
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-time-input" class="col-sm-2 control-label">Durasi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="time" value="{{$data->durasi}}" name="durasi"
                                               id="example-time-input">

                                        @if ($errors->has('durasi'))
                                            <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('durasi') }}</b></p>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <a href="{{route('data_film.index')}}" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

<script>
    var loadfile = function (event) {
        var foto = document.getElementById('foto');
        var output = document.getElementById('output');
        if (foto && foto.value) {
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.display = '';
        }
    };
</script>