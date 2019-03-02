@extends ('layouts.app')
@push ('css')
    <style>
        /* ----- Background Image ----- */

        .header-bg {
            position: relative;
            /*background-color: black;*/
            background-image: url('https://cdn.malibuboats.com/images/hero-image-semi.jpg');
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
            header {
                background: url('https://cdn.malibuboats.com/2018/Models/Malibu/M235/19-M235-header.jpg') black no-repeat center center scroll;
            }

            header video {
                display: none;
            }
        }

        /* ---------------------------- */
    </style>
@endpush
@section ('content')

    <section class="site-section" style="padding-bottom: 0;">
        <div class="header-bg">
            <div class="overlay"></div>
            <div class="container h-100">
                <div class="d-flex text-center h-100">
                    <div class="my-auto w-100 text-white">
                        <h1 class="text-center title-large">
                            {{ lang_find_a_dealer()->find_a_dealer }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-orangered border-bottom-white">

        <div class="blog-1" id="blog-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 text-center ml-auto mr-auto">

                        <div class="row">
                            <div class="ml-auto mr-auto col-sm-4">
                                <br><br>
                                <a href="javascript:void(0)" id="view-intl-dealers"
                                   class="btn btn-axis font-fz-b border-white text-white">
                                    {{ lang_find_a_dealer()->view_asia_dealers }}
                                </a>
                            </div>
                        </div>

                        <br><br>

                        <div class="row" id="intl-dealers" style="display: none;">
                            <div class="col-12 col-sm-12">
                                <div class="text-left text-white">
                                    @include ('layouts.components.dealers')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@push ('scripts')

    <script>
        $('#view-dealer-list').on('click', function () {
            $('#intl-dealers').fadeOut();
            $('#dealer-list').fadeToggle();
        });

        $('#view-intl-dealers').on('click', function () {
            $('#dealer-list').fadeOut();
            $('#intl-dealers').fadeToggle();
        });
    </script>

@endpush
