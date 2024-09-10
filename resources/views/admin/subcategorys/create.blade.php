@extends('admin.layouts.main')
@section('title', 'Create Subcategory')

@section('css')
<style>
    .other-fileds {
        display: none;
    }
</style>
@stop

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subcategorys /</span> All Subcategorys /</span> Create Subcategory</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Subcategory </h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.subcategorys.save') }}"
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
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category"
                                    name="category">
                                    <option selected disabled value="">Select Category</option>
                                    @foreach ($categorys as $category)
                                    <option is_premium="{{ $category->is_premium}}" value="{{ $category->id }}">{{ $category->name }} {{ $category->is_premium ? '| Premium' : ''}}</option>
                                    @endforeach
                                </select>
                                <div id="category_error" class="text-danger"> @error('category')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="dynamic-quality-field-div">
                                <label for="quality" class="form-label">Quality</label>
                                <div id="quality-fields">
                                </div>
                                <button type="button" class="btn btn-outline-primary my-2" id="add-quality-field">+ Add New Quality Box</button>
                                <div id="quality_error" class="text-danger"> @error('quality')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="price-field-div">
                                <label for="price" class="form-label">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" type="number"
                                    id="price" name="price" value="{{ old('price') }}" autofocus />
                                <div id="price_error" class="text-danger"> @error('price')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="description-field-div">
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
                                <a href="{{ route('admin.subcategorys.index') }}" class="btn btn-secondary">Back</a>
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
                    required: true,
                },
                'name': {
                    required: true,
                },
                'price': {
                    required: function() {
                        return $('#category').find(':selected').attr('is_premium') == '0';
                    },
                    number: true,
                },
                'category': {
                    required: true,
                },
                'description': {
                    required: function() {
                        return $('#category').find(':selected').attr('is_premium') == '0';
                    }
                },
                'fields[]': {
                    required: function() {
                        return $('#category').find(':selected').attr('is_premium') == '1';
                    },
                    minlength: 3
                }
            },
            messages: {
                'fields[]': {
                    required: "This field is required.",
                    minlength: "Please enter at least 3 characters."
                }
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


<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var selectedCategory = $(this).find(':selected').attr('is_premium');
            $('.other-fileds').slideUp();
            $('#quality-fields').html('');
            if (selectedCategory === '1') {
                $('#dynamic-quality-field-div').slideDown();
                $('#add-quality-field').trigger('click');
                $('#is_premium_category_selected').val('1');
            } else {
                $('#is_premium_category_selected').val('0');
                $('#price-field-div').slideDown();
                $('#description-field-div').slideDown();
            }
        });

        let fieldIndex = 0;

        // Function to add a new input field
        $('#add-quality-field').click(function() {
            fieldIndex++;
            $('#quality-fields').append(`
            <div class="field-group d-flex my-1 dynamic-field-inputs-div" id="field-${fieldIndex}">
            <input type="text" name="fields[]" class="field-input form-control mx-1" required />
            <button type="button" class="remove-quality-field btn btn-outline-danger mx-1" data-id="${fieldIndex}">-</button>
            </div>
            `);
            const lenght = $('.dynamic-field-inputs-div').length;
            if (lenght <= 1) {
                $('.remove-quality-field').prop('disabled', true);
            } else {
                $('.remove-quality-field').prop('disabled', false);
            }

        });

        // Function to remove an input field
        $(document).on('click', '.remove-quality-field', function() {
            const id = $(this).data('id');
            $(`#field-${id}`).remove();
            const divlenght = $('.dynamic-field-inputs-div').length;
            if (divlenght <= 1) {
                $('.remove-quality-field').prop('disabled', true);
            } else {
                $('.remove-quality-field').prop('disabled', false);
            }
        });

    });
</script>
@stop
