@extends('templates.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">

                    <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Jadwal Tayang</h4>
                        <form method="POST" action="{{route('jadwal_tayang.update', $data->id)}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Judul Film</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_film">
                                        @foreach($datafilms as $datafilm)
                                            <option value="{{$datafilm->id}}">{{$datafilm->judul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Studio</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_studio">
                                        @foreach($studios as $studio)
                                            <option value="{{$studio->id}}">{{$studio->nama_studio}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-1 row">
                                <label for="example-time-input" class="col-sm-2 col-form-label">Jam Tayang</label>
                                <div id="myRepeatingFields" class="col-sm-10">
                                    <div class="entry input-group col-xs-3" style="margin-top: 10px;">
                                        <input class="form-control" value=""
                                               name="jam_tayang[]" type="time"/>
                                        {{--@foreach($data->jam_tayangs as $jam_tayang)--}}
                                            {{--<option value="{{$jam_tayang->jam_tayang}}"></option>--}}
                                        {{--@endforeach--}}
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add">
                                            <span class="fa fa-plus" aria-hidden="true" style="font-size: 12px;"></span>
                                        </button>
                                    </span>
                                    </div>
                                </div>

                            </div>

                            @foreach($data->jam_tayangs as $jam_tayang)
                                <p>{{ $jam_tayang->jam_tayang }}</p>
                            @endforeach

                            <div class="form-group row">
                                <label class="col-md-2">Tanggal Tayang</label>
                                <div class="col-sm-10">
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" value="{{$data->tanggal_mulai}}" class="form-control" name="mulai" />
                                        @if ($errors->has('tanggal_mulai'))
                                            <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tanggal_mulai') }}</b></p>
                                        </span>
                                        @endif
                                        <input type="text" value="{{$data->tanggal_selesai}}" class="form-control" name="selesai" />
                                        @if ($errors->has('tanggal_selesai'))
                                            <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tanggal_selesai') }}</b></p>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-time-input" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$data->harga}}" placeholder="Harga" class="form-control" name="harga">
                                    @if ($errors->has('harga'))
                                        <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('harga') }}</b></p>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group m-b-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a href="{{route('studio.index')}}">
                                        <button type="button" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </a>
                                </div>
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