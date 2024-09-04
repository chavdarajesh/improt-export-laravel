<script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets/front/js/plugin.js') }}"></script>
<!-- sidebar -->
<script src="{{ asset('assets/front/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/front/js/custom.js') }}"></script>
<!-- javascript -->
<!-- <script src="{{ asset('assets/front/js/owl.carousel.js') }}"></script> -->
<!-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->

{{-- Custom --}}
<script src="{{ asset('custom-assets/front/js/toastr.min.js') }}"></script>

<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "preventDuplicates": false
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "preventDuplicates": false
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "preventDuplicates": false
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "preventDuplicates": false
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>
    // Spinner
    var spinner = function() {

        setTimeout(function() {
            if ($('#spinner').length > 0) {
                $('#spinner').remove();
            }
        }, 200);
    };
    $(window).on('load', function() {
        spinner();
    });
</script>

@yield('js')


<script>
    $(document).ready(function() {
        $('#newsletter-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {

                email: {
                    required: 'This field is required',
                    email: 'Enter a valid email',
                }
            },
            errorPlacement: function(error, element) {
                error.addClass('text-white');
                $('#' + element.attr('name') + '_error').html(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('border border-danger');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('border border-danger');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
