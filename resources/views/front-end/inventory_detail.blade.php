@extends ('layouts.app')
@php
    $slides = [];
    foreach (json_decode($inventory->boat_photos) as $key => $value) {
        array_push($slides, imageFolder($value->image));
    }

    if (session('flag_en_'.config('country')->short_name)) {
        $boat_detail = $inventory->boat_detail_en;
    } else {
        $boat_detail = $inventory->boat_detail_local;
    }

    $explore = App\Models\ExploreBoats::where('boat_id', $inventory->boat_id)
            ->where('country_id', config('country')->id)->first();

            if (session('flag_en_'.config('country')->short_name)) {
                $explore = json_decode($explore->lang_en);
            } else {
                $explore = json_decode($explore->lang_country);
            }
@endphp
@push ('css')
    <style>
        .bg-header {
            position: relative;
            /*background-color: #0b1216;*/
            background: url('{{ $slides[0] }}') black no-repeat center center scroll;
            height: 100vh;
            min-height: 25rem;
            width: 100%;
            overflow: hidden;
            -webkit-background-size: cover;
            background-size: cover;
        }

        .bg-header video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            -ms-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        .bg-header .container {
            position: relative;
            z-index: 2;
        }

        .bg-header .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: black;
            opacity: 0.2;
            z-index: 1;
        }

        @media (pointer: coarse) and (hover: none) {
            .bg-header {
                background: url('{{ $slides[0] }}') black no-repeat center center scroll;
            }

            .bg-header video {
                display: none;
            }
        }

        .carousel-inner > .carousel-item > img {
            width: 70%;
            margin: auto;
        }

    </style>
@endpush
@section ('content')

    {{--<section class="site-section" style="padding-bottom: 0;">--}}
    {{--<div class="bg-header">--}}
    {{--<div class="overlay"></div>--}}
    {{--<div class="container h-100">--}}
    {{--<div class="d-flex text-center h-100">--}}
    {{--<div class="my-auto w-100 text-white">--}}
    {{--<h1 class="display-3 title-header">--}}
    {{--INVENTORY--}}
    {{--</h1>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

    <section class="site-section" style="padding-top: 0; padding-bottom: 0; //height: 100vh;">
        <div class="container-fluid" style="padding: 0;">
            <div class="row">
                <div class="col-md-12">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                         style="background-color: #F0F0F0;">
                        <ol class="carousel-indicators">
                            @foreach ($slides as $item)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                    class="{{ ($loop->index == 0) ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @foreach ($slides as $url)
                                <div class="carousel-item {{ ($loop->iteration == 1) ? 'active' : '' }}">
                                    <img src="{{ $url }}" class="d-block w-100">
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
            </div>
        </div>
    </section>

    <section class="site-section bg-orangered text-white" style="border-bottom: 3px solid white;">
        @php
            $explore = App\Models\ExploreBoats::where('boat_id', $inventory->boat_id)
            ->where('country_id', config('country')->id)->first();

            if (session('flag_en_'.config('country')->short_name)) {
                $explore = json_decode($explore->lang_en);
            } else {
                $explore = json_decode($explore->lang_country);
            }
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <h2 class="title-header font-fz-b">
                            Axis {{ $inventory->boat->model }}
                        </h2>
                        <h3 style="text-transform: uppercase;">
                            <i class="fa fa-map-marker"></i>
                            {{ config('country')->country_name }}
                            &ensp;
                            {{ lang_other()->year }} : {{ $inventory->year }}
                            &ensp;
                            {{ lang_other()->condition }} :
                            {{ ($inventory->used == 0) ? lang_other()->new : lang_other()->used }}
                            &ensp;
                            {{ lang_other()->price }} : {{ $inventory->price }}
                        </h3>
                    </div>
                    <div class="from-group text-center">
                        @if (session('flag_en_'.config('country')->short_name))
                            <div class="form-group">
                                <p>
                                    {!! $inventory->boat_detail_en !!}
                                </p>
                            </div>
                        @else
                            <div class="form-group">
                                <p>
                                    {!! $inventory->boat_detail_local !!}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-orangered text-white" style="border-bottom: 3px solid white;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <h2 class="title-header font-fz-b">
                            {{ $explore->first_section_header }}
                        </h2>
                    </div>
                    <div class="from-group text-center">
                        @if (session('flag_en_'.config('country')->short_name))
                            <div class="form-group">
                                <p>
                                    {!! $explore->second_section_description !!}
                                </p>
                            </div>
                        @else
                            <div class="form-group">
                                <p>
                                    {!! $explore->second_section_description !!}
                                </p>
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <a href="{{ clientNavbarURL(config('country')->country_name, '/boat/'.clientBoatUrl($inventory->boat->model)) }}"
                           class="btn btn-axis border-white text-white uppercase">
                            {{ lang_button()->learn_more }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-orangered text-white" id="request-form" style="border-bottom: 3px solid white;">
        <div class="container">
            <div class="row" id="form-free-test-drive">
                <div class="col-12 col-sm-8 ml-auto mr-auto">
                    <div class="text-center">
                        <h2 class="title-header font-fz-b text-white">
                            {{ lang_other()->request_form }}
                        </h2>
                    </div>
                    <br>
                    <p class="font-p-l text-white font-16">
                        {{ lang_other()->text_form_1 }}
                    </p>
                    <br>
                    <form action="{{ route('mail.send.contact-dealer.inventory') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="font-fz-b text-white font-16">{{ lang_form_input()->name }}</label>
                            <input type="text" class="form-control" placeholder="{{ lang_form_input()->name }}"
                                   style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label for="email"
                                   class="font-fz-b text-white font-16">{{ lang_form_input()->email }}</label>
                            <input type="text" class="form-control" placeholder="{{ lang_form_input()->email }}"
                                   style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_number"
                                   class="font-fz-b text-white font-16">{{ lang_form_input()->phone_number }}</label>
                            <input type="text" class="form-control" placeholder="{{ lang_form_input()->phone_number }}"
                                   style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label for="reason_for_contact"
                                   class="font-fz-b text-white font-16">{{ lang_form_input()->what_is_your_request }}</label>
                            <textarea name="" id="" class="form-control"
                                      placeholder="{{ lang_form_input()->what_is_your_request }}"
                                      rows="5" style="width: 100%;" required></textarea>
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
    </section>

@endsection
