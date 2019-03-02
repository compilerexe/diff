@extends ('layouts.admin_app')
@section ('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="form-group text-right">
                            <h2>News Create</h2>
                        </div>
                        <div class="form-group">
                            <form
                                id="form-news"
                                action="{{ route('news-asia.store') }}"
                                method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="input-cover">Cover Image</label>
                                    <input type="file" name="cover_image" id="cover_image" class="form-control-file"
                                           required>
                                </div>
                                {{--<div class="form-group">--}}
                                {{--<label for="input-news-header-local">News Header Local</label>--}}
                                {{--<input name="news_header_local"--}}
                                {{--id="input-news-header-local"--}}
                                {{--class="form-control"--}}
                                {{--value="" required>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                {{--<label for="input-news-description-local">News Description Local</label>--}}
                                {{--<textarea name="news_description_local"--}}
                                {{--id="input-news-description-local"--}}
                                {{--class="tinymce"></textarea>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <label for="input-news-header-en">News Header English</label>
                                    <input name="news_header_en"
                                           id="input-news-header-en"
                                           class="form-control"
                                           value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-news-description-en">News Description English</label>
                                    <textarea name="news_description_en"
                                              id="input-news-description-en"
                                              class="tinymce"></textarea>
                                </div>

                                <div class="form-group text-right">
                                    <button type="button" id="btn-submit" class="btn btn-success">
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

@push ('scripts')
    <script>
        $('#btn-submit').on('click', function () {
            let cover_image = $('#cover_image').get(0).files.length;
            let news_header_en = $('#input-news-header-en').val().length;
            let news_description_en = tinymce.get('input-news-description-en').getContent();

            if (cover_image == 0) {
                $('#cover_image').focus();
            } else {
                if (news_header_en == 0) {
                    $('#input-news-header-en').focus();
                } else {
                    if (news_description_en == '') {
                        tinymce.get('input-news-description-en').focus();
                        $("html, body").animate({scrollTop: $('#input-news-description-en').offset().top - $(window).height() + 800}, 1000);
                        return false;
                    } else {
                        $('#form-news').submit();
                    }
                }
            }
        });
    </script>
@endpush

