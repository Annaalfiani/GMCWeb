<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script src="{{ asset ('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset ('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset ('assets/js/template.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset ('assets/js/dashboard.js') }}"></script>
<script src="{{ asset ('assets/js/todolist.js') }}"></script>
<!-- Custom js for this page-->
<script src="{{ asset('assets/js/data-table.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
{{-- <script src="{{ asset('assets/timepicker/jquery.timepicker.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/timepicker@1.13.18/jquery.timepicker.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> --}}

{{--<script src="{{asset('assets/daterange/daterangepicker.js')}}"></script>--}}
{{--<script src="{{asset('assets/daterange/moment.min.js')}}"></script>--}}

{{-- <script src="{{asset('assets/js/form-addons.js') }}"></script>
<script src="{{asset('assets/js/formpickers.js') }}"></script> --}}


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@yield('script')

