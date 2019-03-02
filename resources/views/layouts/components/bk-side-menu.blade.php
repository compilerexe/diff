<aside class="side-menu">
    <div class="inner">
        <a href="{{ clientNavbarURL(config('country')->country_name, '/') }}">
            <img src="{{ asset('images/logo-axis.png') }}" alt="Image" style="height: 32px; object-fit: contain;">
        </a>
        <ul class="language" style="margin-top: 20px;">
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
                        <span class="nav-lang" style="padding: 0 5px 0 5px; color: gray;">|</span>
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
                    <a href="{{ clientNavbarURL(config('country')->country_name, '/find-a-dealer') }}" class="nav-link">
                        {{ lang_navbar()->find_a_dealer }}
                    </a>
                @else
                    <a href="{{ clientNavbarURL(config('country')->country_name, '/contact-dealer') }}"
                       class="nav-link">
                        {{ lang_navbar()->contact_dealer }}
                    </a>
                @endif
            </li>
        </ul>
        <ul class="social-media" style="padding-bottom: 120px;">

            <li>
                <a href="https://www.facebook.com/malibuboats.asia/" target="_blank">
                    <img alt="image" class="icon svg" src="{{ asset('images/icons/facebook.png') }}"
                         style="height: 32px;"/>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/malibuboats.asia/" target="_blank">
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

        <span class="copyright">
            <a href="https://www.malibuboats.com" target="_blank">
                <img src="{{ asset('images/malibu-logo.png') }}" alt="Image" class="logo">
            </a>
            <br>
            <a href="https://www.axiswake.com" target="_blank">
                <img src="{{ asset('images/logo-axis.png') }}" alt="Image" class="logo">
            </a>
        </span>

    </div>
    <!-- end inner -->
</aside>
<!-- end side-menu -->
