@extends('front.layouts.main')
@section('title', 'Home')
@section('css')
<style>
    .banner_section {
    width: 100%;
    float: left;
    background-image: url("{{ asset('assets/front/images/banner-bg.png') }}");
    height: auto;
    background-size: 100%;
}
</style>
@stop
@section('content')
    {{-- @if (!$HomeSlider->isEmpty())
        <!-- Carousel Start -->
        <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($HomeSlider as $key => $slider)
                        <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="{{ $key }}"
                            class=" {{ $key == 0 ? 'active' : '' }} " {{ $key == 0 ? ' aria-current="true" ' : '' }}
                            aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($HomeSlider as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img class="w-100" src="{{ asset($slider->image) }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    @endif --}}
    <!--banner section start -->
    <div class="banner_section layout_padding">
        <div class="container-fluid">
            <section class="slide-wrapper">
                <div class="container-fluid">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container">
                                    <div class="banner_main">
                                        <h1 class="banner_taital">Business Agency Profit Your Marketing</h1>
                                        <p class="banner_text">It is a long established fact that a reader will be
                                            distracted by the readable content of a page when</p>
                                        <div class="btn_main">
                                            <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                            <div class="readmore_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="banner_main">
                                        <h1 class="banner_taital">Business Agency Profit Your Marketing</h1>
                                        <p class="banner_text">It is a long established fact that a reader will be
                                            distracted by the readable content of a page when</p>
                                        <div class="btn_main">
                                            <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                            <div class="readmore_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="banner_main">
                                        <h1 class="banner_taital">Business Agency Profit Your Marketing</h1>
                                        <p class="banner_text">It is a long established fact that a reader will be
                                            distracted by the readable content of a page when</p>
                                        <div class="btn_main">
                                            <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                            <div class="readmore_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="banner_main">
                                        <h1 class="banner_taital">Business Agency Profit Your Marketing</h1>
                                        <p class="banner_text">It is a long established fact that a reader will be
                                            distracted by the readable content of a page when</p>
                                        <div class="btn_main">
                                            <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                            <div class="readmore_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="banner_main">
                                        <h1 class="banner_taital">Business Agency Profit Your Marketing</h1>
                                        <p class="banner_text">It is a long established fact that a reader will be
                                            distracted by the readable content of a page when</p>
                                        <div class="btn_main">
                                            <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                            <div class="readmore_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--banner section end -->
    <!--about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <h1 class="about_taital">About Us</h1>
            <p class="about_text">It is a long established fact that a reader will be distracted by the readable content of
                a page when</p>
            <div class="about_section_2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about_image"><img src="{{ asset('assets/front/images/about-img.png') }}"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_taital_main">
                            <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the
                                majority have suffered alteration in some form, by injected humour, or randomised words </p>
                            <div class="read_bt"><a href="#">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital">What We Do</h1>
            <p class="about_text">It is a long established fact that a reader will be distracted by the readable content of
                a page when</p>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="{{ asset('assets/front/images/icon-1.png') }}"></div>
                        </div>
                        <h4 class="selection_text">Selection of Business</h4>
                        <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form,
                            by injected humour, or randomised</p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="{{ asset('assets/front/images/icon-4.png') }}"></div>
                        </div>
                        <h4 class="selection_text">Securities Transactions</h4>
                        <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form,
                            by injected humour, or randomised</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="{{ asset('assets/front/images/icon-2.png') }}"></div>
                        </div>
                        <h4 class="selection_text">Research and Analytics</h4>
                        <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form,
                            by injected humour, or randomised</p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="{{ asset('assets/front/images/icon-5.png') }}"></div>
                        </div>
                        <h4 class="selection_text">Advisory Activities</h4>
                        <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form,
                            by injected humour, or randomised</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="{{ asset('assets/front/images/icon-3.png') }}"></div>
                        </div>
                        <h4 class="selection_text">Business Plans</h4>
                        <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form,
                            by injected humour, or randomised</p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="{{ asset('assets/front/images/icon-6.png') }}"></div>
                        </div>
                        <h4 class="selection_text">Management and Asset</h4>
                        <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form,
                            by injected humour, or randomised</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services section end -->
    <!-- blog section start -->
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="blog_img"><img src="{{ asset('assets/front/images/blog-img.png') }}"></div>
                </div>
                <div class="col-md-6">
                    <h1 class="blog_taital">Easily Grow Your Business Earn More Money</h1>
                    <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but the majority
                        have suffered alteration in some form, by injected humour, or randomised words There uffered
                        alteration in some form, by injected humour, or randomised words </p>
                    <div class="read_bt"><a href="#">Read More</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog section end -->
    <!-- events section start -->
    <div class="events_section layout_padding">
        <div class="container">
            <h1 class="events_taital">Follow Our Video For Solved Your Problem</h1>
            <div class="events_section_2">
                <div class="events_bg">
                    <div class="play_icon"><a href="#"><img src="{{ asset('assets/front/images/play-icon.png') }}"></a></div>
                </div>
            </div>
            <div class="seemore_bt"><a href="#">See More</a></div>
        </div>
    </div>
    <!-- events section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <h1 class="contact_taital">Get In Touch</h1>
            <p class="contact_text">majority have suffered alteration in some form, by injected humour, or </p>
            <div class="contact_section_2 layout_padding">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_main">
                            <input type="text" class="mail_text" placeholder="Full Name" name="Full Name">
                            <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                            <input type="text" class="mail_text" placeholder="Email" name="Email">
                            <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                            <div class="send_bt"><a href="#">SEND</a></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="map_main">
                            <div class="map-responsive">
                                <iframe
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                                    width="600" height="400" frameborder="0" style="border:0; width: 100%;"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->
    <!-- testimonial section start -->
    <div class="testimonial_section layout_padding">
        <div id="my_carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#my_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#my_carousel" data-slide-to="1"></li>
                <li data-target="#my_carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="testimonial_taital">Testimonial</h1>
                        <p class="testimonial_text">majority have suffered alteration in some form, by injected humour, or
                        </p>
                        <div class="testimonial_section_2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="jonimo_taital_main">
                                            <h4 class="jonimo_text">Jonimo</h4>
                                            <div class="quick_icon"><img src="{{ asset('assets/front/images/quick-icon.png') }}"></div>
                                            <div class="quick_icon_1"><img src="{{ asset('assets/front/images/quick-icon1.png') }}"></div>
                                        </div>
                                        <p class="dummy_text">There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration in some form, by injected
                                            humour, or randomised words which don't look even slightly believable. If you
                                            are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="jonimo_taital_main">
                                            <h4 class="jonimo_text">Mark Duo</h4>
                                            <div class="quick_icon"><img src="{{ asset('assets/front/images/quick-icon.png') }}"></div>
                                            <div class="quick_icon_1"><img src="{{ asset('assets/front/images/quick-icon1.png') }}"></div>
                                        </div>
                                        <p class="dummy_text">There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration in some form, by injected
                                            humour, or randomised words which don't look even slightly believable. If you
                                            are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="testimonial_taital">Testimonial</h1>
                        <p class="testimonial_text">majority have suffered alteration in some form, by injected humour, or
                        </p>
                        <div class="testimonial_section_2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="jonimo_taital_main">
                                            <h4 class="jonimo_text">Jonimo</h4>
                                            <div class="quick_icon"><img src="{{ asset('assets/front/images/quick-icon.png') }}"></div>
                                            <div class="quick_icon_1"><img src="{{ asset('assets/front/images/quick-icon1.png') }}"></div>
                                        </div>
                                        <p class="dummy_text">There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration in some form, by injected
                                            humour, or randomised words which don't look even slightly believable. If you
                                            are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="jonimo_taital_main">
                                            <h4 class="jonimo_text">Mark Duo</h4>
                                            <div class="quick_icon"><img src="{{ asset('assets/front/images/quick-icon.png') }}"></div>
                                            <div class="quick_icon_1"><img src="{{ asset('assets/front/images/quick-icon1.png') }}"></div>
                                        </div>
                                        <p class="dummy_text">There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration in some form, by injected
                                            humour, or randomised words which don't look even slightly believable. If you
                                            are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="testimonial_taital">Testimonial</h1>
                        <p class="testimonial_text">majority have suffered alteration in some form, by injected humour, or
                        </p>
                        <div class="testimonial_section_2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="jonimo_taital_main">
                                            <h4 class="jonimo_text">Jonimo</h4>
                                            <div class="quick_icon"><img src="{{ asset('assets/front/images/quick-icon.png') }}"></div>
                                            <div class="quick_icon_1"><img src="{{ asset('assets/front/images/quick-icon1.png') }}"></div>
                                        </div>
                                        <p class="dummy_text">There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration in some form, by injected
                                            humour, or randomised words which don't look even slightly believable. If you
                                            are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial_box">
                                        <div class="jonimo_taital_main">
                                            <h4 class="jonimo_text">Mark Duo</h4>
                                            <div class="quick_icon"><img src="{{ asset('assets/front/images/quick-icon.png') }}"></div>
                                            <div class="quick_icon_1"><img src="{{ asset('assets/front/images/quick-icon1.png') }}"></div>
                                        </div>
                                        <p class="dummy_text">There are many variations of passages of Lorem Ipsum
                                            available, but the majority have suffered alteration in some form, by injected
                                            humour, or randomised words which don't look even slightly believable. If you
                                            are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial section end -->
@stop

@section('js')
@stop
