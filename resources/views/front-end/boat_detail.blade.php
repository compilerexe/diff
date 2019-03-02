@extends ('layouts.app')
@section ('content')

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-5" style="//padding: 0 0 0 50px;">
                    <div style="padding: 15px 15px 15px 15px; color: black;">
                        <p class="font-explore-title" style="color: red;">Axis Wake {{ $boat->model }}</p>
                        <br>
                        <h1 class="title-content model-title" id="boat-model-title">
                            {{ $explore_boat->second_section_header }}
                        </h1>
                        <br>
                        <p class="content model-content" id="boat-model-description">
                            {{ $explore_boat->second_section_description }}
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-7" style="padding: 0;">
                    <div class="text-center" style="padding: 30px 30px 30px 30px;">
                        <img src="{{ $explore_boat->second_section_boat_image }}" alt="image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-orangered" style="padding: 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12">

                    @php
                        $slides = [];
                        foreach ($explore_boat->third_section_image as $image) {
                            array_push($slides, $image);
                        }
                    @endphp
                    <div class="page-carousel">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($slides as $item)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                        class="{{ ($loop->index == 0) ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach ($slides as $url)
                                    <div class="carousel-item {{ ($loop->iteration == 1) ? 'active' : '' }}">
                                        <img class="d-block img-fluid"
                                             src="{{ $url }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators"
                               role="button" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators"
                               role="button" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <br>

                    <div class="text-center" style="padding-top: 30px; padding-bottom: 50px;">
                        @php
                            $glance = [];
                            foreach ($explore_boat->third_section_glance as $key => $value) {
                                $glance[$key] = $value;
                            }
                        @endphp
                        <h3 class="text-white font-at glance-content">
                            {{ lang_other()->hull_length }} : {{ $glance['hull_length'] }}
                        </h3>
                        <h3 class="text-white font-at glance-content">
                            {{ lang_other()->beam }} : {{ $glance['beam'] }}
                        </h3>
                        <h3 class="text-white font-at glance-content">
                            {{ lang_other()->draft }} : {{ $glance['draft'] }}
                        </h3>
                        <h3 class="text-white font-at glance-content">
                            {{ lang_other()->max_capacity }} : {{ $glance['max_capacity'] }}
                        </h3>
                        <br>
                        <a href="https://www.axiswake.com/boat-configurator"
                           class="btn btn-axis border-white text-white" target="_blank">
                            {{ lang_button()->build_a_boat }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="site-section" style="padding-top: 0; padding-bottom: 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12" style="padding: 0;">

                    <div style="//min-height: 100vh;">
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe
                                    src="https://player.vimeo.com/video/{{ $explore_boat->fourth_section_video }}?title=0&byline=0&portrait=0"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
