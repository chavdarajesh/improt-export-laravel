@extends('admin.layouts.main')
@section('title', 'Edit Subcategory')

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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subcategorys /</span> All Subcategorys /</span> Edit Subcategory</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Subcategorys</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('admin.subcategorys.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_premium_category_selected" value="{{$Subcategory->category->is_premium}}" id="is_premium_category_selected">

                        <input type="hidden" name="id" value="{{ $Subcategory['id'] }}">
                        <input type="hidden" name="old_image" value="{{ $Subcategory['image'] }}" id="old_image">
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
                                <img src="{{ $Subcategory['image'] ? asset($Subcategory['image']) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                    alt="Subcategory Image" class="d-block rounded" height="100" width="100"
                                    id="uploadedAvatar" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    id="name" name="name" value="{{ $Subcategory['name'] }}" autofocus />
                                <div id="name_error" class="text-danger"> @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category"
                                    name="category">
                                    @foreach ($categorys as $category)
                                    <option is_premium="{{ $category->is_premium}}" {{ $category->id == $Subcategory->category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }} {{ $category->is_premium ? '| Premium' : ''}}</option>
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
                                    @foreach ($Subcategory->subsubcategories as $quality)
                                    <div>
                                        <input type="hidden" name="sub_sub_categories[{{ $loop->index }}][id]" value="{{ $quality->id }}">
                                        <div class="field-group d-flex my-1 dynamic-field-inputs-div" id="field-{{ $loop->index }}">
                                            <input type="text" name="sub_sub_categories[{{ $loop->index }}][name]" class="form-control" value="{{  $quality->name}}" required>
                                            <button database-id="{{$quality->id}}" type="button" class="remove-quality-field btn btn-outline-danger mx-1"
                                            data-id="{{ $loop->index }}">-</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-outline-primary my-2" id="add-quality-field">+ Add New Quality Box</button>
                                <div id="sub_sub_categories_error" class="text-danger"> @error('sub_sub_categories')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-12 other-fileds" id="price-field-div">
                                <label for="price" class="form-label">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" type="text"
                                    id="price" name="price" value="{{ $Subcategory['price'] }}" autofocus />
                                <div id="price_error" class="text-danger"> @error('price')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 other-fileds" id="description-field-div">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="5" type="text"
                                    id="description" name="description" value="">{!! $Subcategory['description'] !!}</textarea>
                                <div id="description_error" class="text-danger"> @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
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

<div class="modal fade" id="item-delete-model"
    tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Delete Item
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Do You Want To Really Delete This Item?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="delete-item-modal-button" class="btn btn-danger">Delete</button>
            </div>
            </form>
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
        var imageRequired = $('#old_image').val() ? false : true;
        $('#form').validate({
            rules: {
                image: {
                    required: function() {
                        return $('#category').find(':selected').attr('is_premium') == '0' && imageRequired;
                    }
                },
                name: {
                    required: true,
                },
                price: {
                    required: true,
                    number: true,
                },
                category: {
                    required: true,
                },
                description: {
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
    var dataId;
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

        let fieldIndex = $('.dynamic-field-inputs-div').length;
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
            dataId = $(this).attr('database-id');
            if (dataId) {
                $('#item-delete-model').modal('show');
            } else {
                const id = $(this).data('id');
                $(`#field-${id}`).remove();
                const divlenght = $('.dynamic-field-inputs-div').length;
                if (divlenght <= 1) {
                    $('.remove-quality-field').prop('disabled', true);
                } else {
                    $('.remove-quality-field').prop('disabled', false);
                }
            }
        });

        $(document).on('click', '#delete-item-modal-button', function() {
            if (dataId) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.subcategorys.delete.subcat') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': dataId
                    },
                    success: function(data) {
                        if (data.success) {
                            $($("[database-id="+dataId+"]")).parent().parent().remove();
                            $('#item-delete-model').modal('hide');
                            dataId = null;
                            toastr.success(data.success);
                        }
                        if (data.error) {
                            toastr.error(data.error);
                        }
                    }
                });
            } else {
                $('#item-delete-model').modal('hide');
            }
        });
    });
</script>
@stop
