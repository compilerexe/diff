@extends ('layouts.app')
@push ('css')

    <style>
        /* ----- Background Image ----- */

        .header-bg {
            position: relative;
            /*background-color: black;*/
            background: url('https://cdn.malibuboats.com/2018/Axis Homepage Updates/hero-cinematic-split-right_A22_2019.jpg') center center no-repeat;
            background-size: cover;
            height: 100vh;
            min-height: 25rem;
            width: 100%;
            overflow: hidden;
        }

        .header-bg video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            -ms-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        .header-bg .container {
            position: relative;
            z-index: 2;
        }

        .header-bg .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: black;
            opacity: 0.2;
            z-index: 1;
        }

        @media (pointer: coarse) and (hover: none) {
            header {
                background: url('https://cdn.malibuboats.com/2018/Models/Malibu/M235/19-M235-header.jpg') black no-repeat center center scroll;
            }

            header video {
                display: none;
            }
        }

        /* ---------------------------- */
    </style>

@endpush

@section ('content')

    <section class="site-section" style="padding-bottom: 0;">
        <div class="header-bg">
            <div class="overlay"></div>
            {{--<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
            {{--<source src="https://cdn.malibuboats.com/videos/models/2019/2019_M235_WebBack.mp4" type="video/mp4">--}}
            {{--</video>--}}
            <div class="container h-100">
                <div class="d-flex text-center h-100">
                    <div class="my-auto w-100 text-white">
                        <h1 class="display-3 title-large">
                            {{--@if (session('flag_en_'.config('country')->short_name))--}}
                                {{--Axis Wake {{ config('country')->display }}--}}
                            {{--@else--}}
                                {{--{{ lang_home()->axis_boats_country }}--}}
                            {{--@endif--}}
                            Axis Wake {{ ucfirst(config('country')->display) }}
                        </h1>

                        <div class="form-group">
                            @if (config('country')->country_name != 'asia')
                                <a href="{{ clientNavbarURL(config('country')->country_name, '/contact-dealer#form-section') }}"
                                   class="btn btn-axis text-white hover-white"
                                   style="margin-right: 30px; margin-top: 30px;">
                                    {{ lang_button()->test_drive }}
                                </a>
                            @endif
                            <a href="https://www.axiswake.com/boat-configurator" target="_blank"
                               class="btn btn-axis text-white hover-white"
                               style="margin-right: 30px; margin-top: 30px;">
                                {{ lang_button()->build_a_boat }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (config('country')->country_name != 'asia')
        <section class="site-section bg-orangered">
            <div class="container" style="//padding-left: 0; //padding-right: 0;">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group text-center">
                            <h2 class="title-content font-fz-b text-white">{{ lang_home()->free_test_drive }}</h2>
                        </div>

                        <div class="form-group">
                            <br>

                            <div class="row">
                                <div class="col-md-6 bg-orangered">
                                    <div>
                                        <img class="img"
                                             src="https://cdn.malibuboats.com/2018/Models/Malibu/M235/19-M235-header.jpg">
                                    </div>
                                </div>
                                <div class="col-md-6 bg-orangered">
                                    <div style="padding: 30px 30px 30px 30px;">

                                        <p class="content text-white">
                                            {{ lang_contact_dealer()->free_test_drive_content }}
                                        </p>

                                        <br>

                                        <div class="text-center">
                                            <a href="{{ clientNavbarURL(config('country')->country_name, '/contact-dealer#form-section') }}"
                                               class="btn btn-axis border-white" style="border-color: white; color: white;">
                                                {{ lang_button()->schedule_a_test_drive }}
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="site-section">
        <div class="container" style="//padding: 0;">
            <div class="row">
                <div class="col-12 col-lg-5" style="//padding: 0 0 0 50px;">
                    <div style="padding: 15px 15px 15px 15px; color: black;">
                        <p class="font-explore-title">{{ lang_home()->explore_the_right_boat_for_you }}</p>
                        <br>

                        <div class="form-group row">
                            <label class="col-form-label col-6 font-explore-title" style="font-size: 18px; color: red;"
                                   id="bk-boat-model-tag">Axis Wake</label>
                            <div class="col-6">
                                <select name="" id="boat-model" class="form-control">
                                    @foreach ($boats as $boat)
                                        <option value="{{ $loop->index }}">{{ $boat->model }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <h1 class="title-content model-title" id="boat-model-title" style="color: red;"></h1>
                        <br>
                        <p class="content model-content" id="boat-model-description"></p>
                        <br>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="text-center">
                                        <a href="#"
                                           class="btn btn-axis boat-model-explore"
                                           style="border-color: white;">
                                            {{ lang_button()->explore_boat }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="text-center">
                                        <a href="https://www.axiswake.com/boat-configurator" class="btn btn-axis"
                                           style="border-color: white;">
                                            {{ lang_button()->build_a_boat }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7" style="padding: 0;">
                    <div class="text-center" style="padding: 30px 30px 30px 30px;">
                        <img src="" alt="image" class="img-fluid" id="boat-model-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-color icon-features-new bg-orangered">
        <div class="container">

            @foreach ($news as $data)

                @php
                    $link = clientNavbarURL(config('country')->country_name, '/news/'.$data->id);
                @endphp

                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-7 col-sm-12 wow fadeInLeft">
                        <div class="form-group">
                            <a href="{{ $link }}">
                                <img src="{{ imageFolder($data->cover_image) }}"
                                     alt="Image"
                                     class="image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 wow fadeInRight">
                        <div class="titles light" style="margin-bottom: 0; padding-bottom: 0;">
                            <h4 class="small-title font-AtlasGrotesk">Axis News</h4>
                            <span></span>
                            <a href="{{ $link }}"
                               style="color: white;">
                                <h2 class="title-content"
                                    style="margin-bottom: 30px !important;">
                                    {{ $data->news_header_en }}
                                </h2>
                            </a>
                        </div>
                        <div class="form-group" style="margin-top: 0; padding-top: 0;">
                            <p class="content">
                                {{ strip_tags(str_limit($data->news_description_en, 300)) }}
                            </p>
                            <br>
                            <a href="{{ $link }}"
                               class="btn btn-axis border-white"
                               style="border-color: white; color: white;">
                                {{ lang_button()->see_details }}
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </section>

    <section class="site-section icon-features" id="the-lab">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow fadeInUp">
                    <div class="titles">
                        <h2 class="title-content">{{ lang_home()->about_axis }}</h2>
                        <p class="content">{{ lang_home()->about_axis_content }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 wow fadeInUp"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <a href="{{ url(country_name().'/about-axis#wake-plus-hull')}}">
                        <h4>01 WAKE PLUS HULL</h4>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 wow fadeInUp"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <a href="{{ url(country_name().'/about-axis#power-wedge-ii')}}">
                        <h4>02 POWER WEDGE II</h4>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 wow fadeInUp"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <a href="{{ url(country_name().'/about-axis#surf-gate')}}">
                        <h4>03 SURF GATE</h4>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 wow fadeInUp"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <a href="{{ url(country_name().'/about-axis#surf-band')}}">
                        <h4>04 SURF BAND</h4>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 wow fadeInUp"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <a href="{{ url(country_name().'/about-axis#new-dash-design')}}">
                        <h4>05 NEW DASH DESIGN</h4>
                    </a>
                </div>

            </div>
        </div>
    </section>

@endsection

@push ('scripts')
    <script>
        function init_boat_model() {
            $.ajax({
                type: "post",
                url: "{{ url('/api/fetch-explore-boats') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    model: $('#boat-model').find(':selected').text()
                },
                success: function (response) {
                    console.log(response);
                    $('#boat-model-title').html(response.model + ` <span style="color: black">${response.header}</span>`);
                    $('#boat-model-description').text(response.description);
                    $('#boat-model-tag').text(response.tag);
                    $('#boat-model-image').attr('src', response.image);
                    $('.boat-model-explore').attr('href', response.link.toLowerCase().split(' ').join('-'));
                }
            });
        }

        init_boat_model();

        $('#boat-model').on('change', function () {
            init_boat_model();
        });
    </script>
@endpush
