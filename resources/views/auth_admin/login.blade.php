
<!DOCTYPE html>
<html>

<!-- Mirrored from themesbrand.com/fonik/menu2/blue/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2020 05:59:41 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Fonik - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{ asset ('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset ('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset ('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>


<body>



<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <h3 class="text-center m-0">
                <a href="{{ route('welcome') }}" class="logo logo-admin"><img src="{{ asset ('assets/images/gama.png') }}" height="80" alt="logo"></a>
            </h3>

            <div class="p-3">
                <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back Admin Sign In !</h4>

                <form class="form-horizontal m-t-30" method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control  @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                            <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


</div>


<!-- jQuery  -->
<script src="{{ asset ('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset ('assets/js/popper.min.js') }}"></script>
<script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset ('assets/js/waves.js') }}"></script>
<script src="{{ asset ('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset ('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset ('assets/js/jquery.scrollTo.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset ('assets/js/app.js') }}"></script>

</body>

<!-- Mirrored from themesbrand.com/fonik/menu2/blue/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2020 05:59:41 GMT -->
</html>
