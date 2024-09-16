@extends('admin.layouts.main')
@section('title', 'View Service')

@section('css')
@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services /</span> All Services /</span> View Service</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">View Services</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $Service['image'] ? asset($Service['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                alt="Service Image" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div id="dvPreview">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-control">
                                {!! html_entity_decode($Service['description']) !!}
                            </div>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('admin.services.edit', $Service->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@stop
