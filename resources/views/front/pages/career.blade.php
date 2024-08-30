@extends('front.layouts.main')
@section('title', 'Career')
@section('css')
    <style>
        .page-header {
            background: linear-gradient(rgba(255, 255, 255, .6), rgba(0, 0, 0, .6)), url('{{ asset('custom-assets/front/images/career-1.webp') }}') center center no-repeat !important;
        }

        .map-ifrem iframe {
            width: 100%;
            height: 100%;
        }
    </style>
@stop
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Career</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Career</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

      <!-- Contact Start -->
      <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-dark">Career</p>
                    <h1 class="display-5 mb-5">Are you ready for a better, more productive business?</h1>
                    {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                    <form id="form" action="{{ route('front.career.message.save') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('state') border border-danger @enderror "
                                        id="state" placeholder="State" name="state" value="{{ old('state') }}">
                                    <label for="state">State</label>
                                </div>
                                <div id="state_error" class="text-danger"> @error('state')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('city') border border-danger @enderror "
                                        id="city" placeholder="City" name="city" value="{{ old('city') }}">
                                    <label for="city">City</label>
                                </div>
                                <div id="city_error" class="text-danger"> @error('city')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file"
                                        class="form-control @error('resume') border border-danger @enderror "
                                        id="resume" placeholder="Resume" name="resume" value="{{ old('resume') }}">
                                    <label for="resume">Resume</label>
                                </div>
                                <div id="resume_error" class="text-danger"> @error('resume')
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
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                        <div class="position-relative rounded overflow-hidden w-100 h-100 map-ifrem">
                           <img class="w-100 h-100" src="{{ asset("custom-assets/front/images/career-2.webp") }}" alt="">
                        </div>
                    </div>
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
                    state: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    resume: {
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
                    state: {
                        required: 'This field is required',
                    },
                    city: {
                        required: 'This field is required',
                    },
                    resume: {
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
