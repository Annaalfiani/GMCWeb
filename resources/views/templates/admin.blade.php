<!DOCTYPE html>
<html>

@include('templates.partials.admin._head')

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
    <div class="overflow-auto">


        <!-- ========== Left Sidebar Start ========== -->
        @include('templates.partials.admin._sidebar')
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
            @include('templates.partials.admin._navbar')
            <!-- Top Bar End -->

                <!-- ==================
                     PAGE CONTENT START
                     ================== -->
                <div class="page-content-wrapper">

                    <div class="container-fluid">

                        @yield('content')

                    </div><!-- container -->

                </div>

            </div> <!-- content -->

            {{--<footer class="footer">
                © 2018 Fonik - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.
            </footer>--}}
        </div>
        <!-- End Right content here -->
    </div>
    </div>

@include('templates.partials.admin._script')

</body>

</html>