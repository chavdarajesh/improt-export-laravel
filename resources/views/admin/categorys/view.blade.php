@extends('admin.layouts.main')
@section('title', 'View Category')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">View Category</h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" disabled id="name" name="name"
                                    value="{{ $Category['name'] }}" />
                            </div>
                            <div class="mb-3 col-md-12">
                            <input class="form-checkbox mx-1 " type="checkbox" {{ $Category['is_premium'] == '1' ? 'checked': ''  }} disabled
                                        id="is_premium" name="is_premium"  />
                            <label for="is_premium" class="form-label m-0 mx-1">Premium Category</label>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('admin.categorys.edit', $Category->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('admin.categorys.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@stop
