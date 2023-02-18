<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <title>{{ env('APP_NAME') }} - {{ $title ?? '' }}</title>

    <link rel="preload" href="https://fonts.googleapis.com" />
    <link rel="preload" href="http://maps.google.com" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CQuicksand:400,500,700" rel="stylesheet" />

    <link href="{{ asset('fonts/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fonts/fontawesome/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Fav icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}" />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('cookiesconsent.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('themes/cookiesconsent.theme-dark.css') }}" rel="stylesheet" />
    <!-- style CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- plugins CSS -->
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" />
    <!-- Colors CSS -->
    <link href="{{ asset('styles/maincolors.css') }}" rel="stylesheet" />
    <!-- LayerSlider CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/layerslider/css/layerslider.css') }}" />

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    @stack('header')

</head>


<body id="top">

    <div id="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
        </div>
    </div>

    @include('frontend.parts.header')

    <section>
        @yield('content')
    </section>

    @include('frontend.parts.footer')

    <div class="page-scroll hidden-sm hidden-xs">
        <a href="#top" class="back-to-top"><i class="fa fa-angle-up" style="color: black"></i></a>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('vendor/layerslider/js/greensock.js') }}"></script>
    <script src="{{ asset('vendor/layerslider/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('vendor/layerslider/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <script src="{{ asset('vendor/layerslider/js/layerslider.load.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/mailchimp.js') }}"></script>
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/prefixfree.min.js') }}"></script>
    <script src="{{ asset('cookiesconsent.min.js') }}"></script>
    <script>
        const cc = CookiesConsentJS({
            content: {
                // title
                title: "Cookies Compliance",
                // message
                message: "We use our own and third-party cookies to personalize content for rich user experience!",
                // custom button text
                btnAccept: "Accept all",
                btnReject: "Reject all",
            },
        });
    </script>

    @stack('footer')
</body>

</html>
