<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
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
{{--<script src="{{asset('assets/daterange/daterangepicker.js')}}"></script>--}}
{{--<script src="{{asset('assets/daterange/moment.min.js')}}"></script>--}}

<script src="{{asset('assets/js/form-addons.js') }}"></script>
<script src="{{asset('assets/js/formpickers.js') }}"></script>



<script>
    $(function()
    {
        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();
            var controlForm = $('#myRepeatingFields:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('input').val('');
            controlForm.find('.entry:last .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {
            e.preventDefault();
            $(this).parents('.entry:first').remove();
            return false;
        });
    });
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@yield('script')