@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="form-group">
                            <form
                                action="{{ route('boats.store') }}"
                                method="post">
                                <div class="form-group">
                                    <h3 class="mb-0">
                                        Database
                                        <i class="fa fa-angle-right"></i>
                                        <a href="{{ route('boats.index') }}">
                                            <span class="text-primary">
                                                boats
                                            </span>
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        create
                                    </h3>
                                </div>

                                <div class="form-group">
                                    <label for="input-country">Create for country</label>
                                    <select name="country" id="input-country" class="form-control">
                                        <option value="0">all</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="input-model">Model</label>
                                    <input type="text"
                                           class="form-control"
                                           name="model"
                                           id="input-model"
                                           value=""
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="input-tag">Tag</label>
                                    <select name="tag" id="input-tag" class="form-control">
                                        <option value="Response">Response</option>
                                        <option value="Wakesetter">Wakesetter</option>
                                        <option value="M235">M235</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="input-boat-front-image">Url boat image</label>
                                    <input type="text"
                                           class="form-control"
                                           name="boat_front_image"
                                           id="input-boat-front-image"
                                           value=""
                                           required>
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

