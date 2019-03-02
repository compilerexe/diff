<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('dealer.profile') }}">
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
                        <a href="{{ route('dealer.profile') }}">
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
                <li class="nav-item {{ (isActiveRoute('dealer.profile') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('dealer.profile') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('dealer.profile') }}">
                        Profile
                    </a>
                </li>
                <li class="nav-item {{ (isActiveRoute('dealer.news.*') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('dealer.news.*') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('dealer.news.index') }}">
                        News
                    </a>
                </li>
                <li class="nav-item {{ (isActiveRoute('dealer.inventory.*') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('dealer.inventory.*') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('dealer.inventory.index') }}">
                        Inventory
                    </a>
                </li>
                <li class="nav-item {{ (isActiveRoute('dealer.content.get.google_maps') == 'active') ? 'bg-blue' : '' }}">
                    <a class="nav-link {{ (isActiveRoute('dealer.content.get.google_maps') == 'active') ? 'text-white' : '' }}"
                       href="{{ route('dealer.content.get.google_maps') }}">
                        Google Maps
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
