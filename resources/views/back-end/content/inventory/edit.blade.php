@extends ('layouts.new_design.dealer.app')
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
                            <h2>Inventory Boat Model : {{ $inventory->boat->model }}</h2>
                        </div>

                        <form action="{{ route('dealer.inventory.update', ['id' => $inventory->id]) }}" method="post"
                              enctype="multipart/form-data">
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="boat-model">Boat Model</label>
                                <select name="boat_model" id="boat-model" class="form-control">
                                    @foreach ($boats as $boat)
                                        <option
                                            value="{{ $boat->id }}" {{ ($inventory->boat_id == $boat->id) ? 'selected' : '' }}>{{ $boat->model }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="text" class="form-control" name="year" value="{{ $inventory->year }}">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $inventory->price }}">
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-group">
                                        <label for="">Boat Photos</label>
                                        <br>

                                        <div class="form-group">
                                            <div class="row">
                                                @if ($inventory->boat_photos)
                                                    @php
                                                        $boat_photos = json_decode($inventory->boat_photos);

                                                        usort($boat_photos, function($a, $b) {
                                                            return $a->sort - $b->sort;
                                                        });
                                                    @endphp
                                                    @foreach ($boat_photos as $boat_photo)
                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-group">
                                                                <img
                                                                    src="{{ asset('app/'.$boat_photo->image) }}"
                                                                    alt="" class="img-fluid">
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <div class="row">
                                                                    <div class="col-3 col-sm-3">
                                                                        <div class="form-group"
                                                                             style="padding-top: 10px;">
                                                                            <span>Sort</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3 col-sm-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                   name="sort[]" placeholder="Sort"
                                                                                   value="{{ $boat_photo->sort }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 col-sm-6">
                                                                        <div class="form-group">
                                                                            <button type="button"
                                                                                    id="remove-boat-photo-{{ $boat_photo->sort }}"
                                                                                    class="btn btn-danger">
                                                                                <i class="fa fa-trash"></i>
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @push ('scripts')
                                                            <script>
                                                                $('#remove-boat-photo-{{ $boat_photo->sort }}').on('click', function () {
                                                                    swal("Confirm Delete?", "", {
                                                                        buttons: {
                                                                            cancel: "Cancel",
                                                                            catch: {
                                                                                text: "Delete",
                                                                                value: "catch",
                                                                            },
                                                                            // defeat: true,
                                                                        },
                                                                    })
                                                                        .then((value) => {
                                                                            switch (value) {

                                                                                case "catch":

                                                                                    let sort = '{{ $boat_photo->sort }}';
                                                                                    let id = '{{ $inventory->id }}';
                                                                                    let url = `/dealer/inventory/${id}/photo/${sort}`;

                                                                                    $.post('{{ url('') }}' + url, {
                                                                                        _method: 'DELETE'
                                                                                    }, function (data, status) {
                                                                                        console.log(data, status);
                                                                                    });
                                                                                    window.location.reload();
                                                                                    // swal("Delete Success", "", "success");
                                                                                    break;

                                                                                default:
                                                                                // swal("Got away safely!");
                                                                            }
                                                                        });
                                                                });
                                                            </script>
                                                        @endpush

                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
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
                                                  class="tinymce">{!! $inventory->boat_detail_local !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="boat-detail-en">Boat Detail English</label>
                                        <textarea name="boat_detail_en" id=""
                                                  class="tinymce">{!! $inventory->boat_detail_en !!}</textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success">
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

        </script>
    @endpush
@endsection

