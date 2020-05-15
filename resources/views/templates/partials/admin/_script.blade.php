<script src="{{ asset ('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset ('assets/js/popper.min.js') }}"></script>
<script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset ('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

{{--<script src="{{ asset ('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset ('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

{{--
<script src="{{ asset ('assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset ('assets/js/waves.js') }}"></script>
<script src="{{ asset ('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset ('assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset ('assets/js/jquery.slimscroll.js') }}"></script>
--}}

{{--<script src="{{ asset ('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/raphael/raphael-min.js') }}"></script>--}}

<script src="{{ asset ('assets/pages/form-advanced.js') }}"></script>
<script src="{{ asset ('assets/js/app.js')}}"></script>
<script src="{{ asset ('js/jquery-3.4.1.slim.min.js')}}"></script>

<script src="{{ asset ('assets/pages/dashborad.js') }}"></script>


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