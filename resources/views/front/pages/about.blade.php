@extends('front.layouts.main')
@section('title', 'About')
@section('css')

    <style>
        .page-header {
            background: linear-gradient(rgba(255, 255, 255, .6), rgba(0, 0, 0, .6)), url('{{ asset('custom-assets/front/images/about-bg-1.webp') }}') center center no-repeat !important;
        }
    </style>
@stop
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-4 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s"
                        src="{{ asset('custom-assets/front/images/about-bg-2.webp') }}">
                </div>
                <div class="col-lg-8 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    {{-- <h1 class="display-1 text-primary mb-0">25</h1> --}}
                    {{-- <p class="text-primary mb-4">Year of Experience</p> --}}
                    {{-- <h1 class="display-5 mb-4">We Make Your Home Like A Garden</h1> --}}
                    <p class="text-primary mb-4 mt-4 fs-5">Dreamscape always believes in the process of innovation to forge
                        something new in the process of architectural animation. we engage in serving the superlative high
                        unbuilt architecture rendered outputs while getting involved intensively on the projects, and also
                        administers each detail painstakingly. Dreamscape continues to conduct its operations in an
                        effective style along with the constant revolutionary changes in digital technology, by setting up
                        the new standards and raising up the bar successfully & regularly.
                        <br>
                        <br>
                        our high rendered designs create an everlasting impression on our clients all over the globe.
                    </p>
                    <a class="btn btn-primary py-3 px-4" href="{{route('front.contact')}}">Explore More</a>
                </div>
                {{-- <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Award Winning</h4>
                                <span>Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Dedicated Team</h4>
                                <span>Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5" data-parallax="scroll"
        data-image-src="{{ asset('custom-assets/front/images/about-bg-3.webp') }}">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">1234</h1>
                    <span class="fs-5 fw-semi-bold text-light">Happy Clients</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">1234</h1>
                    <span class="fs-5 fw-semi-bold text-light">Garden Complated</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">1234</h1>
                    <span class="fs-5 fw-semi-bold text-light">Dedicated Staff</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">1234</h1>
                    <span class="fs-5 fw-semi-bold text-light">Awards Achieved</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->
@stop
