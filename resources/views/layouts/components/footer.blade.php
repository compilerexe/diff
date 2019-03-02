@php
    if (session('country_id') == 1) {
        $lang = \App\Models\Langs::where('country_id', 1)->where('tag', 'footer')->first();
    } else {
        $lang = \App\Models\Langs::where('country_id', config('country')->id)->where('tag', 'footer')->first();
    }
@endphp

<div class="footer-spacing footer-custom" style="display: none;"></div>
<footer class="footer footer-custom" style="z-index: 1 !important; display: none;">
    <div class="inner">

        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="row">
                    <div class="col">
                        <a href="https://www.malibuboats.com" target="_blank">
                            <img src="{{ asset('images/malibu-logo.png') }}" alt="Image" class="logo">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="https://www.axiswake.com" target="_blank">
                            <img src="{{ asset('images/logo-axis.png') }}" alt="Image" class="logo">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4">

                <p style="font-family: AtlasTypewriter-Bold, sans-serif;">

                    <a href="{{ clientNavbarURL(config('country')->country_name,'/all-boats') }}">
                        {{ lang_navbar()->boats }}
                    </a>
                    <br>
                    <a href="{{ clientNavbarURL(config('country')->country_name,'/about-axis') }}">
                        {{ lang_navbar()->about_axis }}
                    </a>
                    <br>
                    <a href="{{ clientNavbarURL(config('country')->country_name,'/news') }}">
                        {{ lang_navbar()->news_and_events }}
                    </a>
                    <br>
                    @if (config('country')->country_name == 'asia')
                        <a href="{{ clientNavbarURL(config('country')->country_name,'/find-a-dealer') }}">
                            {{ lang_navbar()->find_a_dealer }}
                        </a>
                    @else
                        <a href="{{ clientNavbarURL(config('country')->country_name,'/contact-dealer') }}">
                            {{ lang_navbar()->contact_dealer }}
                        </a>
                    @endif
                </p>
            </div>

            <div class="col-lg-2 col-md-4">
                <p style="font-family: AtlasTypewriter-Bold, sans-serif;">
                    @if (config('country')->country_name == 'asia')
                        <a href="https://www.axiswake.com/boat-configurator" target="_blank">
                            {{ lang_button()->build_a_boat }}
                        </a>
                    @else
                        <a href="{{ clientNavbarURL(config('country')->country_name,'/contact-dealer#form-section') }}">
                            {{ lang_button()->test_drive }}
                        </a>
                        <br>
                        <a href="https://www.axiswake.com/boat-configurator" target="_blank">
                            {{ lang_button()->build_a_boat }}
                        </a>
                        <br>
                        <a href="javascript:void(0)" class="btn-contact-dealer-request-catalog">
                            {{ lang_button()->request_a_catalog }}
                        </a>
                        <br>
                        <a href="{{ clientNavbarURL(config('country')->country_name,'/inventory') }}">
                            {{ lang_button()->inventory }}
                        </a>
                    @endif
                </p>
            </div>

            <div class="col-lg-2 col-md-4">
                <p style="font-family: AtlasTypewriter-Bold, sans-serif;">
                    <a href="https://www.axiswakeasia.com" target="_blank">
                        {{ json_decode($lang->data)->axis_wake_asia }}
                    </a>
                    <br>
                    <a href="https://www.malibuboatsasia.com">
                        {{ json_decode($lang->data)->malibu_boats_asia }}
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-md-4">
                <ul class="footer-menu">

                    <li>
                        <a href="https://www.facebook.com/axiswake.asia/" target="_blank">
                            <img alt="image" class="icon svg" src="{{ asset('images/icons/facebook.png') }}"
                                 style="height: 32px;"/>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/axiswake.asia/" target="_blank">
                            <img alt="image" class="icon svg" src="{{ asset('images/icons/instagram.png') }}"
                                 style="height: 32px;"/>
                        </a>
                    </li>
                    <li>
                        <a href="https://vimeo.com/axiswake" target="_blank">
                            <img alt="image" class="icon svg" src="{{ asset('images/icons/vimeo.png') }}"
                                 style="height: 32px;"/>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/axiswake" target="_blank">
                            <img alt="image" class="icon svg" src="{{ asset('images/icons/twitter.png') }}"
                                 style="height: 32px;"/>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/axiswake" target="_blank">
                            <img alt="image" class="icon svg" src="{{ asset('images/icons/youtube.png') }}"
                                 style="height: 32px;"/>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</footer>

