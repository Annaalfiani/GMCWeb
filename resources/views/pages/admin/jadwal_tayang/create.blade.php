@extends('templates.admin')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/bootstrap-clockpicker.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Tambah Jadwal Tayang</h4>

                    <form method="POST" action="{{route('jadwal_tayang.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Judul Film</label>
                            <div class="col-sm-10">
                                <select class="form-control select-kategori" name="id_film">
                                    @foreach($datafilms as $datafilm)
                                        <option value="{{$datafilm->id}}">{{$datafilm->judul}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" id="label-studio" style="display: none">Nama
                                Studio</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_studio" id="select-studio"
                                        style="display: none"></select>
                            </div>
                        </div>

                        <div class="form-group mt-1 row">
                            <label class="col-sm-2 col-form-label">Jam Tayang</label>
                            <div id="myRepeatingFields" class="col-sm-10">

                                <div class="entry input-group col-xs-6 input-group clockpicker" style="margin-top: 10px;">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                    <input type="text" class="form-control" name="jam_tayang[]"
                                           style="cursor: pointer; background: white" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add">
                                            <span class="fa fa-plus" aria-hidden="true" style="font-size: 12px;"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Tanggal Tayang</label>
                            <div class="col-sm-10">
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control" id="startDate" name="start" readonly
                                           style="cursor: pointer; background: white"/>
                                    <input type="text" class="form-control" id="endDate" name="end" readonly
                                           style="cursor: pointer; background: white"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="projectinput2" class="col-sm-2">Harga</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" id="rupiah"
                                           class="form-control {{$errors->has('harga')?'is-invalid':''}}"
                                           placeholder="Harga" name="harga" value="{{old('harga')}}">
                                    @if ($errors->has('harga'))
                                        <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('harga') }}</b></p>
                                    </span>
                                    @endif
                                </div>
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
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('script')

    <script>
        $('#date-range').datepicker({
            defaultDate: "+1w",
            //format: "d-m-y",
            changeMonth: true,
            numberOfMonths: 1,
            startDate: new Date(),
        });
    </script>


    <script>
        const selectKategori = document.querySelector('.select-kategori');
        const selectStudio = document.querySelector('#select-studio');
        const studio = document.querySelectorAll('#studio');
        const labelStudio = document.querySelector('#label-studio');
        selectKategori.addEventListener('change', function () {
            var id = selectKategori.value
            var url = '{{ route("film.studio", ":id") }}'
            url = url.replace(':id', id)

            $.get(url, function (data) {
                selectStudio.style.display = ''
                labelStudio.style.display = ''
                let studio;
                data.map(s => {
                    studio += `<option value="${s['id']}">${s['nama_studio']}</option>`
            });
selectStudio.innerHTML = studio
            })
        })
    </script>

    <script>
        var rupiah = document.getElementById('rupiah')
        rupiah.addEventListener('keyup', function (e) {
            rupiah.value = formatRupiah(this.value)
        })

        function formatRupiah(angka) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
            return rupiah;
        }
    </script>

    <script type="text/javascript" src="{{ asset('assets/dist/bootstrap-clockpicker.min.js') }}"></script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker({
            donetext: 'Done',
            'default' : 'now'
        });
    </script>

@endsection