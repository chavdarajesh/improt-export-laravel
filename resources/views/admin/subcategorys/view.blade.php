@extends('admin.layouts.main')
@section('title', 'View Subcategory')

@section('css')
<style>
    .other-fileds {
        display: none;
    }
</style>
@if ($Subcategory->category->is_premium =='1')
<style>
    #dynamic-quality-field-div {
        display: block;
    }
</style>
@else
<style>
    #price-field-div,
    #description-field-div {
        display: block;
    }
</style>
@endif
@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subcategorys /</span> All Subcategorys /</span> View Subcategory</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">View Subcategorys</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $Subcategory['image'] ? asset($Subcategory['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                alt="Subcategory Image" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div id="dvPreview">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" disabled id="name" name="name"
                                value="{{ $Subcategory['name'] }}" />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <input class="form-control" type="text" disabled id="category" name="category"
                                value="{{ $Subcategory->category->name }}" />
                        </div>

                        <div class="mb-3 col-md-12 other-fileds" id="dynamic-quality-field-div">
                            <label for="quality" class="form-label">Quality</label>
                            <div id="quality-fields">
                                @foreach ($Subcategory->subsubcategories as $quality)
                                <div>
                                    <div class="field-group d-flex my-1 dynamic-field-inputs-div" id="field-{{ $loop->index }}">
                                        <input type="text" disabled name="sub_sub_categories[{{ $loop->index }}][name]" class="form-control" value="{{  $quality->name}}" required>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3 col-md-12 other-fileds" id="price-field-div">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control" type="text" disabled id="price" name="price"
                                value="{{ $Subcategory['price'] }}" />
                        </div>

                        <div class="mb-3 col-md-12 other-fileds" id="description-field-div">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-control">
                                {!! html_entity_decode($Subcategory['description']) !!}
                            </div>
                        </div>


                        <div class="mt-2">
                            <a href="{{ route('admin.subcategorys.edit', $Subcategory->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.subcategorys.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@stop
