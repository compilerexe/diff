<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('manage.content.index') }}">
            <img src="{{ asset('images/logo-axis.png') }}" class="navbar-brand-img" alt="...">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('manage.content.index') }}">
                            <img src="{{ asset('images/logo-axis.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('language.index') }}">
                        <i class="fa fa-globe text-primary"></i>
                        Languages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dealers.index') }}">
                        <i class="fa fa-user text-success"></i>
                        Dealers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('boats.index') }}">
                        <i class="fa fa-database text-orange"></i>
                        Boats
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news-asia.index') }}">
                        <i class="fa fa-database text-orange"></i>
                        News (Asia)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manage.content.index') }}">
                        <i class="fa fa-database text-orange"></i>
                        Contents
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
