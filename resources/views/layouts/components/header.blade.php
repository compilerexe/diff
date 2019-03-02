<header class="header" style="//border: 1px solid red; top: 0 !important;">

    <div class="container-fluid" style="//border: 1px solid blue; display: none" id="navbar-mobile">
        <div class="row">
            <div class="col-lg-2 col-6">
                <div class="logo">
                    <a href="{{ clientNavbarURL(config('country')->country_name, '/') }}">
                        <img src="{{ asset('images/logo-axis.png') }}" alt="Image"
                             style="width: 100px;">
                    </a>
                </div>
                <!-- end logo -->
            </div>

            <!-- end col-8 -->
            <div class="col-lg-1 col-6">
                <ul class="site-nav-icons">
                    <li class="hamburger-menu"><span></span> <span></span> <span></span></li>
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
                <li class="nav-item">
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

</header>
<!-- end header -->
