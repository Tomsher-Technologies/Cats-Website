@extends('layouts.frontend.app')
@section('content')
    <div class="page">
        <div class="container-fluid block-padding"
            style="background-color: #FAF39F !important; background-image: linear-gradient(#FAF39F, white); justify-content: space-evenly; padding-top: 80px;">
            <div class="text-center">
                <h1 style="color: black; -webkit-text-stroke-width: thin; letter-spacing: 2px;">
                    {{ $page->title }}
                </h1>
                {!! $page->body !!}
            </div>
        </div>

        @if ($hotels)
            @foreach ($hotels as $hotel)
                <div class="container-fluid block-padding"
                    style="background-color: #FAF39F !important; background-image: linear-gradient(#FAF39F, white); justify-content: space-evenly; padding-top: 5px;">
                    <p style="color: black; -webkit-text-stroke-width: thin; letter-spacing: 2px; text-align: center">
                        <b>{{ $hotel->name }}:</b><br />
                        <img src="{{ $hotel->featuredImage() }}" class="img-fluid img-thumbnail"
                            alt="{{ $hotel->image_alt ?? $hotel->name }}"
                            style="border-radius: 0% !important; padding: 0rem;">
                    </p>
                </div>
                <div class="container-fluid block-padding"
                    style="background-color: #FAF39F !important; background-image: linear-gradient(#fff68f, #fffcd7); justify-content: space-evenly; margin-top: -29px; ">
                    {!! $hotel->content !!}

                    @if ($hotel->videos)
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-10 m-auto">
                                    <div class="row justify-content-center">
                                        @foreach (json_decode($hotel->videos) as $video)
                                            <div class="col-lg-4">
                                                <iframe width="100%" height="315"
                                                    src="{{ convertYoutube($video) }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen=""></iframe>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            @endforeach
        @endif

        @isset($blocks['Bottom Content'])
            <div class="container-fluid pt-2"
                style="background-color: #FAF39F !important; background-image: linear-gradient(#FAF39F, white); ">
                <div class="row">
                    <div class="col-sm-12">
                        {!! $blocks['Bottom Content']->content !!}
                    </div>
                </div>
            </div>
        @endisset


    </div>
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
