@extends('front.layouts.main')
@section('title', 'Contact')
@section('css')

@stop
<style>
    .map-responsive iframe {
        width: 100%;
        height: 100%;
    }
</style>
@section('content')

<!-- contact section start -->
<div class="contact_section layout_padding margin_top90">
    <div class="container">
        <h1 class="contact_taital">Get In Touch</h1>
        <p class="contact_text">If You Have Any Query, Please Contact Us</p>
        <div class="contact_section_2 layout_padding">
            <div class="row">
                <div class="col-md-6">
                    <form id="form" action="{{ route('front.contact.message.save') }}" method="POST">
                        @csrf
                        <input type="text" class="mail_text @error('name') border border-danger @enderror " placeholder="Full Name" id="name" value="{{ old('name') }}" name="name">
                        <div id="name_error" class="text-danger"> @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                        <input type="text" class="mail_text @error('phone') border border-danger @enderror" placeholder="Phone Number" id="phone" name="phone" value="{{ old('phone') }}">
                        <div id="phone_error" class="text-danger"> @error('phone')
                            {{ $message }}
                            @enderror
                        </div>
                        <input type="text" class="mail_text @error('email') border border-danger @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                        <div id="email_error" class="text-danger"> @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                        <textarea class="massage-bt @error('message') border border-danger @enderror " placeholder="Massage" rows="5" id="message" name="message">{{ old('message') }}</textarea>
                        <div id="message_error" class="text-danger"> @error('message')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="send_bt"><button type="submit">SEND</button></div>
                    </form>
                </div>
                @if ($ContactSetting)
                <div class="col-md-6">
                    <div class="map_main w-100 h-100">
                        <div class="map-responsive w-100 h-100">
                            {!! $ContactSetting['map_iframe'] !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- contact section end -->
@stop
@section('js')
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    number: true
                },
                subject: {
                    required: true,
                },
                message: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: 'This field is required',
                },
                email: {
                    required: 'This field is required',
                    email: 'Enter a valid email',
                },
                phone: {
                    number: 'Please enter a valid phone number.',
                },
                subject: {
                    required: 'This field is required',
                },
                message: {
                    required: 'This field is required',
                }
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('name') + '_error').html(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('border border-danger');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('border border-danger');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@stop
