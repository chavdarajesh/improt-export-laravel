@php $current_route_name=Route::currentRouteName();
use App\Models\SiteSetting;
$headerLogo = SiteSetting::getSiteSettings('header_logo');
$loader = SiteSetting::getSiteSettings('loader');

use App\Models\Category;
$categories = Category::getCategory();
@endphp

<!-- Spinner Start -->
@if(isset($loader))
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100  top-50 start-50 d-flex align-items-center justify-content-center">
    <img style="width: 200px;"
        src="{{ isset($loader) && isset($loader->value) && $loader != null ? asset($loader->value) : asset('custom-assets/admin/siteimages/logo/loader.gif') }}"
        alt="Loader">
</div>
@endif
<!-- Spinner End -->

<!--header section start -->
<div class="header_section">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logo"><a href="{{route('front.home')}}"><img src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/admin/siteimages/logo/header-logo.png') }}"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'front.home' ? 'active' : '' }}" href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'front.about' ? 'active' : '' }}" href="{{ route('front.about') }}">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ $categories && $categories->count() ? 'dropdown-toggle' : '' }} {{ Route::currentRouteName() == 'admin.product.category' || Route::currentRouteName() == 'admin.product.subcategory' ? 'active' : '' }}" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product
                    </a>
                    @if($categories->count())
                    <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($categories as $category)

                        <li class="dropdown-submenu">
                            <a class=" dropdown-item {{ $category->subcategories && $category->subcategories->count() ? 'dropdown-toggle' : '' }}" href="#">{{ $category->name }}</a>
                            @if($category->subcategories->count())
                            <ul class="dropdown-menu p-0">
                                @foreach($category->subcategories as $subcategory)
                                <li class="dropdown-submenu">
                                    <a class=" dropdown-item {{  $subcategory->subsubcategories && $subcategory->subsubcategories->count() ? 'dropdown-toggle' : '' }}" href="{{route('admin.product.category',$subcategory->id)}}">{{ $subcategory->name }}</a>
                                    @if($subcategory->subsubcategories->count())
                                    <ul class="dropdown-menu p-0">
                                        @foreach($subcategory->subsubcategories as $subSubCategory)
                                        <li><a class=" dropdown-item" href="{{route('admin.product.subcategory',$subSubCategory->id)}}">{{$subSubCategory->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'front.contact' ? 'active' : '' }}" href="{{ route('front.contact') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'front.services' ? 'active' : '' }}" href="{{ route('front.services') }}">Services</a>
                </li>
            </ul>

        </div>
    </nav>
</div>
<!--header section end -->
