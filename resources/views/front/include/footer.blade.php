 <!-- ======= Footer ======= -->
 @php $current_route_name=Route::currentRouteName() @endphp
 @php
     use App\Models\Admin\ContactSetting;
     $ContactSetting = ContactSetting::get_contact_us_details();
     use App\Models\SiteSetting;
     $social_facebook_url = SiteSetting::getSiteSettings('social_facebook_url');
     $social_linkedin_url = SiteSetting::getSiteSettings('social_linkedin_url');
     $social_instagram_url = SiteSetting::getSiteSettings('social_instagram_url');
     $social_youtube_url = SiteSetting::getSiteSettings('social_youtube_url');
     $footerLogo = SiteSetting::getSiteSettings('footer_logo');
 @endphp
 <!-- footer section start -->
 <div class="footer_section layout_padding">
    <div class="container">
       <div class="location_main">
          <div class="location_text"><img src="{{ asset('assets/front/images/map-icon.png') }}"><span class="padding_left_10"><a href="#">Location</a></span></div>
          <div class="location_text center"><img src="{{ asset('assets/front/images/call-icon.png') }}"><span class="padding_left_10"><a href="#">Call ; 01 1234567890</a></span></div>
          <div class="location_text right"><img src="{{ asset('assets/front/images/mail-icon.png') }}"><span class="padding_left_10"><a href="#">demo@gmail.com</a></span></div>
       </div>
       <div class="footer_section_2">
          <div class="row">
             <div class="col-lg-4">
                <h2 class="footer_taital">About</h2>
                <p class="footer_text">There are many variations of passages of Lorem Ipsum available, but the majority havThere are many variations of passages of Lorem Ipsum available, but the majority hav</p>
             </div>
             <div class="col-lg-4">
                <h2 class="footer_taital">Services Link</h2>
                <p class="footer_text">There are many variations of passages of Lorem Ipsum available, but the majority havThere are many variations of passages of Lorem Ipsum available, but the majority hav</p>
             </div>
             <div class="col-lg-4">
                <h2 class="footer_taital">Subscribe</h2>
                <input type="text" class="Enter_text" placeholder="Enter Your Email" name="Enter Your Email">
                <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                <div class="social_icon">
                   <ul>
                      <li><a href="#"><img src="{{ asset('assets/front/images/fb-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('assets/front/images/twitter-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('assets/front/images/linkedin-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('assets/front/images/instagram-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('assets/front/images/youtub-icon.png') }}"></a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- footer section end -->
 <!-- copyright section start -->
 <div class="copyright_section">
    <div class="container">
       <p class="copyright_text">Copyright 2020 All Rights Reserved.<a href="https://html.design"> Free  html Templates</a></p>
    </div>
 </div>


 <!-- Back to Top -->
 {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
         class="bi bi-arrow-up"></i></a> --}}
