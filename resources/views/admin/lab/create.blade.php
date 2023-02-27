@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Add Laboratory'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Add Laboratory</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.laboratory.index') }}">Laboratory</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Laboratory</li>
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

        <form action="{{ route('admin.laboratory.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12 col-xl-8 col-left">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-input name="name" text="Name" required />

                            @livewire('seo-url', ['model' => 'App\\Models\\Pages\\Laboratory'])

                            <div class="form-group">
                                <label for="name">Content</label>
                                <textarea class="form-control" name="content" id="engEditor">{!! old('content') !!}</textarea>
                            </div>

                            <x-input name="main_video" text="Main Youtube Video" type="url" />

                            <h6>Other Videos</h6>
                            <div class="dynamic-wrap">
                                @if (old('fields'))
                                    @foreach (old('fields') as $video)
                                        <div class="entry input-group">
                                            <input class="form-control" name="fields[]" type="url"
                                                placeholder="Youtube URL" value="{{ $video }}" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger btn-remove rounded-0" type="button">
                                                    <span class="simple-icon-minus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="entry input-group">
                                    <input class="form-control" name="fields[]" type="url" placeholder="Youtube URL" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-add rounded-0" type="button">
                                            <span class="simple-icon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>


                        </div>
                    </div>

                    <x-seo-form />

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
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> --}}
    <script src="{{ asset('admin-asset/js/vendor/select2.full.js') }}"></script>

    <script src="{{ asset('admin-asset/js/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: '#engEditor',
            menubar: 'edit view insert format tools table help',
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor',
                'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'template', 'code',
            ],
            menu: {
                edit: {
                    title: 'Edit',
                    items: 'undo redo | cut copy paste pastetext | selectall | searchreplace'
                },
                view: {
                    title: 'View',
                    items: 'visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments'
                },
                insert: {
                    title: 'Insert',
                    items: 'image link media addcomment pageembed template codesample inserttable | charmap hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime'
                },
                format: {
                    title: 'Format',
                    items: 'bold italic underline strikethrough superscript subscript | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat'
                },
                tools: {
                    title: 'Tools',
                    items: 'spellchecker spellcheckerlanguage | a11ycheck wordcount'
                },
                table: {
                    title: 'Table',
                    items: 'inserttable | cell row column | advtablesort | tableprops deletetable'
                }
            },
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image media | preview  fullscreen | code',
        });
    </script>

    <script>
        $('#name').on('change', function() {
            console.log($('#name').val());
            Livewire.emit('titleChanged', $('#name').val())
        });

        // var engEditor = ClassicEditor.create(document.querySelector('#engEditor'));

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
