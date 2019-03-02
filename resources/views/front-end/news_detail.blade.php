@extends ('layouts.app')
@push ('css')
    <style>
        .bg-header {
            position: relative;
            /*background-color: #0b1216;*/
            background: url("{{ imageFolder($data['cover_image']) }}") center center no-repeat;
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
                background: url("{{ imageFolder($data['cover_image']) }}") center center no-repeat;
                -webkit-background-size: cover;
                background-size: cover;
            }

            .bg-header video {
                display: none;
            }
        }
    </style>
@endpush
@section ('content')

    <section class="site-section" style="padding-bottom: 0;">
        <div class="bg-header">
            <div class="overlay"></div>
            <div class="container h-100">
                <div class="d-flex text-center h-100">
                    <div class="my-auto w-100 text-white">
                        <h1 class="display-3 title-header">
                            {{ $data['news_header'] }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container" style="//padding: 60px 0 60px 0">
            <div class="row">
                <div class="col-12 col-sm-6 ml-auto mr-auto">
                    <p>
                        {!! $data['news_description'] !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
