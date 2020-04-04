<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Mar 2020 12:12:26 GMT -->
@include ('templates.partials.manager._head')

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    @include('templates.partials.manager._navbar')

    @include('templates.partials.manager._sidebar')
    <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        @include('templates.partials.manager._footer')
    </div>
</div>
<!-- General JS Scripts -->
@include('templates.partials.manager._script')
</body>


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Mar 2020 12:13:53 GMT -->
</html>