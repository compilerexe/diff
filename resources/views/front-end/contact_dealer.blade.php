@extends ('layouts.app')
@section ('content')

    @php
        $dealerProfile = clientGetDealerProfile();
        $facebook_link = $dealerProfile->facebook_link;
        $instagram_link = $dealerProfile->instagram_link;
        $website_link = $dealerProfile->website_link;
        $google_map = \App\Models\GoogleMaps::where('country_id', config('country')->id)->first();
    @endphp

    <section class="site-section bg-orangered border-bottom-white" id="section-map">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 text-center ml-auto mr-auto">
                    <h2 class="title-header font-at text-white" style="padding-top: 30px; padding-bottom: 30px;">
                        {{ lang_contact_dealer()->contact_dealer }}
                    </h2>

                    <iframe
                            src="https://www.google.com/maps/embed?pb={{ $google_map->source_code }}"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                    <br>
                    <br>

                    <div class="text-left text-white">
                        <p class="font-at">
                            @if (session('flag_en_'.config('country')->short_name))
                                {!! $dealer_profile->fullAddressEnglish() !!}
                            @else
                                {!! $dealer_profile->fullAddressLocal() !!}
                            @endif
                        </p>
                        <br>

                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="form-group text-center">
                                    <a href="{{ urlCountry('/contact-dealer#form-section') }}">
                                        <a href="javascript:void(0)"
                                           class="btn btn-axis border-white text-white btn-contact-dealer-test-drive"
                                           style="color: white; font-size: 18px; margin-top: 20px; width: 100% !important;">
                                            {{ lang_button()->test_drive }}
                                        </a>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="form-group text-center">
                                    <a class="btn btn-axis border-white text-white"
                                       href="https://www.axiswake.com/boat-configurator"
                                       target="_blank"
                                       style="color: white; font-size: 18px; margin-top: 20px; width: 100% !important;">
                                        {{ lang_button()->build_a_boat }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="form-group text-center">
                                    <a class="btn btn-axis border-white text-white btn-contact-dealer-request-catalog"
                                       style="color: white; font-size: 18px; margin-top: 20px; width: 100% !important;">
                                        {{ lang_button()->request_a_catalog }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="form-group text-center">
                                    <a class="btn btn-axis border-white text-white"
                                       href="{{ urlCountry('/inventory') }}"
                                       style="color: white; font-size: 18px; margin-top: 20px; width: 100% !important;">
                                        {{ lang_button()->inventory }}
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="site-section bg-orangered" id="form-section">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">

                    <div class="row">
                        <div class="col-12 col-sm-4 text-center" style="padding-bottom: 15px">
                            <a href="javascript:void(0)" style="color: #66615B;" id="btn-free-test-drive">
                                    <span class="font-at text-white" id="contact-m-free-test-drive"
                                          style="font-size: 16px;">
                                        {{ lang_contact_dealer()->free_test_drive }}
                                    </span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-4 text-center" style="padding-bottom: 15px">
                            <a href="javascript:void(0)" style="color: #66615B;" id="btn-request-a-catalog">
                                    <span class="font-at" id="contact-m-request-a-catalog" style="font-size: 16px;">
                                        {{ lang_contact_dealer()->request_a_catalog }}
                                    </span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-4 text-center" style="padding-bottom: 15px">
                            <a href="javascript:void(0)" style="color: #66615B;" id="btn-general">
                                    <span class="font-at" id="contact-m-general" style="font-size: 16px;">
                                        {{ lang_contact_dealer()->general }}
                                    </span>
                            </a>
                        </div>
                    </div>

                    <hr style="border-color: white;">

                    <!-- CONTENT FREE TEST DRIVE -->

                    <div class="row" id="form-free-test-drive">
                        <div class="col-12 col-sm-10 ml-auto mr-auto">
                            <br>
                            <p class="font-p-l text-white font-16">
                                {{ lang_contact_dealer()->free_test_drive_content }}
                            </p>
                            <br>
                            <form action="{{ route('mail.send.contact-dealer.free-test-drive') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name"
                                           class="font-at text-white font-16">{{ lang_form_input()->name }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email"
                                           class="font-at text-white font-16">{{ lang_form_input()->email }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number"
                                           class="font-at text-white font-16">{{ lang_form_input()->phone_number }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->phone_number }}" required>
                                </div>

                                <div class="form-group date-input">
                                    <label for="phone_number" class="font-at text-white font-16">
                                        {{ lang_form_input()->date }}
                                    </label>
                                    <input type="text" placeholder="MM/DD/YYYY" class="date form-control"
                                           style="width: 100%;" required>
                                </div>

                                <div class="form-group">
                                    <label for="reason_for_contact"
                                           class="font-at text-white font-16">{{ lang_form_input()->reason_for_test_drive }}</label>
                                    <textarea name="" id="" class="form-control"
                                              placeholder="{{ lang_form_input()->reason_for_test_drive }}"
                                              rows="5" required></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-axis border-white"
                                            style="background: transparent; padding-top: 15px !important;">
                                        {{ lang_button()->submit }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- CONTENT REQUEST A CATALOG -->

                    <div class="row" id="form-request-a-catalog" style="display: none;">
                        <div class="col-12 col-sm-10 ml-auto mr-auto">
                            <br>
                            <p class="font-p-l text-white font-16">
                                {{ lang_contact_dealer()->request_a_catalog_content }}
                            </p>
                            <br>
                            <form action="{{ route('mail.send.contact-dealer.request-catalog') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name"
                                           class="font-at text-white font-16">{{ lang_form_input()->name }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email"
                                           class="font-at text-white font-16">{{ lang_form_input()->email }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number"
                                           class="font-at text-white font-16">{{ lang_form_input()->phone_number }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->phone_number }}" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-axis border-white"
                                            style="background: transparent; padding-top: 15px !important;">
                                        {{ lang_button()->submit }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- CONTENT GENERAL -->

                    <div class="row" id="form-general" style="display: none;">
                        <div class="col-12 col-sm-10 ml-auto mr-auto">
                            <form action="{{ route('mail.send.contact-dealer.general') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name"
                                           class="font-at text-white font-16">{{ lang_form_input()->name }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email"
                                           class="font-at text-white font-16">{{ lang_form_input()->email }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number"
                                           class="font-at text-white font-16">{{ lang_form_input()->phone_number }}</label>
                                    <input type="text"
                                           class="form-control"
                                           style="width: 100%;"
                                           placeholder="{{ lang_form_input()->phone_number }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="reason_for_contact"
                                           class="font-at text-white font-16">{{ lang_form_input()->reason_for_contact }}</label>
                                    <textarea name="" id="" class="form-control"
                                              placeholder="{{ lang_form_input()->reason_for_contact }}"
                                              rows="5" required></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-axis border-white"
                                            style="background: transparent; padding-top: 15px !important;">
                                        {{ lang_button()->submit }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="site-section" id="section-about-dealer">

        <div>
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-10 ml-auto mr-auto">
                        <div class="form-group text-center">
                            <h2 class="title sub-header font-ds">
                                {{ lang_other()->about_dealer }}
                            </h2>
                        </div>
                    </div>

                    <div class="col-12 col-sm-5 ml-auto mr-auto">
                        <div class="form-group">
                            <img src="{{ imageFolder($dealer_profile->dealer_photo) }}" alt="image" class="img-fluid">
                        </div>
                    </div>

                    <div class="col-12 col-sm-5 ml-auto mr-auto">
                        <div class="form-group">
                            <p class="text-dark">
                                @if (session('flag_en_'.config('country')->short_name))
                                    {{ $dealer_profile->long_description_en }}
                                @else
                                    {{ $dealer_profile->long_description_local }}
                                @endif
                            </p>
                            <br>
                            <div class="text-center" style="padding-top: 30px;">

                                <a href="{{ $dealer_profile->facebook_link }}" target="_blank"
                                   style="margin-right: 20px;">
                                    <img src="{{ asset('images/icons/fb.png') }}" alt="image"
                                         style="width: 32px; height: 32px;">
                                </a>

                                <a href="{{ $dealer_profile->instagram_link }}" target="_blank"
                                   style="margin-right: 20px;">
                                    <img src="{{ asset('images/icons/ig.png') }}" alt="image"
                                         style="width: 32px; height: 32px;">
                                </a>

                                <a href="{{ $dealer_profile->website_link }}" target="_blank"
                                   style="margin-right: 20px;">
                                    <img src="{{ asset('images/icons/website.png') }}" alt="image"
                                         style="width: 32px; height: 32px;">
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection

@push ('scripts')

    <script>

        function display_free_test_drive() {
            $('#form-free-test-drive').fadeIn();
            $('#form-request-a-catalog').hide();
            $('#form-general').hide();
            $('#contact-m-free-test-drive').removeClass().addClass('font-at').css('color', 'white');
            $('#contact-m-request-a-catalog').removeClass().addClass('font-at').css('color', '#66615B');
            $('#contact-m-general').removeClass().addClass('font-at').css('color', '#66615B');
        }

        function display_request_catalog() {
            $('#form-free-test-drive').hide();
            $('#form-request-a-catalog').fadeIn();
            $('#form-general').hide();
            $('#contact-m-free-test-drive').removeClass().addClass('font-at').css('color', '#66615B');
            $('#contact-m-request-a-catalog').removeClass().addClass('font-at').css('color', 'white');
            $('#contact-m-general').removeClass().addClass('font-at').css('color', '#66615B');
        }

        function display_general() {
            $('#form-free-test-drive').hide();
            $('#form-request-a-catalog').hide();
            $('#form-general').fadeIn();
            $('#contact-m-free-test-drive').removeClass().addClass('font-at').css('color', '#66615B');
            $('#contact-m-request-a-catalog').removeClass().addClass('font-at').css('color', '#66615B');
            $('#contact-m-general').removeClass().addClass('font-at').css('color', 'white');
        }

        function scroll_to_form_section() {
            $('html,body').animate({
                scrollTop: $('#form-section').offset().top
            }, 'slow');
        }

        function scroll_to_section_about_dealer() {
            $('html,body').animate({
                scrollTop: $('#section-about-dealer').offset().top
            }, 'slow');
        }

        function scroll_to_section_map() {
            $('html,body').animate({
                scrollTop: $('#section-map').offset().top
            }, 'slow');
        }

        $('#btn-free-test-drive').on('click', function () {
            display_free_test_drive();
        });

        $('#btn-request-a-catalog').on('click', function () {
            display_request_catalog();
        });

        $('#btn-general').on('click', function () {
            display_general();
        });

        $('#btn-contact-us').on('click', function () {
            display_general();
            scroll_to_form_section();
        });

        $('.btn-contact-dealer-test-drive').on('click', function () {
            display_free_test_drive();
            scroll_to_form_section();
        });

        $('.btn-contact-dealer-request-catalog').on('click', function () {
            display_request_catalog();
            scroll_to_form_section();
        });

        $('#btn-section-about-dealer').on('click', function () {
            scroll_to_section_about_dealer();
        });

        $('#btn-section-map').on('click', function () {
            scroll_to_section_map();
        });

        @if (session('form-section') == 'form-request-a-catalog')
        display_request_catalog();
        @php
            session(['form-section' => ''])
        @endphp
        @endif

        @if (session('form-section') == 'form-general')
        display_general();
        @php
            session(['form-section' => ''])
        @endphp
        @endif
    </script>

@endpush
