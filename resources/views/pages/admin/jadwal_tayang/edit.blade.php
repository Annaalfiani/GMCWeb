@extends('templates.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">

                <div class="card-body">
                    <h4 class="mt-0 header-title">Edit Jadwal Tayang</h4>
                    <form method="POST" action="{{route('jadwal_tayang.update', $data->id)}}">
                        @csrf
                        {{method_field('patch')}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Judul Film</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_film">
                                    @foreach($datafilms as $datafilm)
                                        <option value="{{$datafilm->id}}" {{$data->id_film === $datafilm->id ? 'selected' : ''}}>
                                            {{$datafilm->judul}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Studio</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_studio">
                                    @foreach($studios as $studio)
                                        <option value="{{$studio->id}}" {{$data->id_studio === $studio->id ? 'selected' : ''}}>
                                            {{$studio->nama_studio}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-1 row">
                            <label for="example-time-input" class="col-sm-2 col-form-label">Jam Tayang</label>
                            <div id="myRepeatingFields" class="col-sm-10">
                                @foreach(explode(',',$data->jam_tayang) as $jam_tayang)
                                    <div class="entry input-group col-xs-3" style="margin-top: 10px;">
                                        <input class="form-control" value="{{$jam_tayang}}"
                                               name="jam_tayang[]" type="time"/>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-add">
                                                <span class="fa fa-plus" aria-hidden="true"
                                                      style="font-size: 12px;"></span>
                                            </button>
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Tanggal Tayang</label>
                            <div class="col-sm-10">
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" value="{{\Carbon\Carbon::parse($data->tanggal_mulai)->format('d/m/Y')}}" id="startDate"
                                           class="form-control" name="tanggal_mulai"/>
                                    @if ($errors->has('tanggal_mulai'))
                                        <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tanggal_mulai') }}</b></p>
                                        </span>
                                    @endif
                                    <input type="text" value="{{\Carbon\Carbon::parse($data->tanggal_selesai)->format('d/m/Y')}}" id="endDate"
                                           class="form-control" name="tanggal_selesai"/>
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
                                <input type="text" value="{{$data->harga}}" placeholder="Harga" class="form-control"
                                       name="harga">
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
                                <a href="{{route('jadwal_tayang.index')}}">
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

@section('script')
@section('script')

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

    <script>
        $('#date-range').datepicker({
            defaultDate: "+1w",
            format: 'dd-mm-yyyy',
            changeMonth: true,
            numberOfMonths: 1,
            startDate: new Date(),
        });

    </script>
@endsection
@endsection