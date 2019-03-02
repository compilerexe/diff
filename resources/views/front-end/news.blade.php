@extends ('layouts.app')
@push ('css')

    <style>
        /* ----- Background Image ----- */

        .header-bg {
            position: relative;
            /*background-color: black;*/
            background: url('https://cdn.malibuboats.com/2018/News/Axis-hero-news_2018_2.jpg') center center no-repeat;
            background-size: cover;
            height: 100vh;
            min-height: 25rem;
            width: 100%;
            overflow: hidden;
        }

        .header-bg video {
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

        .header-bg .container {
            position: relative;
            z-index: 2;
        }

        .header-bg .overlay {
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
            .header-bg {
                background: url('https://cdn.malibuboats.com/2018/News/Axis-hero-news_2018_2.jpg') center center no-repeat;
                -webkit-background-size: cover;
                background-size: cover;
            }

            .header-bg video {
                display: none;
            }
        }

        /* ---------------------------- */
    </style>

@endpush
@section ('content')

    <section class="site-section" style="padding: 0">
        <div class="header-bg">
            <div class="overlay"></div>
            <div class="container h-100">
                <div class="d-flex text-center h-100">
                    <div class="my-auto w-100 text-white">
                        <h1 class="display-3 title-large">
                            {{ lang_news_and_events()->news_and_events }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-orangered"
             style="{{ (count($news) > 0) ? 'border-bottom: 2px solid white; padding-bottom: 0; padding-top: 100px' : '' }}">
        <div class="container" style="//padding-top: 50px; padding-bottom: 50px;">

            @foreach ($news as $data)
                <div class="row">
                    @php
                        $link = clientNavbarURL(config('country')->country_name, '/news/'.$data->id);
                        if (session('flag_en_'.config('country')->short_name) || config('country')->country_name == 'asia') {
                            $news_header = $data->news_header_en;
                            $news_description = $data->news_description_en;
                        } else {
                            $news_header = $data->news_header_local;
                            $news_description = $data->news_description_local;
                        }
                    @endphp

                    <div class="col-md-5
">
                        <a href="{{ url($link) }}"
                           class="sub-header">
                            <div style="padding-top: 15px;">
                                <img class="img-fluid"
                                     src="{{ imageFolder($data->cover_image) }}" alt="news">
                            </div>
                        </a>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <br>
                            <h3>
                                <a href="{{ url($link) }}"
                                   class="sub-header text-white">
                                    {{ $news_header }}
                                </a>
                            </h3>
                            <p class="content" style="color: white !important;">
                                {{ strip_tags(str_limit($news_description, 300)) }}
                            </p>
                            <br>
                            <a href="{{ url($link) }}"
                               class="btn btn-axis border-white"
                               style="border-color: white; color: white;">
                                {{ lang_button()->see_details }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div id="show-more-news"></div>

            @if ($showMore)
                <div class="col-12">
                    <div class="form-group text-center" id="form-show-more">
                        <button type="button" id="btn-show-more"
                                class="btn btn-axis border-white text-white"
                                style="background: transparent;">{{ lang_button()->show_more }}</button>
                    </div>
                </div>
            @endif

        </div>
    </section>

@endsection

@push ('scripts')

    <script>
        let pageStart = 0;

        $('#btn-show-more').on('click', function () {
            pageStart = pageStart + 1;
            $.post('{{ route('api.news.paginate') }}', {
                _token: '{{ csrf_token() }}',
                page: pageStart
            }).done(function (data, status) {

                if (!data[1]) {
                    $('#btn-show-more').hide();
                }

                $('#show-more-news').hide();

                data[0].forEach(news => {
                    $('#show-more-news').append(news);
                });
                $('#show-more-news').fadeIn();
            });
        });
    </script>

@endpush
