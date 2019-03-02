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
                                        Database
                                        <i class="fa fa-angle-right"></i>
                                        <a href="{{ route('dealers.index') }}">
                                            <span class="text-primary">
                                                dealers
                                            </span>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            {{--<div class="form-group text-right">--}}
                            {{--<a href="{{ route('dealers.create') }}">--}}
                            {{--<button type="button" class="btn btn-success">--}}
                            {{--<i class="fa fa-plus"></i>--}}
                            {{--Create--}}
                            {{--</button>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>COUNTRY</th>
                                            <th>USERNAME</th>
                                            <th>EMAIL</th>
                                            <th>EDIT</th>
                                            <th>MANAGE</th>
                                            {{--<th>DELETE</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($dealers as $dealer)
                                            <tr>
                                                <td>{{ $dealer->id }}</td>
                                                <td>
                                                    <img src="{{ asset($dealer->country->icon) }}" alt="country logo"
                                                         style="width: 30px; height: 30px;">
                                                    <br>
                                                    {{ $dealer->country->country_name }}
                                                </td>
                                                <td>{{ $dealer->username }}</td>
                                                <td>{{ $dealer->email }}</td>
                                                <td>
                                                    <a href="{{ route('dealers.edit', ['dealers' => $dealer->id]) }}">
                                                        <button type="button" class="btn btn-info">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('manage.dealer.profile.get', ['dealer_id' => $dealer->id]) }}">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-user"></i>
                                                            Manage
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
    </div>
@endsection
