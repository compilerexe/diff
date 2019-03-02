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

                <div class="card bg-secondary shadow">
                    <div class="card-body">

                        <div class="form-group">
                            <a href="https://jsoneditoronline.org/" target="_blank">
                                <h3 class="text-success">
                                    <i class="fa fa-database"></i>
                                    Editor Tools : https://jsoneditoronline.org/
                                </h3>
                            </a>
                        </div>

                        <div class="form-group">
                            <form
                                action="{{ route('manage.content.explore_boat.update', ['explore_boat' => $explore_boat->id]) }}"
                                method="post">
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <h3>
                                        <a href="javascript:void(0)"
                                           onclick="window.location.href = '{{ url('/manage/content/panel') }}/' + localStorage.getItem('country_id');">
                                            Database
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        explore_boat
                                        <i class="fa fa-angle-right"></i>
                                        {{ $explore_boat->boat->model }}
                                    </h3>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="input-lang-country">Lang Country</label>
                                        <textarea name="lang_country"
                                                  id="input-lang-country"
                                                  class="form-control"
                                                  rows="20">{{ $explore_boat->lang_country }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-lang-en">Lang English</label>
                                        <textarea name="lang_en"
                                                  id="input-lang-en"
                                                  class="form-control"
                                                  rows="20">{{ $explore_boat->lang_en }}</textarea>
                                    </div>
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

