@extends('admin.layouts.main')
@section('title', 'View Conatct Message')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">View Conatct Message</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $ContactMessage->id }}">

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $ContactMessage->name }}" disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input class="form-control" type="text" id="company_name" name="company_name"
                                    value="{{ $ContactMessage->company_name }}" disabled />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $ContactMessage->email }}" disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                    <label class="form-label " for="phone">Phone</label>
                                    <div class="input-group input-group-merge ">
                                        <!-- <span class="input-group-text">{{ $ContactMessage->c_code }}</span> -->
                                        <input type="text" id="phone" name="phone"
                                            class="form-control"
                                            value="{{ $ContactMessage->phone }}" disabled />
                                    </div>
                                </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="address">Address</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="address" name="address" class="form-control"
                                        value="{{ $ContactMessage->address }}" disabled />
                                </div>
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" rows="3" class="form-control" disabled> {{ $ContactMessage->message }}</textarea>
                            </div>

                        </div>
                        <div class="mt-2">
                            <a href="{{ route('admin.contact.messages.index') }}"><button type="submit"
                                    class="btn btn-secondary me-2">Back</button></a>
                        </div>

                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@stop
