@extends('front.layouts.main')
@section('title', 'Contact')
@section('css')
    <style>
        .page-header {
            background: linear-gradient(rgba(255, 255, 255, .6), rgba(0, 0, 0, .6)), url('{{ asset('custom-assets/front/images/contact-us-1.webp') }}') center center no-repeat !important;
        }
        .map-ifrem iframe{
            width: 100%;
            height: 100%;
        }
    </style>
@stop
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    @if ($ContactSetting)
<!-- Top Feature Start -->
<div class="container-fluid top-feature py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            @if ($ContactSetting['location'])
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white  d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-dark">
                            <i class="fa fa-map-marker-alt  text-light"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Location</h4>
                            <span>{{ $ContactSetting['location'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($ContactSetting['phone'])
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white  d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-dark">
                            <i class="fa fa-phone-alt text-light"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Phone</h4>
                            <a class="text-dark" target="_blank"  href="tel:{{ $ContactSetting['phone'] ? $ContactSetting['phone'] : '' }}">
                                <span>{{ $ContactSetting['phone'] }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($ContactSetting['email'])
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white  d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-dark">
                            <i class="fa fa-envelope text-light"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Email</h4>
                            <a class="text-dark" target="_blank" href="mailto:{{ $ContactSetting['email'] ? $ContactSetting['email'] : '' }}">
                                <span>{{ $ContactSetting['email'] }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Top Feature End -->
@endif
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-dark">Contact Us</p>
                    <h1 class="display-5 mb-5">If You Have Any Query, Please Contact Us</h1>
                    {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                    <form id="form" action="{{ route('front.contact.message.save') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('name') border border-danger @enderror"
                                        id="name" placeholder="Your Name" value="{{ old('name') }}" name="name">
                                    <label for="name">Name</label>
                                </div>
                                <div id="name_error" class="text-danger"> @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email"
                                        class="form-control @error('email') border border-danger @enderror " id="email"
                                        placeholder="Your Email" value="{{ old('email') }}" name="email">
                                    <label for="email">Email</label>
                                </div>
                                <div id="email_error" class="text-danger"> @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('phone') border border-danger @enderror " id="phone"
                                        placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                    <label for="phone">Phone</label>
                                </div>
                                <div id="phone_error" class="text-danger"> @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('subject') border border-danger @enderror "
                                        id="subject" placeholder="Subject" name="subject" value="{{ old('subject') }}">
                                    <label for="subject">Subject</label>
                                </div>
                                <div id="subject_error" class="text-danger"> @error('subject')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control @error('message') border border-danger @enderror " placeholder="Leave a message here"
                                        id="message" style="height: 100px" name="message">{{ old('message') }}</textarea>
                                    <label for="message">Message</label>
                                </div>
                                <div id="message_error" class="text-danger"> @error('message')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-4" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($ContactSetting['map_iframe'])
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                        <div class="position-relative rounded overflow-hidden h-100 map-ifrem">
                            {!! $ContactSetting['map_iframe'] !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Contact End -->
@stop
@section('js')
    <script>
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
