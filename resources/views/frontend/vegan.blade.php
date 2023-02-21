@extends('layouts.frontend.app')
@section('content')
    <div class="page">
        <div class="container-fluid block-padding"
            style="background-color: #FAF39F !important; background-image: linear-gradient(#FAF39F, white); justify-content: space-evenly; padding-top: 25%;padding-bottom: 100px;">
            <div class="text-center">
                <h1 style="color: black; -webkit-text-stroke-width: thin; letter-spacing: 2px;">COMING SOON</h1>
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
