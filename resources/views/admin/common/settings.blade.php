@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Settings'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Settings</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />
                <x-errors />

                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Contact Details</h3>
                        <form method="POST" action="{{ route('admin.settings.update') }}">
                            @csrf
                            @foreach ($contact_details as $item)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ $item->label }}</label>
                                    <input type="{{ $item->type }}" name="contact_details[{{ $item->name }}]" class="form-control"
                                        value="{{ $item->value }}">
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Social Media Links</h3>
                        <form method="POST" action="{{ route('admin.settings.update') }}">
                            @csrf
                            @foreach ($social_links as $item)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ $item->label }}</label>
                                    <input type="url" name="social_media[{{ $item->name }}]" class="form-control"
                                        value="{{ $item->value }}">
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/select2-bootstrap.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ asset('admin-asset/js/vendor/select2.full.js') }}"></script>
@endpush
