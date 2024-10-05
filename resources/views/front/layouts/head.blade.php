 <!-- bootstrap css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
 <!-- style css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css?sdcsdcsd') }}">
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
     .dropdown-menu {
         padding: 0;
     }

     .dropdown-menu-items-product a:hover,
     .dropdown-menu-items-product a.active {
         color: #ffffff;
         background-color: #13a25d;
     }

     /* hover dropdown menus */
     /* Hover dropdown menus for desktop screens */
     @media only screen and (min-width: 992px) {
         .navbar-hover .collapse ul li {
             position: relative;
         }

         .navbar-hover .collapse ul li:hover>ul {
             display: block;
         }

         /* Submenu */
         .navbar-hover .collapse ul ul {
             position: absolute;
             top: 96%;
             right: 0;
             left: auto;
             /* Changed from left: 0 to right: 0 to align the submenu on the left side */
             min-width: 200px;
             display: none;
         }

         /* Subsubmenu (nested submenu) */
         .navbar-hover .collapse ul ul ul {
             position: absolute;
             top: 0;
             left: auto;
             right: 100%;
             /* Changed from left: 100% to right: 100% to open subsubmenu to the left */
             min-width: 200px;
             display: none;
         }
     }

     /* Show dropdowns on click for mobile devices */
     @media only screen and (max-width: 991px) {
         .navbar-hover .show>.dropdown-toggle::after {
             transform: rotate(-90deg);
         }
     }



     .header-logo {
         max-height: 70px;
         max-width: 250px;
     }

     @media (max-width: 991px) {
         .bg-light {
             padding: 0;
         }

         .header-logo {
             max-height: 70px;
             max-width: 250px;
         }
     }

     @media only screen and (min-width: 991px) and (max-width: 1199px) {
         .header-logo {
             max-height: 50px;
             max-width: 250px;
         }
     }
 </style>
 {{-- Custom --}}
 <link rel="stylesheet" type="text/css" href="{{ asset('custom-assets/front/css/toastr.min.css') }}">
 @yield('css')
