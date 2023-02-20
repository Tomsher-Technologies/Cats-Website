@extends('layouts.frontend.app')
@section('content')
    <section class="pb-0">

        <div class="container-fluid block-padding"
            style="background-color: #FAF39F !important; background-image: linear-gradient(#FAF39F, white); justify-content: space-evenly; padding-top: 80px;">
            <div class="text-center">
                <h1 style="color: black; -webkit-text-stroke-width: thin; letter-spacing: 2px;">
                    {{ $page->title }}
                </h1>
                {!! $page->body !!}
            </div>
        </div>

        @if ($hospitals)
            <div class="container-fluid">
                <!-- /Section-heading -->
                <div class="row">
                    <!-- /col-xl-->
                    @foreach ($hospitals as $hospital)
                        <div class="col-12 col-lg-4 block-padding pb-3 pb-lg-0 pt-lg-0 pt-0"
                            style="position: relative; padding-right: 10px; padding-left: 10px; background-color: #FAF39F !important; background-image: linear-gradient(#FAF39F, white); padding-bottom: 10px">
                            <a href="coming-soon.html">
                                <img src="{{ $hospital->featuredImage() }}" alt="{{ $hospital->name }}" data-aos="fade-down"
                                    data-aos-duration="1500" class="img-fluid cropped1">
                                <h1 class="hd1"
                                    style="position: absolute; top: 82%; left: 10%; color: black; -webkit-text-stroke-width: thin; letter-spacing: 2px;">
                                    <span>{{ $hospital->name }}</span>
                                </h1>
                            </a>
                        </div>
                    @endforeach
                    <!-- /row -->
                </div>
            </div>
        @endif

    </section>
@endsection

@push('header')
    <style>
        p,
        p a {
            color: black;
            -webkit-text-stroke-width: thin;
            letter-spacing: 2px;
            text-align: center
        }

        @media (max-width: 1200px) {
            .navbar {
                padding: 5px;
                padding-bottom: 0px;
            }
        }

        @media (max-width: 768px) {
            .block-padding {
                padding-bottom: 12px;
                padding-top: 5px;
            }
        }
    </style>
@endpush
