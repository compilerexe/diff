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
                            <form
                                action="{{ route('news.store') }}"
                                method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <h3>
                                        <a href="javascript:void(0)"
                                           onclick="window.location.href = '{{ url('/manage/content/panel') }}/' + localStorage.getItem('country_id');">
                                            Database
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        news
                                        <i class="fa fa-angle-right"></i>
                                        <span class="text-success">create</span>
                                    </h3>
                                </div>

                                <div class="form-group">
                                    <label for="input-cover">Cover Image</label>
                                    <input type="file" name="cover_image" class="form-control-file" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-boat-header-local">News Header Local</label>
                                    <input name="news_header_local"
                                           id="input-boat-header-local"
                                           class="form-control"
                                           value=""
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="input-boat-description-local">News Description Local</label>
                                    <textarea name="news_description_local"
                                              id="input-boat-description-local"
                                              class="form-control textarea"
                                              rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="input-boat-header-en">News Header English</label>
                                    <input name="news_header_en"
                                           id="input-boat-header-en"
                                           class="form-control"
                                           value=""
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="input-boat-description-en">News Description English</label>
                                    <textarea name="news_description_en"
                                              id="input-boat-description-en"
                                              class="form-control textarea"
                                              rows="10"></textarea>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">
                                        Create
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

