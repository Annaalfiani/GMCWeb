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
<script src="{{asset('assets/daterange/daterangepicker.js')}}"></script>
<script src="{{asset('assets/daterange/moment.min.js')}}"></script>
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
            controlForm.find('.clockpicker').clockpicker({
                donetext: 'Done',
                'default' : 'now'
            });
            controlForm.find('.entry:not(:last) .btn-add')
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

@yield('script')