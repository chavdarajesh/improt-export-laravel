@extends('admin.layouts.main')
@section('title', 'Site Settings')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Site Settings</h5>
                    <!-- Account -->

                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('admin.site.settings.save') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($siteSettingObj as $key => $field)
                                    @if ($field->key == 'header_logo')
                                        <div class="row mb-3">
                                            <input type="hidden" name="old_header_logo" value="{{ $field->value }}">
                                            <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                class="form-label">{{ $field->title }}</label>

                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <div class="image-preview">
                                                    <img src="{{ !empty($field->value) ? asset($field->value) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                                        alt="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                        class="d-block rounded" width="186" height="48" />
                                                </div>
                                                <div class="button-wrapper">
                                                    <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                        class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload
                                                            {{ $field->title }}</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" accept="image/*"
                                                            id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                            class="account-file-input" hidden accept=""
                                                            name="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                            onchange="readURL(this)" />
                                                    </label>
                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 4Mb</p>
                                                </div>
                                            </div>
                                            <div class="text-danger">
                                                @error('setting[' . $field->id . '][' . $field->key . ']')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                        </div>
                                    {{-- @endif --}}

                                    @elseif ($field->key == 'favicon')
                                        <div class="row mb-3 ">
                                            <input type="hidden" name="old_favicon" value="{{ $field->value }}">
                                            <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                class="form-label">{{ $field->title }}</label>

                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <div class="image-preview">
                                                    <img src="{{ !empty($field->value) ? asset($field->value) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                                        alt="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                        class="d-block rounded" width="50" height="50" />
                                                </div>
                                                <div class="button-wrapper">
                                                    <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                        class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload
                                                            {{ $field->title }}</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" accept="image/*"
                                                            id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                            class="account-file-input" hidden accept=""
                                                            name="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                            onchange="readURL(this)" />
                                                    </label>
                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 4Mb</p>
                                                </div>
                                            </div>
                                            <div class="text-danger">
                                                @error('setting[' . $field->id . '][' . $field->key . ']')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                        </div>
                                    {{-- @endif --}}
                                    @elseif ($field->key == 'loader')
                                        <div class="row mb-3 ">
                                            <input type="hidden" name="old_loader" value="{{ $field->value }}">
                                            <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                class="form-label">{{ $field->title }}</label>

                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <div class="image-preview">
                                                    <img src="{{ !empty($field->value) ? asset($field->value) : asset('assets/admin/img/avatars/dummy-image-square.jpg') }}"
                                                        alt="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                        class="d-block rounded" width="125" height="100" />
                                                </div>
                                                <div class="button-wrapper">
                                                    <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                        class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload
                                                            {{ $field->title }}</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" accept="image/*"
                                                            id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                            class="account-file-input" hidden accept=""
                                                            name="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                            onchange="readURL(this)" />
                                                    </label>
                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 4Mb</p>
                                                </div>
                                            </div>
                                            <div class="text-danger">
                                                @error('setting[' . $field->id . '][' . $field->key . ']')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                        </div>
                                    {{-- @endif --}}
                                    @else
                                    {{-- @if ($field->key == 'social_facebook_url') --}}
                                        <div class="row mb-3">
                                            <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                class="form-label">{{ $field->title }}</label>
                                            <input
                                                class="form-control @error('setting[' . $field->id . '][' . $field->key . ']') is-invalid @enderror"
                                                type="text"
                                                id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                name="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                value="{{ !empty($field->value) ? $field->value : old('name') }}"
                                                autofocus />
                                            <div id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}_error"
                                                class="text-danger"> @error('setting[' . $field->id . '][' . $field->key .
                                                    ']')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    {{-- @endif --}}
                                    {{-- @if ($field->key == 'social_linkedin_url') --}}
                                        {{-- <div class="row mb-3">
                                            <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                class="form-label">{{ $field->title }}</label>
                                            <input
                                                class="form-control @error('setting[' . $field->id . '][' . $field->key . ']') is-invalid @enderror"
                                                type="text"
                                                id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                name="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                value="{{ !empty($field->value) ? $field->value : old('name') }}"
                                                autofocus />
                                            <div id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}_error"
                                                class="text-danger"> @error('setting[' . $field->id . '][' . $field->key .
                                                    ']')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div> --}}
                                    {{-- @endif --}}
                                    {{-- @if ($field->key == 'social_instagram_url') --}}
                                        {{-- <div class="row mb-3">
                                            <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                class="form-label">{{ $field->title }}</label>
                                            <input
                                                class="form-control @error('setting[' . $field->id . '][' . $field->key . ']') is-invalid @enderror"
                                                type="text"
                                                id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                name="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                value="{{ !empty($field->value) ? $field->value : old('name') }}"
                                                autofocus />
                                            <div id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}_error"
                                                class="text-danger"> @error('setting[' . $field->id . '][' . $field->key .
                                                    ']')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div> --}}
                                    {{-- @endif --}}
                                    {{-- @if ($field->key == 'social_youtube_url') --}}
                                        {{-- <div class="row mb-3">
                                            <label for="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                class="form-label">{{ $field->title }}</label>
                                            <input
                                                class="form-control @error('setting[' . $field->id . '][' . $field->key . ']') is-invalid @enderror"
                                                type="text"
                                                id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                name="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}"
                                                value="{{ !empty($field->value) ? $field->value : old('name') }}"
                                                autofocus />
                                            <div id="{{ 'setting[' . $field->id . '][' . $field->key . ']' }}_error"
                                                class="text-danger"> @error('setting[' . $field->id . '][' . $field->key .
                                                    ']')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div> --}}
                                        @endif
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
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
        function readURL(input) {
            var $input = $(input);
            var $previewDiv = $input.closest('.button-wrapper').siblings('.image-preview');
            var $globalErrorDiv = $input.closest('.button-wrapper').parent().siblings('.text-danger');

            if (input.files && input.files[0]) {
                if (input.files[0].type.startsWith('image/')) {
                    var reader = FileReader();
                    reader.onload = function(e) {
                        $previewDiv.find('img').attr("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                    $globalErrorDiv.html(''); // Clear global error message
                } else {
                    $input.val('');
                    $globalErrorDiv.html('Allowed JPG, GIF or PNG.');
                }
            }
        }
    </script>
@stop
