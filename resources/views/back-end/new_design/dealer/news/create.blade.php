@extends ('layouts.new_design.dealer.app')
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
                                action="{{ route('dealer.news.store') }}"
                                method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="input-cover">Cover Image
                                        <span class="text-danger">(Landscape orientation only)</span>
                                    </label>
                                    <input type="file" name="cover_image" id="cover-image" class="form-control-file"
                                           required>
                                </div>

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

                                @if (checkLangSwitch())
                                    <div class="form-group">
                                        <label for="input-news-header-local">News Header Local</label>
                                        <input name="news_header_local"
                                               id="input-news-header-local"
                                               class="form-control"
                                               value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-news-description-local">News Description Local</label>
                                        <textarea name="news_description_local"
                                                  id="input-news-description-local"
                                                  class="tinymce"></textarea>
                                    </div>
                                @endif

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

            let cover_image = $('#cover-image').get(0).files.length;
            let news_header_en = $('#input-news-header-en').val().length;
            let news_description_en = tinymce.get('input-news-description-en').getContent();
            @if (checkLangSwitch())
                let news_header_local = $('#input-news-header-local').val().length;
                let news_description_local = tinymce.get('input-news-description-local').getContent();
            @endif

            if (cover_image == 0) {
                swal('Please select your cover image.', '', 'info');
            } else {
                if (news_header_en == 0) {
                    $('#input-news-header-en').focus();
                } else {
                    if (news_description_en == '') {
                        tinymce.get('input-news-description-en').focus();
                        $("html, body").animate({scrollTop: $('#input-news-description-en').offset().top - $(window).height() + 800}, 1000);
                        return false;
                    }
                    @if (checkLangSwitch())
                        if (news_header_local > 0) {
                            $('#form-news').submit();
                        } else {
                            if (news_header_local == 0) {
                                $('#input-news-header-local').focus();
                            } else {
                                if (news_description_local == '') {
                                    tinymce.get('input-news-description-local').focus();
                                    $("html, body").animate({scrollTop: $('#input-news-description-local').offset().top + 1000}, 1000);
                                    return false;
                                } else {
                                    $('#form-news').submit();
                                }
                            }
                        }
                    @else
                        $('#form-news').submit();
                    @endif
                }
            }

        });
    </script>
@endpush

