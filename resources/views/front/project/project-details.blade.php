@extends('front.layouts.main')
@section('title', 'Project Details')
@section('css')

    <style>
        .page-header {
            background: linear-gradient(rgba(255, 255, 255, .6), rgba(0, 0, 0, .6)), url('{{ asset('custom-assets/front/images/pd-1.webp') }}') center center no-repeat !important;
        }

        .portfolio-inner-project-details {
            position: relative;
            overflow: hidden;
        }

        .portfolio-inner-project-details .portfolio-text {
            cursor: pointer;
            position: absolute;
            width: 100%;
            height: 100%;
            /* top: 0; */
            bottom: 10px;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            transition: .5s;
            z-index: 3;
            opacity: 0;
        }

        .portfolio-inner-project-details:hover img {
            opacity: 0.5;
        }

        .portfolio-inner-project-details:hover .portfolio-text {
            transition-delay: .3s;
            opacity: 1;
        }

        .portfolio-inner-project-details .portfolio-text .btn {
            background: var(--light);
            color: var(--primary);
        }

        .portfolio-inner-project-details .portfolio-text .btn:hover {
            background: var(--primary);
            color: var(--light);
        }
    </style>
@stop
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Project Details</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-5">{{ $Project->title }}</h1>
                <p class="fs-5 fw-bold text-primary">{{ $Project->address }}</p>
                <p class="fs-6 text-dark">{!! $Project->description !!}</p>
            </div>
            <hr>
            @if ($Project->exteriorImages && $Project->category_slug != 'animation' && $Project->category_slug != 'arvr')
                <div class="row wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        <ul class="list-inline rounded mb-5" id="portfolio-flters">
                            <li class="mx-2 active">Exterior</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container-project-details">
                    @foreach ($Project->exteriorImages as $image)
                        <div class="col-lg-3 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="portfolio-inner-project-details rounded">
                                <a class="" href="{{ asset($image->image) }}" data-lightbox="portfolio">
                                    <img class="img-fluid" src="{{ asset($image->image) }}" alt="">
                                    <div class="portfolio-text">
                                        <div class="d-flex">

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if ($Project->interiorImages && $Project->category_slug != 'animation' && $Project->category_slug != 'arvr')
                <div class="row wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        <ul class="list-inline rounded my-5" id="portfolio-flters">
                            <li class="mx-2 active">Interior</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container-project-details">
                    @foreach ($Project->interiorImages as $image)
                        <div class="col-lg-3 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="portfolio-inner-project-details rounded">
                                <a class="" href="{{ asset($image->image) }}" data-lightbox="portfolio">
                                    <img class="img-fluid" src="{{ asset($image->image) }}" alt="">
                                    <div class="portfolio-text">
                                        <div class="d-flex">

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <!-- Projects End -->
@stop

@section('js')

    <script>
        // Portfolio isotope and filter
        var portfolioIsotope = $('.portfolio-container-project-details').isotope({
            itemSelector: '.portfolio-item',
            // columnWidth: 2,
            // layoutMode: 'fitRows'
        });
    </script>
@stop
