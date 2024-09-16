@extends('admin.layouts.main')
@section('title', 'Create Service')

@section('css')

@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services /</span> All Services /</span> Create Service</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Service </h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.services.save') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="is_premium_category_selected" value="0" id="is_premium_category_selected">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <div id="image_error" class="text-danger"> @error('image')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12" >
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="10" type="text"
                                    id="description" name="description" value="">{{ old('description') }}</textarea>
                                <div id="description_error" class="text-danger"> @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save</button>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
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
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script src="{{ asset('assets/admin/js/jquery.validate.min.js') }}"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            if (input.files[0].type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector("#uploadedAvatar").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#image_error').html('Allowed JPG, GIF or PNG.')
                $('#upload').val('');
            }
        }
    }
    CKEDITOR.replace('description');
</script>
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                'image': {
                    required: function() {
                        return $('#category').find(':selected').attr('is_premium') == '0';
                    }
                },
                'description': {
                    required: true,
                },
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('id') + '_error').html(error)
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
