@extends('templates.admin')
@section('content')
    <style>
        .seats {
            width: 64%;
        }
        .seat {
            margin: 3px;
            width: 40px;
            height: 40px;
            color: white;
            text-align: center;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        .available {
            background: green;
            cursor: pointer;
        }
        .booked {
            background: red;
        }
        .selected {
            background: darkblue;
            cursor: pointer;
        }

        .screen {
            width: 64%;
            height: 20px;
            background-color: deepskyblue;
            color: black;
            text-align: center;
            border-radius: 10px;
        }

        .nb {
            width: 10px;
            height: 10px;
        }

    </style>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pesan Tiket</h4>
            <div class="row">
                <div class="col-12">
                    <form action="" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schedulle">Jadwal</label>
                                    <input type="text" class="form-control" value="{{ $day_now }}" readonly>
                                    <input type="hidden" name="schedulle" id="schedulle" value="{{ $now }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 price">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="film">Film</label>
                            <select name="film" id="film" class="form-control">
                                <option selected disabled>Pilih Film</option>
                                @foreach ($nowPlayings as $playing)
                                    <option value="{{ $playing->id }}">{{ $playing->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        $(document).on('change', '#film', function() {
            var date = $('#schedulle').val()
            $('.studio-group').remove()
            $.ajax({
                url : BASE_URL+'/admin/order/get-studios',
                type : 'POST',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    date : date,
                    filmId : $(this).val()
                },
                beforeSend: function() {
                    
                },
                success: function(res) {
                    if (res.status) {
                        $('#form').append(showStudios(res.data))
                    }
                }
            })
        })

        function showStudios(data){
            var cols = ''
                cols += '<div class="form-group studio-group">'
                cols += '    <label for="studio">Studio</label>'
                cols += '    <input type="hidden" name="dateId" id="dateId">'
                cols += '    <select name="studio" id="studio" class="form-control">'
                cols += '        <option selected disabled>Pilih Studio</option>'
                                    $.each(data, function(index, value){
                                        cols += '<option data-date="'+value.date_id+'" value="'+value.id+'">'+value.nama_studio+'</option>'
                                    })
                cols += '    </select>'
                cols += '</div>'
            return cols
        }

        $(document).on('change', '#studio', function() {
            var dateId = $('option:selected', this).data('date');
            $('#dateId').val(dateId)

            $('.hours-group').remove()
            var dateId = $('#dateId').val()
            var studioId =$(this).val()
            $.ajax({
                url : BASE_URL+'/admin/order/get-hours/'+dateId+'/'+studioId,
                type : 'GET',
                dataType: "json",
                beforeSend: function() {
                    
                },
                success: function(res) {
                    if (res.status) {
                        $('#form').append(showHours(res.data))
                        getPrice(dateId)
                    }
                }
            })
        })


        function getPrice(dateId){
            $.ajax({
                url : BASE_URL+'/admin/order/get-price/'+dateId,
                type : 'GET',
                dataType: "json",
                beforeSend: function() {
                    
                },
                success: function(res) {
                    $('.price').append(showPrice(res));

                }
            })
        }

        function showPrice(price){
            var cols = ''
                cols += '<div class="form-group">'
                cols += '    <label for="price">Harga</label>'
                cols += '    <input type="text" id="price" class="form-control" value="'+price+'" readonly>'
                cols += '</div>'
            return cols
        }

        function showHours(data){
            var cols = ''
                cols += '<div class="form-group hours-group">'
                cols += '    <label for="hour">Jam</label>'
                cols += '    <select name="hour" id="hour" class="form-control">'
                cols += '        <option selected disabled>Pilih Jam</option>'
                                    $.each(data, function(index, value){
                                        cols += '<option value="'+value.jam+'">'+value.jam+'</option>'
                                    })
                cols += '    </select>'
                cols += '</div>'
            return cols
        }

        $(document).on('change', '#hour', function() {
            $('.seats-group').remove()
            var data = {
                jam : $('#hour').val(),
                tanggal : $('#schedulle').val(),
                id_film : $('#film').val(),
                id_studio : $('#studio').val(),
            };
            $.ajax({
                url : BASE_URL+'/admin/order/get-seats',
                type : 'POST',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                beforeSend: function() {
                },
                success: function(res) {
                    if (res.status) {
                        $('#form').append(showSeats(res.data))
                    }
                }
            })
        })

        function showSeats(data){
            var form = ''
                form += '<div class="form-group seats-group">'
                form += '    <label for="schedulle">Kursi</label>'
                form += '    <div class="screen">Screen</div>'
                form += '    <div class="row justify-content-center seats">'
                            $.each(data.seats, function(index, value){
                                if (value.status == 'available') {
                                    form += '        <div class="seat available" data-id="'+value.id+'">'
                                    form += '            '+value.nama_kursi+''
                                    form += '        </div>'   
                                }else{
                                    form += '        <div class="seat booked">'
                                    form += '            '+value.nama_kursi+''
                                    form += '        </div>'   
                                }
                            })
                form += '    </div>'
                form += '    <div>'
                form += '        <div class="row align-items-center">'
                form += '            <div class="nb available mr-2"></div>'
                form += '            <div>Masih Kosong</div>'
                form += '        </div>'
                form += '        <div class="row align-items-center">'
                form += '            <div class="nb booked mr-2"></div>'
                form += '            <div>Sudah Dipesan</div>'
                form += '        </div>'
                form += '        <div class="row align-items-center">'
                form += '            <div class="nb selected mr-2"></div>'
                form += '            <div>Di Pilih</div>'
                form += '        </div>'
                form += '    </div>'
                form += '</div>'
                form += '<button class="btn btn-sm btn-success float-right" type="submit">Order</button>'
            return form
        }

        var seatIds = [];
        $(document).on('click', '.seat', function() {
            var seatId = $(this).data('id');
            if ($(this).hasClass('available')) {
                seatIds.push(seatId);
                $(this).removeClass('available').addClass('selected');   
            }else if ($(this).hasClass('selected')){
                seatIds.splice( $.inArray(seatId, seatIds),1);
                $(this).removeClass('selected').addClass('available');
            }else if ($(this).hasClass('booked')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'kursi sudah di pesan'
                });
            }
        })

        $(document).submit('#form', function(e) {
            e.preventDefault();
            var data = {
                kursi : seatIds,
                id_film : $('#film').val(),
                id_studio : $('#studio').val(),
                jam : $('#hour').val(),
                tanggal : $('#dateId').val(),
                harga : $('#price').val(),
            }
            $.ajax({
                url : BASE_URL+'/admin/order/store',
                type : 'POST',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                beforeSend: function() {
                    
                },
                success: function(res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: res.message
                        }).then( ()=> window.location.reload());
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.message
                        });
                    }
                }
            })
        })
    </script>
@endsection
