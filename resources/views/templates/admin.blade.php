<!DOCTYPE html>
<html lang="en">

@include('templates.partials.admin._head')

<body>
	<div class="container-scroller">
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
				{{--<footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 . Gajah Mada Cinema.</span>
                </div>
            </footer>--}}
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->

	<!-- plugins:js -->
	<script type="text/javascript">
		let BASE_URL = '{{ url('/') }}'
	</script>
	@include('templates.partials.admin._script')
	@stack('scripts')
	<!-- End custom js for this page-->
</body>

</html>