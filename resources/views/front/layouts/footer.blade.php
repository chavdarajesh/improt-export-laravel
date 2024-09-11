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
                $('#' + element.attr('name') + 'nl_error').html(error)
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

<script>
    // $(document).ready(function(){$(".dropdown-menu a.dropdown-toggle").on("click",function(o){var s=$(this);s.toggleClass("active-dropdown");var n=$(this).offsetParent(".dropdown-menu");$(this).next().hasClass("show")||$(this).parents(".dropdown-menu").first().find(".show").removeClass("show");var e=$(this).next(".dropdown-menu");return e.toggleClass("show"),$(this).parent("li").toggleClass("show"),$(this).parents("li.nav-item.dropdown.show").on("hidden.bs.dropdown",function(o){$(".dropdown-menu .show").removeClass("show"),s.removeClass("active-dropdown")}),n.parent().hasClass("navbar-nav")||s.next().css({top:s[0].offsetTop,left:n.outerWidth()-4}),!1})});

    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
  }
  var $subMenu = $(this).next('.dropdown-menu');
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass('show');
  });


  return false;
});
</script>
