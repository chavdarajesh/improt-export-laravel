@extends('admin.layouts.main')
@section('title', 'Create Director')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Director </h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.director.save') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="mb-3 col-md-12">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                    <div id="image_error" class="text-danger"> @error('image')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    id="name" name="name" value="{{ old('name') }}" autofocus />
                                <div id="name_error" class="text-danger"> @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" type="text"
                                    id="description" name="description" >{{old('description')}}</textarea>
                                <div id="description_error" class="text-danger"> @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save</button>
                                <a href="{{ route('admin.director.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script src="{{ asset('assets/admin/js/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                image: {
                        required: true,
                    },
                title: {
                    required: true,
                },
                // description: {
                //     required: true,
                // },
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('name') + '_error').html(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@stop
