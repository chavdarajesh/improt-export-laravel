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
 $social_twitter_url = SiteSetting::getSiteSettings('social_twitter_url');
 $footerLogo = SiteSetting::getSiteSettings('footer_logo');
 @endphp
 <!-- footer section start -->
 <div class="footer_section layout_padding margin_top90">
     <div class="container">
         @if ($ContactSetting)
         <div class="location_main">
             @if ($ContactSetting['location'])
             <div class="location_text"><img src="{{ asset('assets/front/images/map-icon.png') }}"><span class="padding_left_10"><a href="javascript:void(0);">Location : {{ $ContactSetting['location'] }}</a></span></div>
             @endif
             @if ($ContactSetting['phone'])
             <div class="location_text center"><img src="{{ asset('assets/front/images/call-icon.png') }}"><span class="padding_left_10"><a target="_blank" href="tel:{{ $ContactSetting['phone'] ? $ContactSetting['phone'] : '' }}">Call : {{ $ContactSetting['phone'] }}</a></span></div>
             @endif
             @if ($ContactSetting['email'])
             <div class="location_text right"><img src="{{ asset('assets/front/images/mail-icon.png') }}"><span class="padding_left_10"><a target="_blank" href="mailto:{{ $ContactSetting['email'] ? $ContactSetting['email'] : '' }}">Email : {{ $ContactSetting['email'] }}</a></span></div>
             @endif
         </div>
         @endif
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
                     <form id="newsletter-form" action="{{ route('front.newsletter.save') }}" method="POST">
                         @csrf
                         <input type="text" class="Enter_text" placeholder="Enter Your Email" name="email" id="email" >
                         <div id="emailnl_error" class="text-white w-100"> @error('email')
                             {{ $message }}
                             @enderror
                         </div>
                         <div class="subscribe_bt"><button type="submit">Subscribe</button></div>
                     </form>
                     @if (
                         (isset($social_facebook_url) && isset($social_facebook_url->value)) ||
                             (isset($social_youtube_url) && isset($social_youtube_url->value)) ||
                             (isset($social_linkedin_url) && isset($social_linkedin_url->value)) ||
                             (isset($social_twitter_url) && isset($social_twitter_url->value)) ||
                             (isset($social_instagram_url) && isset($social_instagram_url->value)))
                     <div class="social_icon">
                         <ul>
                         @if (isset($social_facebook_url) &&
                                     isset($social_facebook_url->value) &&
                                     $social_facebook_url != null &&
                                     $social_facebook_url->value != '')
                             <li><a target="_blank" href="{{ $social_facebook_url->value }}"><img src="{{ asset('assets/front/images/fb-icon.png') }}"></a></li>
                             @endif
                             @if (isset($social_twitter_url) &&
                                     isset($social_twitter_url->value) &&
                                     $social_twitter_url != null &&
                                     $social_twitter_url->value != '')
                             <li><a target="_blank" href="{{ $social_twitter_url->value }}"><img src="{{ asset('assets/front/images/twitter-icon.png') }}"></a></li>
                             @endif
                             @if (isset($social_linkedin_url) &&
                                     isset($social_linkedin_url->value) &&
                                     $social_linkedin_url != null &&
                                     $social_linkedin_url->value != '')
                             <li><a target="_blank" href="{{ $social_linkedin_url->value }}"><img src="{{ asset('assets/front/images/linkedin-icon.png') }}"></a></li>
                             @endif
                             @if (isset($social_instagram_url) &&
                                     isset($social_instagram_url->value) &&
                                     $social_instagram_url != null &&
                                     $social_instagram_url->value != '')
                             <li><a target="_blank" href="{{ $social_instagram_url->value }}"><img src="{{ asset('assets/front/images/instagram-icon.png') }}"></a></li>
                             @endif
                             @if (isset($social_youtube_url) &&
                                     isset($social_youtube_url->value) &&
                                     $social_youtube_url != null &&
                                     $social_youtube_url->value != '')
                             <li><a  target="_blank" href="{{ $social_youtube_url->value }}"><img src="{{ asset('assets/front/images/youtub-icon.png') }}"></a></li>
                             @endif
                         </ul>
                     </div>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- footer section end -->
 <!-- copyright section start -->
 <div class="copyright_section">
     <div class="container">
         <p class="copyright_text"> &copy; Copyright <?php echo date('Y'); ?> All Rights Reserved.<a href="{{ route('front.home') }}"> {{ env('APP_NAME', 'Laravel App') }}</a></p>
     </div>
 </div>


 <!-- Back to Top -->
 {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
         class="bi bi-arrow-up"></i></a> --}}
