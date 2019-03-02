@php
    $dealer = clientGetDealer();
    $facebook_link = $dealer->profile->facebook_link;
    $instagram_link = $dealer->profile->instagram_link;
    $website_link = $dealer->profile->website_link;
    $google_map = \App\Models\GoogleMaps::where('country_id', config('country')->id)->first();
@endphp

<section class="site-section" style="background-color: orangered; color: white; padding-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 ml-auto mr-auto wow fadeInLeft"
                 style="visibility: visible; animation-name: fadeInLeft;">
                <div class="titles text-center" style="margin-bottom: 0; padding-bottom: 0;">
                    <h2 class="title-content">{{ lang_contact_dealer()->contact_dealer }}</h2>
                </div>

                <div class="form-group" style="padding-left: 20px;">
                    <p class="content">
                        @if (session('flag_en_'.config('country')->short_name))
                            {!! $dealer->profile->short_description_en !!}
                            <a href="{{ clientNavbarURL(config('country')->country_name,'/contact-dealer/#section-about-dealer') }}">
                                {{ lang_button()->read_more }}
                            </a>
                            <br>
                            {{ $dealer->profile->telephone }}
                            <br>
                            {{ $dealer->profile->email }}
                            <br>
                            {{ $dealer->profile->address_en }}
                        @else
                            {!! $dealer->profile->short_description_local !!}
                            <a href="{{ clientNavbarURL(config('country')->country_name,'/contact-dealer/#section-about-dealer') }}">
                                {{ lang_button()->read_more }}
                            </a>
                            <br>
                            {{ $dealer->profile->telephone }}
                            <br>
                            {{ $dealer->profile->email }}
                            <br>
                            {{ $dealer->profile->address_local }}
                        @endif
                        <a href="{{ clientNavbarURL(config('country')->country_name,'/contact-dealer/#section-map') }}">
                            {{ lang_button()->get_direction }}
                        </a>
                    </p>
                    <div class="text-center">

                        <p style="color: white !important;">

                            <a href="{{ $facebook_link }}" target="_blank"
                               style="margin-right: 20px;">
                                <img src="{{ asset('images/icons/fb.png') }}" alt="image"
                                     style="width: 32px; height: 32px;">
                            </a>

                            <a href="{{ $instagram_link }}" target="_blank"
                               style="margin-right: 20px;">
                                <img src="{{ asset('images/icons/ig.png') }}" alt="image"
                                     style="width: 32px; height: 32px;">
                            </a>

                            <a href="{{ $website_link }}" target="_blank"
                               style="margin-right: 20px;">
                                <img src="{{ asset('images/icons/website.png') }}" alt="image"
                                     style="width: 32px; height: 32px;">
                            </a>

                            <a href="javascript:void(0)" id="btn-contact-us">
                                <img src="{{ asset('images/icons/contact-us.png') }}" alt="image"
                                     style="width: 32px; height: 32px;">
                            </a>

                        </p>

                    </div>
                </div>

                <div class="desktop">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <a class="btn btn-axis text-white border-white"
                                   href="{{ clientNavbarURL(config('country')->country_name,'/contact-dealer#form-section') }}"
                                   style="margin-top: 20px;">
                                    {{ lang_button()->test_drive }}
                                </a>
                            </div>
                            <div class="p-2">
                                <a class="btn btn-axis text-white border-white"
                                   href="https://www.axiswake.com/boat-configurator"
                                   style="margin-top: 20px;">
                                    {{ lang_button()->build_a_boat }}
                                </a>
                            </div>
                            <div class="p-2">
                                <a class="btn btn-axis text-white border-white btn-contact-dealer-request-catalog"
                                   href="javascript:void(0)"
                                   style="margin-top: 20px;">
                                    {{ lang_button()->request_a_catalog }}
                                </a>
                            </div>
                            <div class="p-2">
                                <a class="btn btn-axis text-white border-white"
                                   href="{{ clientNavbarURL(config('country')->country_name,'/inventory') }}"
                                   style="margin-top: 20px;">
                                    {{ lang_button()->inventory }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mobile" style="display: none;">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <a class="btn btn-axis text-white border-white"
                                   href="{{ clientNavbarURL(config('country')->country_name,'/contact-dealer#form-section') }}"
                                   style="margin-top: 20px; width: 100%;">
                                    {{ lang_button()->test_drive }}
                                </a>
                            </div>
                            <div class="col-12 text-center">
                                <a class="btn btn-axis text-white border-white"
                                   href="https://www.axiswake.com/boat-configurator"
                                   style="margin-top: 20px; width: 100%;">
                                    {{ lang_button()->build_a_boat }}
                                </a>
                            </div>
                            <div class="col-12 text-center">
                                <a class="btn btn-axis text-white border-white btn-contact-dealer-request-catalog"
                                   href="javascript:void(0)"
                                   style="margin-top: 20px; width: 100%;">
                                    {{ lang_button()->request_a_catalog }}
                                </a>
                            </div>
                            <div class="col-12 text-center">
                                <a class="btn btn-axis text-white border-white"
                                   href="{{ clientNavbarURL(config('country')->country_name,'/inventory') }}"
                                   style="margin-top: 20px; width: 100%;">
                                    {{ lang_button()->inventory }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>

@push ('scripts')
    <script>

        $('.btn-contact-dealer-request-catalog').on('click', function () {
            $.ajax({
                url: '{{ route('session.contact-dealer.store') }}',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    active_form_section: 'form-request-a-catalog'
                },
                success: function () {
                    window.location.href = '{{ clientNavbarURL(config('country')->country_name,'/contact-dealer#form-section') }}';
                }
            });
        });

        $('#btn-contact-us').on('click', function () {
            $.ajax({
                url: '{{ route('session.contact-dealer.store') }}',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    active_form_section: 'form-general'
                },
                success: function () {
                    window.location.href = '{{ clientNavbarURL(config('country')->country_name,'/contact-dealer/#form-section') }}';
                }
            });
        });

    </script>
@endpush
