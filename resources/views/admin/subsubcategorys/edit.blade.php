@extends('admin.layouts.main')
@section('title', 'Edit SubSubCategory')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit SubSubCategory</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.subsubcategorys.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $SubSubCategory['id'] }}">
                        <input type="hidden" name="old_image" value="{{ $SubSubCategory['image'] }}" id="old_image">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image" onchange="readURL(this)">
                                <div id="image_error" class="text-danger"> @error('image')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <img src="{{ $SubSubCategory['image'] ? asset($SubSubCategory['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                    alt="SubSubCategory Image" class="d-block rounded" height="100" width="100"
                                    id="uploadedAvatar" />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $SubSubCategory['name'] }}" autofocus />
                                <div id="name_error" class="text-danger"> @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category"
                                    name="category">
                                    @foreach ($categorys as $category)
                                    <option is_premium="{{ $category->is_premium}}" {{ $category->id == $SubSubCategory->category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }} {{ $category->is_premium ? '| Premium' : ''}}</option>
                                    @endforeach
                                </select>
                                <div id="category_error" class="text-danger"> @error('category')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="subcategory" class="form-label">Sub Category</label>
                                <select class="form-select @error('subcategory') is-invalid @enderror" id="subcategory" name="subcategory">
                                    @foreach ($subcategorys as $subcategory)
                                    <option {{ $subcategory->id == $SubSubCategory->sub_category_id  ? 'selected' : '' }}
                                        value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                                <div id="subcategory_error" class="text-danger">
                                    @error('subcategory') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="price_inr" class="form-label">Price INR</label>
                                <input class="form-control @error('price_inr') is-invalid @enderror" type="number"
                                    id="price_inr" name="price_inr" value="{{  $SubSubCategory['price_inr']  }}"  />
                                <div id="price_inr_error" class="text-danger"> @error('price_inr')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="price_usd" class="form-label">Price USD</label>
                                <input class="form-control @error('price_usd') is-invalid @enderror" type="number"
                                    id="price_usd" name="price_usd" value="{{ $SubSubCategory['price_usd'] }}"  />
                                <div id="price_usd_error" class="text-danger"> @error('price_usd')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="10" type="text"
                                    id="description" name="description" value="">{!! $SubSubCategory['description'] !!}</textarea>
                                <div id="description_error" class="text-danger"> @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <a href="{{ route('admin.subsubcategorys.index') }}" class="btn btn-secondary">Back</a>
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
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

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
</script>
<script>

    $(document).ready(function() {
        CKEDITOR.replace('description');
        var imageRequired = $('#old_image').val() ? false : true;
        $('#form').validate({
            rules: {
                'image': {
                    required: imageRequired,
                },
                'name': {
                    required: true,
                },
                'price_inr': {
                    required: true,
                    number: true,
                },
                'price_usd': {
                    required: true,
                    number: true,
                },
                'category': {
                    required: true,
                },
                'subcategory': {
                    required: true,
                },
                'description': {
                    required: true,
                }
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

<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var categoryId = $(this).val();

            if (categoryId) {
                // Make AJAX request
                $.ajax({
                    url: "{{ route('admin.subsubcategorys.get.subcat') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': categoryId
                    },
                    success: function(response) {
                        if (response) {
                            $('#subcategory').empty();
                            $('#subcategory').append('<option selected disabled value="">Select Sub Category</option>');
                            $.each(response, function(key, subcategory) {
                                $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                            });
                        }
                        if (response.error) {
                            toastr.error(data.error);
                        }
                    },
                    error: function() {
                        toastr.error('Unable to fetch subcategories. Please try again');
                    }
                });
            } else {
                // Clear subcategories if no category is selected
                $('#subcategory').empty();
                $('#subcategory').append('<option selected disabled value="">Select Sub Category</option>');
            }
        });
    });
</script>
@stop
