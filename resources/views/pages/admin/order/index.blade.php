@extends('templates.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between">
                <div><h4 class="card-title">Data Users</h4></div>
                <div><a href="{{ route('admin.order.create') }}" class="btn btn-primary">Tambah</a></div>
            </div>

            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                       
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection