<nav id="main-nav" class="navbar-expand-xl fixed-top">
    <div class="row">
        <div class="navbar container-fluid">
            <div class="container" style="display: flex; justify-content: center">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" style="max-width: 104%" />
                </a>
            </div>
            <!-- Navbartoggler -->
            <div class="container-fluid"
                style="
            background-color: #faf39f !important;
            background-image: linear-gradient(#faf39f, #f1eec7);
            justify-content: space-evenly;
          ">

                @if ($settings['primary_phone']->value)
                    <span class="margin-icon" style="color: black; font-weight: bold">
                        <i class="fa fa-phone"></i>&nbsp;<a
                            href="tel:{{ Str::replace(' ', '', $settings['primary_phone']->value) }}"
                            style="color: black">{{ $settings['primary_phone']->value }}</a>
                    </span>
                @endif
                @if ($settings['primary_whatsapp']->value)
                    <span class="margin-icon" style="color: black; font-weight: bold"><i class="fab fa-whatsapp"
                            style="color: green"></i>&nbsp;<a
                            href="https://wa.me/{{ Str::replace(' ', '', $settings['primary_whatsapp']->value) }}"
                            target="_blank" style="color: black">{{ $settings['primary_phone']->value }}</a></span>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
                    style="background: unset; -webkit-text-stroke-width: thin">
                    <span class="navbar-toggle-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <!-- menu item -->
                        <li class="nav-item  {{ Route::current()->getName() == 'home' ? "active" : "" }}">
                            <a class="nav-link" href="{{ route('home') }}">Home </a>
                        </li>
                        
                        <!-- menu item -->
                        <li class="nav-item {{ Request::url() . '/' == getSEOUrl('hospital') ? "active" : "" }} ">
                            <a class="nav-link" href="{{ getSEOUrl('hospital') }}" aria-haspopup="true"
                                aria-expanded="false">Hospital
                            </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item {{ Request::url() . '/' == getSEOUrl('laboratory') ? "active" : "" }} ">
                            <a class="nav-link" href="{{ getSEOUrl('laboratory') }}" aria-haspopup="true"
                                aria-expanded="false">Laboratory
                            </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item {{ Request::url() . '/' == getSEOUrl('hotel') ? "active" : "" }} ">
                            <a class="nav-link" href="{{ getSEOUrl('hotel') }}" aria-haspopup="true"
                                aria-expanded="false">Hotel
                            </a>
                        </li>
                        <!-- menu item -->
                        <li class="nav-item {{ Request::url() . '/' == getSEOUrl('our-team') ? "active" : "" }} ">
                            <a class="nav-link" href="{{ getSEOUrl('our-team') }}" aria-haspopup="true"
                                aria-expanded="false">Our
                                Team
                            </a>
                        </li>
                        <li class="nav-item {{ Request::url() . '/' == getSEOUrl('customer-facilities') ? "active" : "" }} ">
                            <a class="nav-link" href="{{ getSEOUrl('customer-facilities') }}" aria-haspopup="true"
                                aria-expanded="false">Customer Facilities
                            </a>
                        </li>
                        <li class="nav-item {{ Request::url() . '/' == getSEOUrl('see-your-cat') ? "active" : "" }} ">
                            <a class="nav-link" href="{{ getSEOUrl('see-your-cat') }}" aria-haspopup="true"
                                aria-expanded="false">See your
                                cat 24/7
                            </a>
                        </li>
                        <li class="nav-item {{ Request::url() . '/' == getSEOUrl('our-rescue-team') ? "active" : "" }} ">
                            <a class="nav-link" href="{{ getSEOUrl('our-rescue-team') }}" aria-haspopup="true"
                                aria-expanded="false">Our
                                Rescue Team
                            </a>
                        </li>
                    </ul>
                    <!--/ul -->
                </div>
                <!--collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar -->
    </div>
    <!--/row -->
</nav>
