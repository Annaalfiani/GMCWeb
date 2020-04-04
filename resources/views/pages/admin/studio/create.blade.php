@extends('templates.admin')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Tambah Studio</h4>

                        <form method="POST" action="{{route('studio.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Nama Studio</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{$errors->has('nama_studio')?'is-invalid':''}}"
                                           type="text" name="nama_studio" value="{{old('nama_studio')}}">
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
                                           type="text" name="jumlah_kursi" value="{{old('jumlah_kursi')}}">
                                    @if ($errors->has(''))
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