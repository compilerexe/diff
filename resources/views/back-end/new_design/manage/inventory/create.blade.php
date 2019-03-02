@extends ('layouts.new_design.manage.app')
@section ('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="form-group text-right">
                            <h2>Inventory Create</h2>
                        </div>

                        <form id="inventory-form" action="{{ route('manage.dealer.inventory.store') }}"
                              method="post"
                              enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="boat-model">Boat Model</label>
                                <select name="boat_model" id="boat-model" class="form-control">
                                    @foreach ($boats as $boat)
                                        <option value="{{ $boat->id }}">{{ $boat->model }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="used">Boat Type</label>
                                <select name="used" id="used" class="form-control">
                                    <option value="0">New</option>
                                    <option value="1">Used</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" class="form-control" name="year" id="year" placeholder=""
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price (Please put your currency behind the price)</label>
                                <input type="text" class="form-control" name="price" id="price" value="CONTACT DEALER"
                                       placeholder="CONTACT DEALER"
                                       required>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-group">
                                        <label for="">Boat Photos</label>
                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-primary" id="file-add"><i
                                                    class="fa fa-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="file-uploads"
                                               name="file_uploads[]" multiple style="display: none;">
                                    </div>
                                    <div class="row" id="preview-files"></div>

                                    <div class="form-group">
                                        <label for="boat-detail-en">Boat Detail English</label>
                                        <textarea name="boat_detail_en" id="boat-detail-en"
                                                  class="tinymce"></textarea>
                                    </div>

                                    @if (checkLangSwitch())
                                        <div class="form-group">
                                            <label for="boat-detail-local">Boat Detail Local</label>
                                            <textarea name="boat_detail_local" id="boat-detail-local"
                                                      class="tinymce"></textarea>
                                        </div>
                                    @endif

                                    <div class="form-group text-right">
                                        <button type="button" id="btn-submit-inventory" class="btn btn-success">
                                            <i class="fa fa-save"></i>
                                            Save
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @push ('scripts')
        <script>

            let fileLists = [];

            $('#file-add').on('click', function () {
                $('#file-uploads').click();
            });

            function refreshPreview() {
                $('#preview-files').html(null);
                fileLists.forEach((item, index) => {
                    let img = `<div class="col-12 col-sm-4">
<div class="form-group" style="background-image: url(${window.URL.createObjectURL(item)}); width: 100%; height: 150px; background-repeat: no-repeat; background-position: center center; background-size: contain;">
</div>
<div class="form-group">
<button type="button" class="btn btn-danger" id="btn-file-remove-${index}" style="width: 100%;">Remove</button>
</div>
</div>`;
                    $('#preview-files').append(img);

                    $(`#btn-file-remove-${index}`).on('click', function () {
                        fileLists.splice(index, 1);
                        refreshPreview();
                    });
                })
            }

            $('#file-uploads').on('change', function () {
                console.log(fileLists);
                for (let i = 0; i < this.files.length; i++) {
                    fileLists.push(this.files[i]);
                }
                refreshPreview();
            });

            // --- Access FileList
            // Used for creating a new FileList in a round-about way
            function FileListItem(a) {
                a = [].slice.call(Array.isArray(a) ? a : arguments)
                for (var c, b = c = a.length, d = !0; b-- && d;) d = a[b] instanceof File
                if (!d) throw new TypeError("expected argument to FileList is File or array of File objects")
                for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(a[c])
                return b.files
            }

            // --- End Access FileList

            $('#btn-submit-inventory').on('click', function () {
                if ($('#file-uploads').val() == '') {
                    swal('Please select your boat photos.', '', 'info');
                } else {
                    $('#file-uploads')[0].files = new FileListItem(fileLists);

                    if ($('#year').val() == '') {
                        $('#year').focus();
                    } else {

                        let boat_detail_en = tinymce.get('boat-detail-en').getContent();
                        @if (checkLangSwitch())
                            let boat_detail_local = tinymce.get('boat-detail-local').getContent();
                        @endif

                        if (boat_detail_en == '') {
                            tinymce.get('boat-detail-en').focus();
                            $("html, body").animate({scrollTop: $('#boat-detail-en').offset().top - $(window).height() + 1500}, 1000);
                            return false;
                        }

                        @if (checkLangSwitch())
                            if (boat_detail_local > 0) {
                                $('#inventory-form').submit();
                            } else {

                                if (boat_detail_local == '') {
                                    tinymce.get('boat-detail-local').focus();
                                    $("html, body").animate({scrollTop: $('#boat-detail-local').offset().top + 1500}, 1000);
                                    return false;
                                } else {
                                    $('#inventory-form').submit();
                                }

                            }
                        @else
                            $('#inventory-form').submit();
                        @endif

                    }

                }
            });

        </script>
    @endpush
@endsection

