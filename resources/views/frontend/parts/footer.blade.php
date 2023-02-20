<footer class="text-dark"
    style="
  background-color: #ffffb3 !important;
  background-image: linear-gradient(#ffffb1, white);
">
    <div class="container">
        <div class="row">
            <div class="col-md-12"
                style="
        display: flex;
        justify-content: center;
        padding-right: 1px;
        padding-left: 1px;
      ">
                <ul class="social-list list-inline">
                    <li class="list-inline-item">
                        <a title="Instagram" href="{{ $settings['instagram_url']->value ?? '#' }}" target="_blank">
                            <img src="{{ asset('img/ig.png') }}" style="width: 40px; height: auto" /></a>
                    </li>
                    <li class="list-inline-item">&nbsp;</li>
                    <li class="list-inline-item">&nbsp;</li>
                    <li class="list-inline-item">
                        <a title="Youtube" href="{{ $settings['youtube_url']->value ?? '#' }}"
                            target="_blank">
                            <img src="{{ asset('img/yt.png') }}" style="width: 40px; height: auto" /></a>
                    </li>
                    <li class="list-inline-item">&nbsp;</li>
                    <li class="list-inline-item">&nbsp;</li>
                    <li class="list-inline-item">
                        <a title="Facebook" href="{{ $settings['facebook_url']->value ?? '#' }}" target="_blank">
                            <img src="{{ asset('img/fb.png') }}" style="width: 40px; height: auto" /></a>
                    </li>
                    <li class="list-inline-item">&nbsp;</li>
                    <li class="list-inline-item">&nbsp;</li>
                    <li class="list-inline-item">
                        <a title="Youtube" href="{{ $settings['vegan_url']->value ?? '#' }}">
                            <img src="{{ asset('img/vegantest.png') }}" style="width: 40px; height: auto" /></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <!--/ col-lg -->
            <div class="col-md-6">
                <h6
                    style="
          text-align: -webkit-center;
          -webkit-text-stroke-width: thin;
          color: black;
          letter-spacing: 2px;
        ">
                    <i class="far fa-clock margin-icon text-center"></i>Opening Hours
                </h6>
                <ul class="list-unstyled">
                    <li
                        style="
            text-align: -webkit-center;
            -webkit-text-stroke-width: thin;
            color: black;
            letter-spacing: 2px;
          ">
                        {!! $settings['opening_hours']->value !!}
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <!--<h6 style="text-align: -webkit-center;"><i class="fas fa-envelope margin-icon"></i>Contact Us</h6>-->
                <ul class="list-unstyled">

                    <li
                        style="
            text-align: -webkit-center;
            -webkit-text-stroke-width: thin;
            color: black;
            letter-spacing: 2px;
          ">

                        <i class="fas fa-phone"></i>&nbsp;<a
                            href="tel:{{ Str::replace(' ', '', $settings['primary_phone']->value) }}"
                            style="color: black">{{ $settings['primary_phone']->value }}</a><br />
                        <i class="fab fa-whatsapp" style="color: green"></i>&nbsp;<a
                            href="https://wa.me/{{ Str::replace(' ', '', $settings['primary_whatsapp']->value) }}"
                            target="_blank" style="color: black">{{ $settings['primary_phone']->value }}</a>
                    </li>
                    <li>&nbsp;</li>
                    <li
                        style="
            text-align: -webkit-center;
            -webkit-text-stroke-width: thin;
            color: black;
            letter-spacing: 2px;
          ">
                        <i class="fa fa-mobile-alt"></i>&nbsp;<a href="tel:{{ Str::replace(' ', '', $settings['secondary_phone']->value) }}" style="color: black">{{ $settings['secondary_phone']->value }}</a><br />
                        <i class="fab fa-whatsapp" style="color: green"></i>&nbsp;<a href="https://wa.me/{{ Str::replace(' ', '', $settings['secondary_whatsapp']->value) }}"
                            target="_blank" style="color: black">{{ $settings['secondary_phone']->value }}</a>
                    </li>
                    <li>&nbsp;</li>
                    <li
                        style="
            text-align: -webkit-center;
            -webkit-text-stroke-width: thin;
            color: black;
            letter-spacing: 2px;
          ">
                        <i class="fa fa-map-marker"></i>&nbsp;{!! $settings['address']->value !!}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="container-fluid">
    <div class="row">
        {!! $settings['google_map']->value !!}
    </div>
</div>

<div class="container-fluid"
    style="
  background-color: #faf39f !important;
  background-image: linear-gradient(#faf39f, white);
">
    <div class="row">
        <div class="credits col-md-12">
            <p
                style="
        -webkit-text-stroke-width: thin;
        color: black;
        letter-spacing: 2px;
      ">
                All rights reserved &copy; 2023,<br />
                Cats Medical Center Veterinary Clinic L.L.C. / Designed by
                <a href="https://www.tomsher.com/" target="_blank">Tomsher</a>
            </p>
            <!--Designed by Alston Rebello-->
        </div>
    </div>
    <!--/ row -->
</div>
