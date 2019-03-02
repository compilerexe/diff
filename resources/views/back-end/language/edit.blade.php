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
                                    / {{ $country->country_name }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Edit</h6>
                        <div class="pl-lg-4">
                            <form action="{{ route('language.update', ['language' => $country->id]) }}" method="post">
                                {{ method_field('PUT') }}
                                @if(\Session::has('language_update'))
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
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country-name">Country
                                                name</label>
                                            <input type="text"
                                                   id="input-country-name"
                                                   class="form-control form-control-alternative"
                                                   name="country_name"
                                                   placeholder="Country name"
                                                   value="{{ $country->country_name }}">
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
                                                   value="{{ $country->display }}">
                                        </div>
                                    </div>
                                    @if ($country->id !== 1)
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-short-name">Short
                                                    name</label>
                                                <input type="text"
                                                       id="input-short-name"
                                                       class="form-control form-control-alternative"
                                                       name="short_name"
                                                       placeholder="Short name"
                                                       value="{{ $country->short_name }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-icon">Icon</label>&ensp;
                                            <img src="{{ $country->icon }}" alt="" style="width: 30px; height: 30px;">
                                            <input type="text"
                                                   id="input-icon"
                                                   class="form-control form-control-alternative"
                                                   name="icon"
                                                   placeholder="Display"
                                                   value="{{ $country->icon }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="lang-switch">Switch Language</label>
                                            <br>
                                            <input type="radio" name="lang_switch"
                                                   value="1" {{ ($country->lang_switch == 1) ? 'checked' : '' }}> Local
                                            or English&ensp;
                                            <input type="radio" name="lang_switch" value="0"
                                                   {{ ($country->lang_switch == 0) ? 'checked' : '' }} id="lang-switch">
                                            English only
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-success">Save</button>
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
