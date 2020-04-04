@extends('templates.admin')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Edit Studio</h4>

                        <form method="POST" action="{{route('studio.update', $data->id)}}">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-group row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Nama Studio</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{$errors->has('nama_studio')?'is-invalid':''}}"
                                           type="text" name="nama_studio" value="{{$data->nama_studio}}">
                                    @if ($errors->has('nama_studio'))
                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nama_studio') }}</b></p>
                                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Jumlah Kursi</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{$errors->has('jumlah_kursi')?'is-invalid':''}}"
                                           type="text" name="jumlah_kursi" value="{{$data->jumlah_kursi}}">
                                    @if ($errors->has('jumlah_kursi'))
                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('jumlah_kursi') }}</b></p>
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
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div>

@endsection