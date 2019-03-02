@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Contents</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{--<div class="form-group text-right">--}}
                        {{--<button type="button" class="btn btn-success">--}}
                        {{--<i class="fa fa-plus"></i>--}}
                        {{--Create--}}
                        {{--</button>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Country</th>
                                        <th>Display</th>
                                        <th>Icon</th>
                                        <th>Manage Content</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($countries as $country)
                                            <tr>
                                                <td>
                                                    {{$country->country_name}}
                                                </td>
                                                <td>
                                                    {{ $country->display }}
                                                </td>
                                                <td>
                                                    <img src="{{ $country->icon }}" alt="" class="img-fluid"
                                                         style="width: 30px; height: 30px;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('manage.content.panel', ['country_id' => $country->id]) }}">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-book"></i>
                                                            Contents Panel
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
