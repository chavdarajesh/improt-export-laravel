 <!-- bootstrap css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
 <!-- style css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css') }}">
 <!-- Responsive-->
 <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
 <!-- Scrollbar Custom CSS -->
 <link rel="stylesheet" href="{{ asset('assets/front/css/jquery.mCustomScrollbar.min.css') }}">
 <!-- Tweaks for older IEs-->
 <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
 <!-- fonts -->
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
 <!-- owl stylesheets -->
 <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
 <!-- <link rel="stylesheet" href="{{ asset('assets/front/css/owl.theme.default.min.css') }}"> -->
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" -->
     <!-- media="screen"> -->

     <style>
    /*** Spinner ***/
    #spinner {
        opacity: 0;
        visibility: hidden;
        transition: opacity .5s ease-out, visibility 0s linear .5s;
        z-index: 99999;
        height: 100vh;
    }

    #spinner.show {
        transition: opacity .5s ease-out, visibility 0s linear 0s;
        visibility: visible;
        opacity: 1;
        height: 100vh;
    }
</style>
<style>
/* .dropdown-toggle.active-dropdown::after {
    transform: rotate(-90deg);
} */
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 6px;
  top: 1em;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
}
.logo img {
    height: 50px;
}
</style>
 {{-- Custom --}}
 <link rel="stylesheet" type="text/css" href="{{ asset('custom-assets/front/css/toastr.min.css') }}">
 @yield('css')
