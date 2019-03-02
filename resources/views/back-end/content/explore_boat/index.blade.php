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
            </div>
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">
                                        <a href="{{ route('manage.content.panel', ['country_id' => $country_id]) }}"
                                           class="text-primary">
                                            Database
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        explore_boats
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TITLE</th>
                                            <th>EDIT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($explore_boats as $explore_boat)
                                            @php
                                                $lang_country = json_decode($explore_boat->lang_country);
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{ $explore_boat->id }}
                                                </td>
                                                <td>
                                                    {{ $lang_country->first_section_header }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('manage.content.explore_boat.edit', ['explore_boat' => $explore_boat->id]) }}">
                                                        <button type="button" class="btn btn-info">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group float-right">
                                {{ $explore_boats->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
