@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Pages'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Pages</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-status />
                <x-errors />
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <livewire:admin.page-index />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
    @powerGridStyles
    @powerGridScripts
@endpush
