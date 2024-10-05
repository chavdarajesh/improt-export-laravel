@php $current_route_name=Route::currentRouteName();
use App\Models\SiteSetting;
$headerLogo = SiteSetting::getSiteSettings('header_logo');
$loader = SiteSetting::getSiteSettings('loader');

use App\Models\Category;
$categories = Category::getCategory();

$subCategoryId = null;
$categoryId = null;

use App\Models\SubSubCategory;
if($current_route_name == 'admin.product.subcategory'){
$subSubCategoryId= request()->route('id');
$subCategoryId = SubSubCategory::getSubCategoryOfSubCategoryById($subSubCategoryId);
$categoryId = SubSubCategory::getCategoryOfSubCategoryById($subSubCategoryId);
}
use App\Models\SubCategory;
if($current_route_name == 'admin.product.category'){
$subCategoryId= request()->route('id');
$categoryId = SubCategory::getCategoryOfSubCategoryById($subCategoryId);
}
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-hover">
        <a class="navbar-brand" href="{{ route('front.home') }}"> <img src="{{ isset($headerLogo) && isset($headerLogo->value) && $headerLogo != null ? asset($headerLogo->value) : asset('custom-assets/admin/siteimages/logo/header-logo.jpeg') }}" class="header-logo" height="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover" aria-controls="navbarHover" aria-expanded="false" aria-label="Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarHover">
            <div class="d-flex justify-content-center justify-content-lg-end justify-content-sm-center w-100">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Route::currentRouteName() == 'front.home' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.home') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'front.about' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.about') }}">About Us</a>
                    </li>

                    <li class="nav-item dropdown {{ Route::currentRouteName() == 'admin.product.category' || Route::currentRouteName() == 'admin.product.subcategory' ? 'active' : '' }}">
                        <a class="nav-link {{ $categories && $categories->count() ? 'dropdown-toggle' : '' }}" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Product
                        </a>
                        @if($categories->count())
                        <ul class="dropdown-menu dropdown-menu-items-product ">
                            @foreach($categories as $category)
                            <li><a class="dropdown-item {{ $category->subcategories && $category->subcategories->count() ? 'dropdown-toggle' : '' }} {{ Route::currentRouteName() == 'admin.product.subcategory' && request()->route('id') && $categoryId == $category->id ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.product.category' && request()->route('id') && $categoryId == $category->id ? 'active' : '' }}" href="javascript:void(0);">{{ $category->name }}</a>
                                @if($category->subcategories->count())
                                <ul class="dropdown-menu">
                                    @foreach($category->subcategories as $subcategory)
                                    <li><a class="dropdown-item {{  $subcategory->subsubcategories && $subcategory->subsubcategories->count() ? 'dropdown-toggle' : '' }} {{ Route::currentRouteName() == 'admin.product.category' && request()->route('id') && request()->route('id') ==$subcategory->id ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.product.subcategory' && request()->route('id') && $subCategoryId == $subcategory->id ? 'active' : '' }}" href="{{route('admin.product.category',$subcategory->id)}}">{{ $subcategory->name }}</a>
                                        @if($subcategory->subsubcategories->count())
                                        <ul class="dropdown-menu">
                                            @foreach($subcategory->subsubcategories as $subSubCategory)
                                            <li><a class="dropdown-item {{ Route::currentRouteName() == 'admin.product.subcategory' && request()->route('id') && request()->route('id') ==$subSubCategory->id  ? 'active' : '' }} " href="{{route('admin.product.subcategory',$subSubCategory->id)}}">{{$subSubCategory->name}}</a></li>
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

                    <li class="nav-item {{ Route::currentRouteName() == 'front.services' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('front.services') }}">Services</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'front.contact' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('front.contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

</div>
<!--header section end -->
