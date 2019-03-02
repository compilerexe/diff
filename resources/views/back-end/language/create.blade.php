@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">
                                    <a href="{{ route('language.index') }}">
                                        Language
                                    </a>
                                    / Create
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="pl-lg-4">
                            <form action="{{ route('language.store') }}" method="post">

                                @if (count($errors->all()))
                                    <div class="form-group">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">

                                    <div class="col-lg-12">
                                        <h6 class="heading-small text-muted mb-4">Create Language</h6>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country-name">Country
                                                name</label>
                                            <input type="text"
                                                   id="input-country-name"
                                                   class="form-control form-control-alternative"
                                                   name="country_name"
                                                   placeholder="Country name"
                                                   value="{{ old('country_name') }}"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-display">Display</label>
                                            <input type="text"
                                                   id="input-display"
                                                   class="form-control form-control-alternative"
                                                   name="display"
                                                   placeholder="Display"
                                                   value="{{ old('display') }}"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-short-name">Short name example
                                                EN, JP, HK</label>
                                            <input type="text"
                                                   id="input-short-name"
                                                   class="form-control form-control-alternative"
                                                   name="short_name"
                                                   placeholder="Short name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-icon">Icon</label>&ensp;
                                            <input type="text"
                                                   id="input-icon"
                                                   class="form-control form-control-alternative"
                                                   name="icon"
                                                   placeholder="Display"
                                                   value="{{ old('icon') }}"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="lang-switch">Switch Language</label>
                                            <br>
                                            <input type="radio" name="lang_switch" value="1" checked> Local or English&ensp;
                                            <input type="radio" name="lang_switch" value="0" id="lang-switch"> English
                                            only
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <hr>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="heading-small text-muted mb-4">Dealer Account</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="username">Username</label>&ensp;
                                            <input type="text"
                                                   id="username"
                                                   class="form-control form-control-alternative"
                                                   name="username"
                                                   placeholder="Username"
                                                   minlength="4"
                                                   value="{{ old('username') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="email">Email</label>&ensp;
                                            <input type="email"
                                                   id="email"
                                                   class="form-control form-control-alternative"
                                                   name="email"
                                                   placeholder="Email"
                                                   value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="password">Password</label>&ensp;
                                            <input type="password"
                                                   id="password"
                                                   class="form-control form-control-alternative"
                                                   name="password"
                                                   placeholder="Password"
                                                   minlength="6"
                                                   value="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="password-confirmation">Confirm
                                                Password</label>&ensp;
                                            <input type="password"
                                                   id="password-confirmation"
                                                   class="form-control form-control-alternative"
                                                   name="password_confirmation"
                                                   placeholder="Confirm Password"
                                                   minlength="6"
                                                   value="" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-success">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
