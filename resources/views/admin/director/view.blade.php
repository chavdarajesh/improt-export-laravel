@extends('admin.layouts.main')
@section('title', 'View Director')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">View Directors </h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $Director['image'] ? asset($Director['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                alt="Director Image" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div id="dvPreview">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" disabled id="name" name="name"
                                value="{{ $Director['name'] }}" />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" type="text"
                                id="description" name="description" disabled>{{ $Director['description'] }}</textarea>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('admin.director.edit', $Director->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.director.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@stop
