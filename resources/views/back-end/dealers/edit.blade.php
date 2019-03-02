@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="form-group">
                            <form
                                action="{{ route('dealers.update', ['dealers' => $dealer->id]) }}"
                                method="post">
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <h3 class="mb-0">
                                        Database
                                        <i class="fa fa-angle-right"></i>
                                        <a href="{{ route('dealers.index') }}">
                                            <span class="text-primary">
                                                dealers
                                            </span>
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        {{ $dealer->country->country_name }} / {{ $dealer->id }}
                                    </h3>
                                </div>

                                @if ($errors->any())
                                    <div class="form-group">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="input-username">Username</label>
                                    <input type="text"
                                           class="form-control"
                                           name="username"
                                           id="input-username"
                                           value="{{ $dealer->username }}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="input-email">Email</label>
                                    <input type="text"
                                           class="form-control"
                                           name="email"
                                           id="input-email"
                                           value="{{ $dealer->email }}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="input-password">Change password</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password"
                                           id="input-password"
                                           value="">
                                </div>

                                <div class="form-group">
                                    <label for="input-password-confirm">Password confirm</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password_confirmation"
                                           id="input-password-confirm"
                                           value="">
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

