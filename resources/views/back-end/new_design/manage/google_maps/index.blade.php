@extends ('layouts.new_design.manage.app')
@section ('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="form-group text-right">
                            <h2>Google Maps</h2>
                        </div>
                        <div class="form-group">

                            <form
                                action="{{ route('manage.dealer.google_maps.post', ['id' => $google_maps->id]) }}"
                                method="post">
                                <div class="form-group">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb={{ $google_maps->source_code }}"
                                        width="100%" height="300" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>
                                </div>

                                <div class="form-group">
                                    <h3>How to get code from Google Maps?</h3>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-2 text-center">
                                            <h4>Step 1</h4>
                                            <a href="{{ asset('images/GoogleMaps-1.jpg') }}" target="_blank">
                                                <div
                                                    style="background-image: url({{ asset('images/GoogleMaps-1.jpg') }}); background-size: contain; background-repeat: no-repeat; background-position: center; width: 250px; height: 100px;"></div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-sm-2 text-center">
                                            <h4>Step 2</h4>
                                            <a href="{{ asset('images/GoogleMaps-2.jpg') }}" target="_blank">
                                                <div
                                                    style="background-image: url({{ asset('images/GoogleMaps-2.jpg') }}); background-size: contain; background-repeat: no-repeat; background-position: center; width: 250px; height: 100px;"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input-source-code">Google Maps</label>
                                    <input type="text"
                                           id="input-source-code"
                                           class="form-control"
                                           name="source_code"
                                           value="{{ $google_maps->source_code }}">
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-save"></i>
                                        Save
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

