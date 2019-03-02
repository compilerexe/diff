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
                                action="{{ route('news.update', ['news' => $news->id]) }}"
                                method="post" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <h3>
                                        <a href="javascript:void(0)"
                                           onclick="window.location.href = '{{ url('/manage/content/panel') }}/' + localStorage.getItem('country_id');">
                                            Database
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        <a href="{{ route('news.index', ['country_id' => session('country_id')]) }}">
                                            news
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        {{ $news->news_header_local }}
                                    </h3>
                                </div>

                                <div class="form-group">
                                    <label for="cover-image">Cover Image</label>
                                    <div style="background-image: url({{ asset('app/'.$news->cover_image) }})"
                                         class="div-preview-img"></div>
                                    <input type="file" name="cover_image" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label for="input-news-header-local">News Header Local</label>
                                    <input name="news_header_local"
                                           id="input-news-header-local"
                                           class="form-control"
                                           value="{{ $news->news_header_local }}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="input-news-description-local">News Description Local</label>
                                    <textarea name="news_description_local"
                                              id="input-news-description-local"
                                              class="form-control textarea"
                                              rows="10">{!! $news->news_description_local !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="input-news-header-en">News Header English</label>
                                    <input name="news_header_en"
                                           id="input-news-header-en"
                                           class="form-control"
                                           value="{{ $news->news_header_en }}"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="input-news-description-en">News Description English</label>
                                    <textarea name="news_description_en"
                                              id="input-news-description-en"
                                              class="form-control textarea"
                                              rows="10">{!! $news->news_description_en !!}</textarea>
                                </div>

                                <div class="form-group text-right" id="btn-explore-boat-save-{{ $news->id }}">
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

