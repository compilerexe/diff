<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('language.index') }}">
            <img src="{{ asset('images/logo-axis.png') }}" class="navbar-brand-img" alt="...">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation"
                style="text-align: right;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('language.index') }}">
                            <img src="{{ asset('images/logo-axis.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close" style="padding-right: 0;">
                        <button type="button" class="" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav"
                                style="background-color: transparent; border-color: transparent; text-align: right;">
                            <i class="fa fa-times fa-lg"></i>
                        </button>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item bg-danger">
                    <a class="nav-link" href="{{ route('dealers.index') }}" style="color: white;">
                        <i class="fa fa-backward"></i>
                        Back to admin
                    </a>
                </li>
                <li class="nav-item {{ (isActiveRoute('manage.dealer.profile.get') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('manage.dealer.profile.get') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('manage.dealer.profile.get', ['dealer_id' => session('accessDealerId')]) }}">
                        Profile
                    </a>
                </li>
                <li class="nav-item {{ (isActiveRoute('manage.dealer.news.*') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('manage.dealer.news.*') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('manage.dealer.news.index', ['dealer_id' => session('accessDealerId')]) }}">
                        News
                    </a>
                </li>
                <li class="nav-item {{ (isActiveRoute('manage.dealer.inventory.*') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('manage.dealer.inventory.*') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('manage.dealer.inventory.index', ['dealer_id' => session('accessDealerId')]) }}">
                        Inventory
                    </a>
                </li>
                <li class="nav-item {{ (isActiveRoute('manage.dealer.google_maps.get') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('manage.dealer.google_maps.get') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('manage.dealer.google_maps.get') }}">
                        Google Maps
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
