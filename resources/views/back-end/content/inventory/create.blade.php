@extends ('layouts.admin_app')
@section ('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                <div class="card bg-secondary shadow">
                    <div class="card-body">

                        <div class="form-group text-left">
                            <a href="{{ route('inventories.index') }}">
                                <button type="button" class="btn btn-danger">
                                    <i class="fa fa-angle-left"></i>
                                    Back
                                </button>
                            </a>
                        </div>

                        <div class="form-group text-right">
                            <h2>Inventory Create</h2>
                        </div>

                        <form id="inventory-form" action="{{ route('inventories.store') }}" method="post"
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
                                <label for="">Year</label>
                                <input type="text" class="form-control" name="year" required>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" name="price" required>
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
                                        <label for="boat-detail-local">Boat Detail Local</label>
                                        <textarea name="boat_detail_local" id=""
                                                  class="tinymce"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="boat-detail-en">Boat Detail English</label>
                                        <textarea name="boat_detail_en" id=""
                                                  class="tinymce"></textarea>
                                    </div>
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

            $('#btn-submit-inventory').on('click', function () {
                if ($('#file-uploads').val() == '') {
                    swal('Please select your boat photos.', '', 'info');
                } else {
                    $('#inventory-form').submit();
                }
            });

        </script>
    @endpush
@endsection

