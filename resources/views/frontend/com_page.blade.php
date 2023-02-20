@extends('layouts.frontend.app')
@section('content')
    <div class="page">
        <div class="container-fluid block-padding"
            style="
        background-color: #faf39f !important;
        background-image: linear-gradient(#faf39f, white);
        justify-content: space-evenly;
        padding-top: 80px;
      ">
            <div class="text-center">
                <h1
                    style="
            color: black;
            -webkit-text-stroke-width: thin;
            letter-spacing: 2px;
          ">
                    {{ $page->title }}
                </h1>
                {!! $page->body !!}
            </div>
        </div>
    </div>
@endsection
@push('header')
    <style>
        @media (max-width: 1200px) {
            .navbar {
                padding: 5px;
                padding-bottom: 0px;
            }
        }

        p {
            color: black;
            -webkit-text-stroke-width: thin;
            letter-spacing: 2px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .block-padding {
                padding-bottom: 12px;
                padding-top: 5px;
            }
        }
    </style>
@endpush
