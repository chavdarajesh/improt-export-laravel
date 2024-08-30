@extends('admin.layouts.main')
@section('title', 'View HomeSlider')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">View HomeSliders </h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ $HomeSlider['image'] ? asset($HomeSlider['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                    alt="HomeSlider Image" class="d-block rounded" height="100" width="100"
                                    id="uploadedAvatar" />
                                <div id="dvPreview">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" disabled id="name" name="name"
                                    value="{{ $HomeSlider['name'] }}" />
                            </div>

                            <div class="mt-2">
                                <a href="{{ route('admin.homeslider.edit', $HomeSlider->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('admin.homeslider.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@stop
