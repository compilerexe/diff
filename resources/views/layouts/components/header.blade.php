<header class="header" style="//border: 1px solid red; top: 0 !important;">

    <div class="container-fluid" style="//border: 1px solid blue;" id="navbar-mobile">
        <div class="row">
            <div class="col-lg-3 col-2">
                <ul class="site-nav-icons">
                    <li class="hamburger-menu"><span></span> <span></span> <span></span></li>
                </ul>
            </div>
            <!-- end col-2 -->
            <div class="col-lg-6 col-8" style="width: 100%;">
                <div class="logo" style="width: 100%;">
                    <a href="https://www.axiswakeasia.com" style="width: 80%;">
                        <img src="https://www.axiswakeasia.com/images/logo-axis.png" alt="Image" style="width: 100px;margin-left: auto;
                                margin-right: auto;float:none;
                                display: block;">
                    </a>
                </div>
                <!-- end logo -->
            </div>
            <!-- end col-8 -->
            <div class="col-lg-3 col-2">
                <!--<a href="https://www.youtube.com/malibuboats" area-expanded="false" data-toggle="modal"
                    data-target="#country-modal">
                    <img style="width:100%; height:auto;" src="https://www.axiswakeasia.com/images/icons/earth.png" alt="" style="height: 16px;">
                </a>-->
                <ul style="list-style-type: none;">
                    @if (config('country')->country_name == 'asia')
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal"
                               data-target="#country-modal" style="padding: 0; margin: 15px 0 0 -30px;">
                                <img src="{{ asset('images/icons/earth.png') }}" alt=""
                                     style="height: 20px; width: 20px;">
                            </a>
                        </li>
                    @else
                        @if (config('country')->lang_switch == 1)
                            <li class="nav-item" style="margin: 20px 0 0 -50px;">
                                <a href="{{ url(urlCountryReplace(config('country')->country_name).'/set/lang/local') }}"
                                   class="nav-lang">
                                    {{ config('country')->short_name }}
                                </a>
                                <span class="nav-lang" style="padding: 0;">|</span>
                                <a href="{{ url(urlCountryReplace(config('country')->country_name).'/set/lang/en') }}"
                                   class="nav-lang">
                                    EN
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link" style="padding: 0; margin: 15px 0 0 -30px;">
                                    <img src="{{ config('country')->icon }}" alt=""
                                         style="height: 20px; width: 20px;">
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
            <!-- end col-2 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->

    <div class="container-fluid" style="//border: 1px solid blue; display: none" id="navbar-desktop">

        <div class="left-side">
            <div class="logo">
                <a href="{{ clientNavbarURL(config('country')->country_name, '/') }}">
                    <img src="{{ asset('images/logo-axis.png') }}" alt="Image"
                         style="width: 150px; height: 45px;">
                </a>
            </div>
        </div>
        <!-- end logo -->

        <div class="right-side">
            <ul class="site-nav">
                <li class="nav-item mega-menu">
                    <a href="{{ clientNavbarURL(config('country')->country_name, '/all-boats') }}" class="nav-link">
                        {{ lang_navbar()->boats }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ clientNavbarURL(config('country')->country_name, '/about-axis') }}" class="nav-link">
                        {{ lang_navbar()->about_axis }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ clientNavbarURL(config('country')->country_name, '/news') }}" class="nav-link">
                        {{ lang_navbar()->news_and_events }}
                    </a>
                </li>
                <li class="nav-item">
                    @if (config('country')->country_name == 'asia')
                        <a href="{{ clientNavbarURL(config('country')->country_name, '/find-a-dealer') }}"
                           class="nav-link">
                            {{ lang_navbar()->find_a_dealer }}
                        </a>
                    @else
                        <a href="{{ clientNavbarURL(config('country')->country_name, '/contact-dealer') }}"
                           class="nav-link">
                            {{ lang_navbar()->contact_dealer }}
                        </a>
                    @endif
                </li>

                @if (config('country')->country_name == 'asia')
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal"
                           data-target="#country-modal">
                            <img src="{{ asset('images/icons/earth.png') }}" alt="image"
                                 style="height: 16px; width: 16px;">
                        </a>
                    </li>
                @else
                    @if (config('country')->lang_switch == 1)
                        <li class="nav-item">
                            <a href="{{ url(urlCountryReplace(config('country')->country_name).'/set/lang/local') }}"
                               class="nav-lang">
                                {{ config('country')->short_name }}
                            </a>
                            <span class="nav-lang" style="padding: 0 5px 0 5px;">|</span>
                            <a href="{{ url(urlCountryReplace(config('country')->country_name).'/set/lang/en') }}"
                               class="nav-lang">
                                EN
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img src="{{ config('country')->icon }}" alt="image"
                                     style="height: 16px; width: 16px;">
                            </a>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->

    <div class="mega-dropdown">
        <div class="explore">
            <div class="explore-eff"></div>
            <a href="https://www.axiswakeasia.com/asia/all-boats">
                <p>EXPLORE ALL BOATS</p> <span></span>
            </a>
        </div>
        <div class="mega-boats" data-bind="foreach: $root.filteredBoats" style="transform: translate3d(0px, 0px, 0px); cursor: move; touch-action: pan-y; user-select: none;">
            <div class="each-boat">
                <img src="https://www.axiswakeasia.com/images/boats/2019/small/A20_Rear_Port-s.png" alt="">
                <div class="caption-boat">
                    <h2>A20</h2>
                    <p>Axis Wake</p>
                </div>
                <div class="btn-boat">
                    <a href="https://www.axiswakeasia.com/asia/boat/a20">View</a>
                    <a href="https://www.axiswake.com/boat-configurator">Build</a>
                </div>
            </div>
            <div class="each-boat">
                <img src="https://www.axiswakeasia.com/images/boats/2019/small/A22_Rear_Port-s.png" alt="">
                <div class="caption-boat">
                    <h2>A22</h2>
                    <p>Axis Wake</p>
                </div>
                <div class="btn-boat">
                    <a href="https://www.axiswakeasia.com/asia/boat/a22">View</a>
                    <a href="https://www.axiswake.com/boat-configurator">Build</a>
                </div>
            </div>
            <div class="each-boat">
                <img src="https://www.axiswakeasia.com/images/boats/2019/small/A24_Rear_Port-s.png" alt="">
                <div class="caption-boat">
                    <h2>A24</h2>
                    <p>Axis Wake</p>
                </div>
                <div class="btn-boat">
                    <a href="https://www.axiswakeasia.com/asia/boat/a24">View</a>
                    <a href="https://www.axiswake.com/boat-configurator">Build</a>
                </div>
            </div>
            <div class="each-boat">
                <img src="https://www.axiswakeasia.com/images/boats/2019/small/T22-rear-port-s.png" alt="">
                <div class="caption-boat">
                    <h2>T22</h2>
                    <p>Axis Wake</p>
                </div>
                <div class="btn-boat">
                    <a href="https://www.axiswakeasia.com/asia/boat/t22">View</a>
                    <a href="https://www.axiswake.com/boat-configurator">Build</a>
                </div>
            </div>
            <div class="each-boat">
                <img src="https://www.axiswakeasia.com/images/boats/2019/small/T23-rear-port-s.png" alt="">
                <div class="caption-boat">
                    <h2>T23</h2>
                    <p>Axis Wake</p>
                </div>
                <div class="btn-boat">
                    <a href="https://www.axiswakeasia.com/asia/boat/t23">View</a>
                    <a href="https://www.axiswake.com/boat-configurator">Build</a>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- end header -->
