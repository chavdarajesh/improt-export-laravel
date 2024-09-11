@php
use App\Models\SiteSetting;
$contact_enquiry_phone = SiteSetting::getSiteSettings('contact_enquiry_phone');
@endphp

@extends('front.layouts.main')
@section('title', 'Product Details')

@section('css')
<style>
    p {
        margin: 0;
    }
</style>
@stop
@section('content')
<!-- blog section start -->
<div class="blog_section layout_padding">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="blog_img"><img width="500px" height="300px" src="{{ $Product->image ? asset($Product->image) : asset('assets/front/images/blog-img.png') }}"></div>
            </div>
            <div class="col-md-6">
                @if($Product->name)
                <div>
                    <h1 class="blog_taital">{{$Product->name}}</h1>
                </div>
                @endif
                @if($Product->description)
                <p class="blog_text">{!! $Product->description !!}</p>
                @endif
                @if($Product->price_inr)
                <h3 class="mt-3">Price INR &#8377;: {{$Product->price_inr}}</h3>
                @endif
                @if($Product->price_usd)
                <h3 class="mt-1">Price USD &#36;: {{$Product->price_usd}}</h3>
                @endif

                <div>

                    @if (isset($contact_enquiry_phone) &&
                    isset($contact_enquiry_phone->value) &&
                    $contact_enquiry_phone != null &&
                    $contact_enquiry_phone->value != '')
                    <div>
                        <a class="" href="tel:{{ $contact_enquiry_phone->value ? $contact_enquiry_phone->value : '' }}">
                            <h1 class="text-primary">For More Details Call Us : {{$contact_enquiry_phone->value}}</h1>
                        </a>
                    </div>
                    @endif
                </div>
                @if($Product->priceHistory && $Product->priceHistory->count())
                <div class="read_bt"><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter">Price History</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalCenterTitle">Price History | {{$Product->name}}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Price INR</th>
                                <th scope="col">Price USD</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Product->priceHistory as $priceHistory)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$priceHistory->price_inr}}</td>
                                <td>{{$priceHistory->price_usd}}</td>
                                <td>{{$priceHistory->changed_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- blog section end -->
@stop
