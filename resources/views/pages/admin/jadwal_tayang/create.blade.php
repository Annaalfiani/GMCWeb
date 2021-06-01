@extends('templates.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Tambah Jadwal Tayang</h4>

                    <form method="POST" action="{{route('jadwal_tayang.store')}}"
					autocomplete="off">
                        @csrf
						{{-- <input type="text" id="length-item-hours" name="length_item_hours"> --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Judul Film</label>
                            <div class="col-sm-10">
                                <select class="form-control select-kategori" name="id_film" id="film-id">
									<option value="" selected disabled>Pilih Film</option>
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
                                        style="display: none">
										
								</select>
                            </div>
                        </div>

						<div class="form-group row">
                            <label class="col-md-2">Tanggal Tayang</label>
                            <div class="col-md-10">
                                <input type="text" name="tanggal" id="daterange" readonly class="form-control"
                                style="background: white; cursor: pointer"/>
                            </div>
                        </div>

                        <div class="form-group mt-1 row form-hours" style="display: none">
                            <label class="col-sm-2 col-form-label">Jam Tayang</label>
                            <div class="col-sm-10 hours">
                                <div class="input-group col-xs-6 input-group item-0" style="margin-top: 10px;">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
									<input type="text" class="form-control timepicker-0" id="hour-id-0" name="jam_tayangs[]">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add-item">
                                            <span class="fa fa-plus" aria-hidden="true" style="font-size: 12px;"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label for="projectinput2" class="col-sm-2">Harga Hari Biasa</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" id="rupiah"
                                           class="form-control bg-white" readonly
                                           placeholder="Harga" name="harga" value="25000">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="projectinput2" class="col-sm-2">Harga WeekEnd</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" id="rupiah"
                                           class="form-control bg-white" readonly
                                           placeholder="Harga" name="harga_weekend" value="30000">
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

@push('scripts')
    <script>
		const maxDate = moment().add(29, 'days').format('L')
		const date = moment().format('L');

		let index = 0;
		let interval = 60
		let startTime = '10:00'
		let startDisableDate = ''
		let endDisableDate = ''

		function initializeDateRangePicker() {  
			$('#daterange').daterangepicker({
				autoUpdateInput: false,
				format: 'yyyy/dd/mm',
				opens: 'left',
				"minDate": date,
				"maxDate": maxDate,
				isInvalidDate: function(date) {
            		return (date >= startDisableDate && date <= endDisableDate);
        		}
			});
			
		}

		$('#daterange').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
		});

		$('#daterange').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		function initializeTimePicker(interval){
			$('.timepicker-'+index).timepicker({
				timeFormat: 'HH:mm',
				interval: interval,
				minTime: startTime,
				maxTime: '23:00',
				//defaultTime: '10',
				startTime: startTime,
				dynamic: false,
				dropdown: true,
				scrollbar: true,
				change: timePickerOnChange
			});
			//setLengthItemLength()
		}

		function timePickerOnChange() {  
			startTime = $('#hour-id-'+index).val()
		}

		function setLengthItemLength(){
			$('#length-item-hours').val($('.ui-timepicker-viewport').children().length)
		}
		
		

		$(document).on('change', '#film-id', function (e) {  
			e.preventDefault()
			const film_id = $(this).val()
			const url = "{{ route('film.get.one', '') }}"+"/"+film_id
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				beforeSend: function () {
					index = 0
					startTime = '10.00'
					$('.timepicker-'+index).timepicker('destroy')
					$('#hour-id-0').val('')
					if ($('.hours').children().length > 1) {
						$('.hours').children().not(':first').empty();	
					}
					$('.form-hours').hide()
				},
				success: function(value) {
					interval = parseInt(value) + 30
					initializeTimePicker(interval)
					$('.form-hours').show()
				}
			});
		})

		$(document).on('change', '#select-studio', function (e) {  
			e.preventDefault()
			const studio_id = $(this).val()
			const url = "{{ route('get.date.studio', '') }}"+"/"+studio_id
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				beforeSend: function () {
				},
				success: function(data) {
					endDisableDate = moment(data[0])
					startDisableDate = moment(data[data.length-1])
					initializeDateRangePicker()
				}
			});
		})

		$(document).on('click', '.btn-add-item', function (e) {  
			e.preventDefault()
			index++
			startTime = moment(startTime, "HH:mm").add(interval, 'minutes').format('HH:mm')
			$('.hours').append(addItem())
			initializeTimePicker(interval)
		})

		$(document).on('click', '.btn-remove-item', function (e) {  
			e.preventDefault()
			const key = $(this).data('key')
			$('.item-'+key).remove()
		})

		function addItem() {  
			let item = ''
				item += '<div class="input-group col-xs-6 input-group item-'+index+'" style="margin-top: 10px;">'
				item += '	<span class="input-group-addon">'
				item += '		<span class="glyphicon glyphicon-time"></span>'
				item += '	</span>'
				item += '	<input type="text" class="form-control timepicker-'+index+'" id="hour-id-'+index+'" name="jam_tayangs[]">'
				item += '	<span class="input-group-btn">'
				item += '		<button data-key="'+index+'" type="button" class="btn btn-danger btn-remove-item">'
				item += '			<span class="fa fa-minus" aria-hidden="true" style="font-size: 12px;"></span>'
				item += '		</button>'
				item += '	</span>'
				item += '</div>'
			return item
		}
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
				studio += '<option value="" selected disabled>-- Pilih Studio --</option>'
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

@endpush