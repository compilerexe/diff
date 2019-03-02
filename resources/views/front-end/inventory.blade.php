@extends ('layouts.app')
@push ('css')
    <style>
        .bg-header {
            position: relative;
            /*background-color: #0b1216;*/
            background: url('{{ asset('images/cdn-malibu/chatt-axis-header.jpg') }}') black no-repeat center center scroll;
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
                background: url('{{ asset('images/cdn-malibu/chatt-axis-header.jpg') }}') black no-repeat center center scroll;
            }

            .bg-header video {
                display: none;
            }
        }
    </style>
@endpush
@section ('content')

    <section class="site-section">
        <div class="bg-header">
            <div class="overlay"></div>
            <div class="container h-100">
                <div class="d-flex text-center h-100">
                    <div class="my-auto w-100 text-white">
                        <h1 class="display-3 title-large">
                            {{ lang_button()->inventory }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">

                    @foreach ($inventories as $inventory)

                        @php
                            $boat_photos = json_decode($inventory->boat_photos);
                            $link_inventory_detail = route('inventory_detail', [
                            'country_name' => clientSessionCountryName(),
                            'id' => $inventory->id
                            ]);

                            if (config('country')->lang_switch === 0) {
                                $boat_detail = $inventory->boat_detail_en;
                            } else {
                                if (session('flag_en_'.config('country')->short_name)) {
                                    $boat_detail = $inventory->boat_detail_en;
                                } else {
                                    $boat_detail = $inventory->boat_detail_local;
                                }
                            }
                        @endphp

                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <a href="{{ $link_inventory_detail }}">
                                        <img src="{{ imageFolder($boat_photos[0]->image) }}"
                                             alt="image" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8">

                                <div class="form-group">
                                    <h5 class="font-at"><span
                                                style="text-transform: uppercase;">Axis</span> {{ $inventory->boat->model }}
                                    </h5>
                                </div>

                                <div class="form-group">
                                    <h5 style="font-weight: bold;">
                                        {{ $inventory->boat_model }}
                                    </h5>
                                    <div class="form-group">
                                        <i class="fa fa-map-marker"></i>
                                        <span style="text-transform: uppercase;">
                                    {{ config('country')->country_name }}
                                    &ensp;
                                            {{ lang_other()->year }} : <span
                                                    class="font-fz-b">{{ $inventory->year }}</span>
                                            &ensp;
                                            {{ lang_other()->condition }} : <span
                                                    class="font-fz-b">{{ ($inventory->used == 0) ? lang_other()->new : lang_other()->used }}</span>
                                            &ensp;
                                            {{ lang_other()->price }} : <span
                                                    class="font-fz-b">{{ ($inventory->price == 'CONTACT DEALER') ? lang_footer()->contact_dealer : $inventory->price }}</span>
                                </span>
                                    </div>
                                    <div>
                                        <p>
                                            {!! $boat_detail !!}
                                        </p>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <a href="{{ $link_inventory_detail.'#request-form' }}"
                                                   class="btn btn-axis"
                                                   style="padding-top: 15px !important; padding-bottom: 15px !important; width: 100%;">
                                                    {{ lang_other()->request_info }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <a href="{{ $link_inventory_detail }}" class="btn btn-axis"
                                                   style="padding-top: 15px !important; padding-bottom: 15px !important; width: 100%;">
                                                    {{ lang_other()->view_detail  }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr style="margin-top: 0; padding: 0; margin-bottom: 30px; border: 1px solid red;">
                    @endforeach

                </div>
            </div>
        </div>

    </section>

@endsection
