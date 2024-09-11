@php
use App\Models\SiteSetting;
$home_slider_image = SiteSetting::getSiteSettings('home_slider_image');
@endphp

@extends('front.layouts.main')
@section('title', 'Home')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/front/css/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/css/slick-theme.min.css') }}">

<style>
    .banner_section {
        width: 100%;
        float: left;
        background-image: url("{{ isset($home_slider_image) && $home_slider_image && $home_slider_image->value && $home_slider_image->value != null ? asset($home_slider_image->value) : asset('assets/front/images/banner-bg.png') }}");
        height: auto;
        background-size: cover !important; /* Fits the image to cover the entire area without preserving aspect ratio */
        background-position: center !important; /* Ensure the image is centered */
    }

    .map-responsive iframe {
        width: 100%;
        height: 100%;
    }

    .carousel-sister-logo {
        width: 90%;
        margin: 0px auto;
    }

    .carousel-sister-logo .slick-slide {
        margin: 10px;
    }

   .carousel-sister-logo .slick-slide img {
        width: 100%;
        border: 2px solid #fff;
    }
</style>
@stop
@section('content')
@if (!$HomeSlider->isEmpty())
<!--banner section start -->
<div class="banner_section layout_padding">
    <div class="container-fluid">
        <section class="slide-wrapper">
            <div class="container-fluid">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach ($HomeSlider as $key => $slider)
                        <li data-target="#myCarousel" data-slide-to="{{$key}}" class=" {{ $key == 0 ? 'active' : '' }} "></li>
                        @endforeach
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        @foreach ($HomeSlider as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}  ">
                            <div class="container">
                                <div class="banner_main">
                                    <h1 class="banner_taital">{{$slider->title}}</h1>
                                    <p class="banner_text">{{$slider->description}}</p>
                                    <div class="btn_main">
                                        <div class="contact_bt active "><a href="{{route('front.contact')}}">Contact Us</a></div>
                                        <div class="readmore_bt"><a href="{{route('front.about')}}">Read More</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!--banner section end -->
@endif
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
        <div class="seemore_bt"><a href="{{route('front.about')}}">See More</a></div>
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
                        <form id="form" action="{{ route('front.contact.message.save') }}" method="POST">
                            @csrf
                            <input type="text" class="mail_text @error('name') border border-danger @enderror " placeholder="Full Name" id="name" value="{{ old('name') }}" name="name">
                            <div id="name_error" class="text-danger"> @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                            <input type="text" class="mail_text @error('phone') border border-danger @enderror" placeholder="Phone Number" id="phone" name="phone" value="{{ old('phone') }}">
                            <div id="phone_error" class="text-danger"> @error('phone')
                                {{ $message }}
                                @enderror
                            </div>
                            <input type="text" class="mail_text @error('email') border border-danger @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                            <div id="email_error" class="text-danger"> @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                            <textarea class="massage-bt @error('message') border border-danger @enderror " placeholder="Massage" rows="5" id="message" name="message">{{ old('message') }}</textarea>
                            <div id="message_error" class="text-danger"> @error('message')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="send_bt"><button type="submit">SEND</button></div>
                        </form>
                    </div>
                </div>
                @if ($ContactSetting)
                <div class="col-md-6">
                    <div class="map_main w-100 h-100">
                        <div class="map-responsive w-100 h-100">
                            {!! $ContactSetting['map_iframe'] !!}
                        </div>
                    </div>
                </div>
                @endif
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
@if(!$SistersCompanyLogos->isEmpty())
<!-- testimonial section end -->
<div class="testimonial_section layout_padding">

    <div class="container my-5">
        <h2>Our Sister Company</h2>
        <div class="carousel-sister-logo">
            @foreach($SistersCompanyLogos as $key =>$logo)
            <div><img src="{{asset($logo->image)}}"></div>
            @endforeach
        </div>
    </div>
</div>
@endif
@stop

@section('js')
<script src="{{ asset('assets/front/js/slick.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.carousel-sister-logo').slick({
            slidesToShow: 3,
            dots: false,
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    number: true
                },
                subject: {
                    required: true,
                },
                message: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: 'This field is required',
                },
                email: {
                    required: 'This field is required',
                    email: 'Enter a valid email',
                },
                phone: {
                    number: 'Please enter a valid phone number.',
                },
                subject: {
                    required: 'This field is required',
                },
                message: {
                    required: 'This field is required',
                }
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
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
@stop
