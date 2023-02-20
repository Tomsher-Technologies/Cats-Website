@extends('layouts.frontend.app')
@section('content')
    <section>
        <div class="container-fluid block-padding"
            style="
        background-color: #faf39f !important;
        background-image: linear-gradient(#faf39f, white);
        justify-content: space-evenly;
      ">
            <div class="d-flex" style="justify-content: space-evenly">
                <span><a href="tel:+{{ Str::replace(' ', '', $settings['secondary_phone']->value) }}"
                        style="color: black; -webkit-text-stroke-width: thin"><i
                            class="fa fa-mobile-alt text-dark"></i>&nbsp;{{ $settings['secondary_phone']->value }}</a></span>
                <span><a href="https://wa.me/{{ Str::replace(' ', '', $settings['secondary_whatsapp']->value) }}"
                        target="_blank" style="color: black; -webkit-text-stroke-width: thin"><i class="fab fa-whatsapp"
                            style="color: green"></i>&nbsp;{{ $settings['secondary_phone']->value }}</a></span>
            </div>
            <div class="text-center mt-4">
                {!! $page->body !!}
            </div>
        </div>
        <div class="container-fluid block-padding1"
            style="
        background-color: #faf39f !important;
        background-image: linear-gradient(#faf39f, #f1eec7);
        justify-content: space-evenly;
      ">
        </div>
        <div class="container-fluid">
            <!-- /Section-heading -->
            <div class="row">
                <!-- /col-xl-->
                <div class="col-12 col-lg-4 block-padding pb-3 pb-lg-0 pt-lg-0 pt-0"
                    style="
            position: relative;
            padding-right: 10px;
            padding-left: 10px;
            background-color: #faf39f !important;
            background-image: linear-gradient(#faf39f, #fffcda);
            padding-bottom: 10px;
          ">
                    <a href="{{ getSEOUrl('hospital') }}">
                        <img src="{{ $pages['hospital']->featuredImage() }}" alt="{{ $pages['hospital']->title }}"
                            data-aos="fade-down" data-aos-duration="1500" class="img-fluid cropped1" />
                        <h1 class="hd1"
                            style="
                position: absolute;
                top: 82%;
                left: 10%;
                color: black;
                -webkit-text-stroke-width: thin;
                letter-spacing: 2px;
              ">
                            <span>{{ $pages['hospital']->title }}</span>
                        </h1>
                    </a>
                </div>

                <div class="col-12 col-lg-4 gradient_mob1 block-padding pb-3 pt-0 pb-lg-0"
                    style="
            position: relative;
            padding-right: 10px;
            padding-left: 10px;
            background-color: #faf39f !important;
            background-image: linear-gradient(#faf39f, #fffcda);
            padding-bottom: 10px;
          ">
                    <a href="{{ getSEOUrl('laboratory') }}">
                        <img src="{{ $pages['laboratory']->featuredImage() }}" alt="{{ $pages['laboratory']->title }}"
                            data-aos="fade-down" data-aos-duration="1500" class="img-fluid cropped1" />
                        <h2 class="hd1"
                            style="
                position: absolute;
                top: 82%;
                left: 10%;
                color: black;
                -webkit-text-stroke-width: thin;
                letter-spacing: 2px;
              ">
                            <span>{{ $pages['laboratory']->title }}</span>
                        </h2>
                    </a>
                </div>

                <div class="col-12 col-lg-4 gradient_mob1"
                    style="
            position: relative;
            padding-right: 10px;
            padding-left: 10px;
            background-color: #faf39f !important;
            background-image: linear-gradient(#faf39f, #fffcda);
            padding-bottom: 10px;
          ">
                    <a href="{{ getSEOUrl('hotel') }}">
                        <img src="{{ $pages['hotel']->featuredImage() }}" alt="{{ $pages['hotel']->title }}"
                            data-aos="fade-down" data-aos-duration="1500" class="img-fluid cropped1" />
                        <h2 class="hd1"
                            style="
                position: absolute;
                top: 82%;
                left: 10%;
                color: black;
                -webkit-text-stroke-width: thin;
                letter-spacing: 2px;
              ">
                            <span>{{ $pages['hotel']->title }}</span>
                        </h2>
                    </a>
                </div>
                <!-- /row -->
            </div>

            <div class="container-fluid pt-2"
                style="
          background-color: #faf39f !important;
          background-image: linear-gradient(#fffcda, #fffcda);
          display: flex;
          justify-content: center;
          padding-right: 0px;
          padding-left: 0px;
        ">
                <div class="row">
                    <div class="col-12 col-lg-6 pb-3 pb-lg-0"
                        style="
              position: relative;
              padding-right: 10px;
              padding-left: 10px;
              background-color: #faf39f !important;
              background-image: linear-gradient(#fffcda, #fffcda);
              padding-bottom: 10px;
            ">
                        <a href="{{ getSEOUrl('our-team') }}">
                            <img src="{{ $pages['our-team']->featuredImage() }}" alt="{{ $pages['our-team']->title }}"
                                data-aos="fade-down" data-aos-duration="1500" class="img-fluid cropped1" />
                            <h2 class="hd1"
                                style="
                  position: absolute;
                  top: 82%;
                  left: 10%;
                  color: black;
                  -webkit-text-stroke-width: thin;
                  letter-spacing: 2px;
                ">
                                <span>{{ $pages['our-team']->title }}</span>
                            </h2>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6"
                        style="
              position: relative;
              padding-right: 10px;
              padding-left: 10px;
              background-color: #faf39f !important;
              background-image: linear-gradient(#fffcda, #fffcda);
              padding-bottom: 10px;
            ">
                        <a href="{{ getSEOUrl('customer-facilities') }}">
                            <img src="{{ $pages['customer-facilities']->featuredImage() }}"
                                alt="{{ $pages['customer-facilities']->title }}" data-aos="fade-down"
                                data-aos-duration="1500" class="img-fluid cropped1" />
                            <h2 class="hd1" id="te"
                                style="
                  position: absolute;
                  top: 82%;
                  left: 10%;
                  color: black;
                  -webkit-text-stroke-width: thin;
                  letter-spacing: 2px;
                ">
                                <span>{{ $pages['customer-facilities']->title }}</span>
                            </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container-fluid block-padding pt-2 pt-lg-0"
                style="
          background-color: #faf39f !important;
          background-image: linear-gradient(#fffcda, #fffcda);
          display: flex;
          justify-content: center;
          padding-right: 0px;
          padding-left: 0px;
          padding-bottom: 12px;
        ">
                <div class="row">
                    <!-- /col-xl-->
                    <div class="col-12 col-lg-6 pb-3 pb-lg-0"
                        style="
              position: relative;
              padding-right: 10px;
              padding-left: 10px;
              background-color: #faf39f !important;
              background-image: linear-gradient(#fffcda, #fffcda);
              padding-bottom: 10px;
            ">
                        <a href="{{ getSEOUrl('see-your-cat') }}">
                            <img src="{{ $pages['see-your-cat']->featuredImage() }}"
                                alt="{{ $pages['see-your-cat']->title }}" data-aos="fade-down" data-aos-duration="1500"
                                class="img-fluid cropped1" />
                            <h2 class="hd1"
                                style="
                  position: absolute;
                  top: 82%;
                  left: 10%;
                  color: black;
                  -webkit-text-stroke-width: thin;
                  letter-spacing: 1px;
                ">
                                <span>{{ $pages['see-your-cat']->title }}</span>
                            </h2>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6"
                        style="
              position: relative;
              padding-right: 10px;
              padding-left: 10px;
              background-color: #faf39f !important;
              background-image: linear-gradient(#fffcda, #fffcda);
              padding-bottom: 10px;
            ">
                        <a href="{{ getSEOUrl('our-rescue-team') }}">
                            <img src="{{ $pages['our-rescue-team']->featuredImage() }}"
                                alt="{{ $pages['our-rescue-team']->title }}" data-aos="fade-down" data-aos-duration="1500"
                                class="img-fluid cropped1" />
                            <h2 class="hd1"
                                style="
                  position: absolute;
                  top: 82%;
                  left: 10%;
                  color: black;
                  -webkit-text-stroke-width: thin;
                  letter-spacing: 1px;
                ">
                                <span>{{ $pages['our-rescue-team']->title }}</span>
                            </h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @isset($blocks['Bottom Content 1'])
            <div class="container-fluid"
                style="
        background-color: #faf39f !important;
        background-image: linear-gradient(#faf39f, white);
      ">
                <div class="row">
                    <div class="col-lg-12" style="display: flex; justify-content: center;letter-spacing: 2px;">
                        {!! $blocks['Bottom Content 1']->content !!}
                    </div>
                </div>
            </div>
        @endisset

        @isset($blocks['Bottom Content 2'])
            <div class="container-fluid pt-2"
                style="
        background-color: #faf39f !important;
        background-image: linear-gradient(#faf39f, white);
      ">
                <div class="row">
                    <div class="col-lg-12" style="display: flex; justify-content: center;letter-spacing: 2px;">
                        {!! $blocks['Bottom Content 2']->content !!}
                    </div>
                </div>
            </div>
        @endisset



        <div class="container-fluid pt-2"
            style="
        background-color: #faf39f !important;
        background-image: linear-gradient(#faf39f, white);
      ">
            <div class="row" style="display: flex; justify-content: space-around">
                <div class="col-xm-9">
                    <p
                        style="
              color: black;
              -webkit-text-stroke-width: thin;
              letter-spacing: 2px;
            ">
                        Total no. of neutered cats&nbsp;&nbsp;&nbsp;
                    </p>
                </div>
                <div class="col-xm-3">
                    <span id="neutered" style="color: Black; font-weight: bold">0</span>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: space-around">
                <div class="col-xm-9">
                    <p
                        style="
              color: black;
              -webkit-text-stroke-width: thin;
              letter-spacing: 2px;
            ">
                        Total no. of spayed females&nbsp;
                    </p>
                </div>
                <div class="col-xm-3">
                    <span id="spayed" style="color: Black; font-weight: bold">0</span>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: space-around">
                <div class="col-xm-9">
                    <p
                        style="
              color: black;
              -webkit-text-stroke-width: thin;
              letter-spacing: 2px;
            ">
                        Total no. of castrated males
                    </p>
                </div>
                <div class="col-xm-3">
                    <span id="castrated" style="color: Black; font-weight: bold">0</span>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-2"
            style="
        background-color: #faf39f !important;
        background-image: linear-gradient(#faf39f, white);
      ">
            <div class="row" style="display: flex; justify-content: space-around;">
                <div class="col-lg-12 text-center" style="letter-spacing: 2px;
                text-align: center;">
                    {!! $blocks['Payment Content']->content !!}
                    <a class="btn btn-payment" href="{{ $blocks['Payment Content']->button_link }}" target="_blank"><i
                            class="fa fa-credit-card"
                            aria-hidden="true"></i>{{ $blocks['Payment Content']->button_text }}</a>

                    <div class="payment_options mt-4">
                        <img src="{{ asset('img/payments.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('header')
    <style>
        @media (max-width: 1200px) {
            .navbar {
                padding: 5px;
                padding-bottom: 0px;
            }
        }

        @media (max-width: 768px) {
            .block-padding {
                padding-bottom: 12px;
                padding-top: 85px;
            }

            #te {
                font-size: 1.8em;
            }
        }

        p {
            color: black;
            -webkit-text-stroke-width: thin
        }

        @media (max-width: 768px) {
            .block-padding1 {
                padding-bottom: 12px;
                padding-top: 10px;
            }
        }
    </style>
@endpush
