@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Add Team'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Add Team</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.teams.index') }}">Teams</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Team</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <x-status />
                {{-- <x-errors /> --}}
            </div>
        </div>

        <form action="{{ route('admin.teams.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-xl-8 col-left">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-input name="name" text="Name" required />
                            <x-input name="designation" text="Designation" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xl-4 col-right">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="action-butns">
                                <button type="submit" class="btn btn-primary mb-4 w-100">Create</button>
                            </div>
                            <select name="status" class="form-control select2-single mb-3">
                                <option {{ old('status') == '1' ? 'selected' : '' }} value="1">
                                    Enabled
                                </option>
                                <option {{ old('status') == '0' ? 'selected' : '' }} value="0">
                                    Disabled
                                </option>
                            </select>
                            <hr />

                            <h5>Featured Image</h5>
                            <div class="image-container">
                                <img id="featuredPreview" src="" class="responsive border-0 w-100 mb-2" />
                            </div>
                            <div class="imgbutton mb-3">
                                <label class="btn btn-outline-primary btn-upload" for="image" title="Upload image file">
                                    <input type="file" class="sr-only" id="image" name="image"
                                        accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff,.webp" required>
                                    Select Image
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Alt</label>
                                <input class="form-control" type="text" name="image_alt" value="{{ old('image_alt') }}">
                            </div>

                            <x-input name="sort_order" type="number" text="Sort Order" />

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('header')
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/select2-bootstrap.min.css') }}" />
    <style>
        .entry.input-group {
            margin-bottom: 15px;
        }

        .dynamic-wrap .btn {
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush

@push('footer')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('admin-asset/js/vendor/select2.full.js') }}"></script>
    <script>
        $('#name').on('change', function() {
            console.log($('#name').val());
            Livewire.emit('titleChanged', $('#name').val())
        });

        var engEditor = ClassicEditor.create(document.querySelector('#engEditor'));

        function readURL(input, node) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(node).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURL(this, '#featuredPreview');
        });

        $('#deleteBtn').on('click', function() {
            if (confirm('Are you sure you want to delete this?')) {
                $('#deleteForm').submit();
            }
        });


        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();

                var dynaForm = $('.dynamic-wrap'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(dynaForm);

                newEntry.find('input').val('');
                dynaForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove rounded-0')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="simple-icon-minus"></span>');
            }).on('click', '.btn-remove', function(e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });
    </script>
@endpush
