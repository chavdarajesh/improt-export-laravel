@extends('admin.layouts.main')
@section('title', 'View SubSubCategory')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">View SubSubCategory</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                <div class="row mb-3">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $SubSubCategory['image'] ? asset($SubSubCategory['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                alt="SubSubCategory Image" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div id="dvPreview">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" disabled id="name" name="name"
                                value="{{ $SubSubCategory['name'] }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <input class="form-control" type="text" disabled id="category" name="category"
                                value="{{ $SubSubCategory->category->name }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Sub Category</label>
                            <input class="form-control" type="text" disabled id="category" name="category"
                                value="{{ $SubSubCategory->subCategory->name }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="price_inr" class="form-label">Price INR</label>
                            <input class="form-control" type="text"
                                id="price_inr" name="price_inr" value="{{  $SubSubCategory['price_inr']  }}" />

                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="price_usd" class="form-label">Price USD</label>
                            <input class="form-control " type="text"
                                id="price_usd" name="price_usd" value="{{  $SubSubCategory['price_usd']  }}" />

                        </div>
                        <div class="mb-3 col-md-12 other-fileds" id="description-field-div">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-control">
                                {!! html_entity_decode($SubSubCategory['description']) !!}
                            </div>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('admin.subsubcategorys.edit', $SubSubCategory->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.subsubcategorys.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@stop
