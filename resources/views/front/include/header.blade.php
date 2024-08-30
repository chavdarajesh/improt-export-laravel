@php $current_route_name=Route::currentRouteName() @endphp
@php
    use App\Models\Admin\ContactSetting;
    $ContactSetting = ContactSetting::get_contact_us_details();
    use App\Models\SiteSetting;
    $headerLogo = SiteSetting::getSiteSettings('header_logo');

    $loader = SiteSetting::getSiteSettings('loader');

    $social_facebook_url = SiteSetting::getSiteSettings('social_facebook_url');
    $social_linkedin_url = SiteSetting::getSiteSettings('social_linkedin_url');
    $social_instagram_url = SiteSetting::getSiteSettings('social_instagram_url');
    $social_youtube_url = SiteSetting::getSiteSettings('social_youtube_url');
@endphp

<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    {{-- <img style="width: 200px;"
        src="{{ isset($loader) && isset($loader->value) && $loader != null ? asset($loader->value) : asset('custom-assets/admin/siteimages/logo/loader.gif') }}"
        alt="Loader"> --}}
</div>
<!-- Spinner End -->

  <!--header section start -->
  <div class="header_section">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="logo"><a href="index.html"><img src="{{ asset('assets/front/images/logo.png') }}"></a></div>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="services.html">Services</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="events.html">Events</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
             </li>
          </ul>
       </div>
    </nav>
 </div>
 <!--header section end -->
