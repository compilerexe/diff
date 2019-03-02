@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                @if(\Session::has('update_status'))
                    <div class="form-group">
                        <div class="alert alert-success" role="alert">
                            <strong>{{ txt_success() }}</strong>
                        </div>
                    </div>
                    @push ('scripts')
                        <script>
                            timeOutAlert('.alert');
                        </script>
                    @endpush
                @endif

                <div class="form-group">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h3 class="mb-0">
                                        <a href="{{ route('manage.content.index') }}" style="text-transform: capitalize;">
                                            All
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        <span style="text-transform: capitalize;">{{ $country->country_name }}</span>
                                        <i class="fa fa-angle-right"></i>
                                        <span style="text-transform: capitalize;">Database</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <a href="https://jsoneditoronline.org/" target="_blank">
                                    <h3 class="text-success">
                                        <i class="fa fa-database"></i>
                                        Editor Tools : https://jsoneditoronline.org/
                                    </h3>
                                </a>
                            </div>

                            <ul>
                                <li>
                                    <a href="javascript:void(0)" id="s-about-malibu">
                                        About Axis
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('manage.content.explore_boat.index', ['country_id' => $country->id]) }}">
                                        Explore Boats
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" id="s-lang">
                                        Langs
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">
                                        Table
                                        <i class="fa fa-angle-right"></i>
                                        <span class="current-table"></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div id="content-about-malibu" style="display: none;">
                                @include('back-end.content.pages.about_axis')
                            </div>

                            <div id="content-lang" style="display: none;">
                                @include('back-end.content.pages.lang')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function displayContent(className) {
                $('#content-about-malibu').hide();
                $('#content-lang').hide();

                $(className).fadeIn();
                // let currentTable = className.slice(8);
                // currentTable = currentTable.replace('-', '_');
                // currentTable = currentTable.replace('-', '_');
                // currentTable = currentTable.replace('-', '_');
                // $('.current-table').text(currentTable);
            }

            $('#s-about-malibu').on('click', function () {
                displayContent($('#content-about-malibu'))
            });

            $('#s-lang').on('click', function () {
                displayContent($('#content-lang'));
            });

        </script>
    @endpush
@endsection
