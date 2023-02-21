@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Edit Page'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Page</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.page.index') }}">Pages</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
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

        <form action="{{ route('admin.page.update', $page) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-12 col-md-12 col-xl-8 col-left">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-input name="title" text="Title" required :model="$page" />
                            @livewire('seo-url', ['model' => 'App\\Models\\Pages\\Page', 'model_id' => $page->id])
                            <div class="form-group">
                                <label for="name">Content</label>
                                <textarea class="form-control" name="body" id="engEditor">{!! $page->body !!}</textarea>
                            </div>
                        </div>
                    </div>

                    @if ($page->blocks)
                        @foreach ($page->blocks as $block)
                            @include('admin.page.parts.block', [
                                'block' => $block,
                            ])
                        @endforeach
                    @endif

                    <x-seo-form :model="$page" />

                </div>
                <div class="col-12 col-md-12 col-xl-4 col-right">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="action-butns">
                                <button type="submit" class="btn btn-primary mb-4 w-100">Update</button>
                            </div>

                            <h5>Featured Image</h5>
                            <div class="image-container">
                                <img id="featuredPreview" src="{{ $page->featuredImage() }}"
                                    class="responsive border-0 w-100 mb-2" />
                            </div>
                            <div class="imgbutton mb-3">
                                <label class="btn btn-outline-primary btn-upload" for="image" title="Upload image file">
                                    <input type="file" class="sr-only" id="image" name="image"
                                        accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff,.webp">
                                    Select Image
                                </label>
                            </div>

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
    @livewireStyles
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

    @livewireScripts

    <script>
        var engEditor = ClassicEditor.create(document.querySelector('#engEditor'),{
            config: [
                allowedContent = true,
                extraAllowedContent = 'iframe[*]',
            ],
            mediaEmbed: {
             previewsInData: true
            }
        });
        

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
