@extends ('layouts.app')
@section ('content')

    <section class="site-section">
        <div class="container">
            <div class="row">

                @foreach ($boats as $boat)
                    <div class="col-12 col-sm-4 tag-{{ $boat->tag }}">
                        <div class="form-group all-boats-item" style="padding: 20px 20px 20px 20px">
                            <img src="{{ $boat->boat_front_image }}" alt="image" class="img-fluid">
                            <br>
                            <div style="padding: 10px 0 10px 0">
                                <small class="sub-header-small font-at">{{ $boat->tag }}</small>
                                <h3 class="sub-header" style="margin: 0">{{ $boat->model }}</h3>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <a href="{{ clientNavbarURL(config('country')->country_name, '/boat/'.clientBoatUrl($boat->model)) }}"
                                           class="btn btn-axis text-dark"
                                           style="padding-top: 10px; padding-bottom: 10px; padding-left: 0 !important; padding-right: 0 !important; width: 100%">
                                            {{ lang_button()->explore }}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <a href="https://www.axiswake.com/boat-configurator"
                                           class="btn btn-axis text-dark"
                                           style="padding-top: 10px; padding-bottom: 10px; padding-left: 0 !important; padding-right: 0 !important; width: 100%"
                                           target="_blank">
                                            {{ lang_button()->build }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
