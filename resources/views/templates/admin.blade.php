<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/cloudui/template/demo/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 May 2020 07:26:04 GMT -->
@include('templates.partials.admin._head')

<body>
<div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
        @include('templates.partials.admin._navbar')
        @include('templates.partials.admin._sidebar')
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 . Gajah Mada Cinema.</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
@include('templates.partials.admin._script')
<!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/cloudui/template/demo/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 May 2020 07:26:36 GMT -->
</html>
