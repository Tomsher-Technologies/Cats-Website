<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <title>{{ env('APP_NAME') }} - {{ $title ?? '' }}</title>

    <link rel="stylesheet" href="{{ asset('admin-asset/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/vendor/select2-bootstrap.min.css') }}" />
    @livewireStyles
    @livewireScripts
    @stack('header')
    <link rel="stylesheet" href="{{ asset('admin-asset/css/dore.light.blue.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/main.css') }}" />
    
</head>


<body class="menu-sub-hidden show-spinner rounded {{ $body_class ?? '' }}" id="{{ $body_id ?? 'app-container' }}">

    {{-- Navbar Start --}}
    @include('parts.admin.topnav')
    {{-- Navbar End --}}

    {{-- Sidenav Start --}}
    {{-- @include('parts.sidenav') --}}
    <x-side-nav />
    {{-- Sidenav End --}}

    {{-- Main Content Start --}}
    <main class="default-transition">
        @yield('content')
    </main>
    {{-- Main Content End --}}

    {{-- Footer Start --}}
    @include('parts.admin.footer')
    {{-- Footer End --}}

    {{-- Logout Form Start --}}
    <form action="{{ route('logout') }}" method="post" id="logoutForm">
        @csrf
    </form>
    {{-- Logout Form End --}}

    <script src="{{ asset('admin-asset/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('admin-asset/js/dore.script.js') }}"></script>
    @stack('footer')
    <script src="{{ asset('admin-asset/js/scripts.single.theme.js') }}"></script>
</body>

</html>
