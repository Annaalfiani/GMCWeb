@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Data Customer</h4>
                    <div class="button-items">
                        <a href="{{route('customer.create')}}">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Create
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
                    <p></p>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                        </thead>


                        <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection