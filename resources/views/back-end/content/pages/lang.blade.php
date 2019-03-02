@php
    $langs = \App\Models\Langs::where('country_id', $country->id)->get();
@endphp

@foreach ($langs as $lang)
    <form action="{{ route('manage.content.lang', ['country_id' => $country->id, 'tag' => $lang->tag]) }}" method="post">
        <div class="form-group">
            <h3>
                <a href="javascript:void(0)" id="display-lang-{{ $lang->id }}">
                    {{ $lang->tag }}
                    <i id="icon-down" class="fa fa-angle-down"></i>
                    <i id="icon-up" class="fa fa-angle-up" style="display: none;"></i>
                </a>
            </h3>
        </div>
        <div id="lang-{{ $lang->id }}" style="display: none;">
            <div class="form-group">
                <label for="input-data">Data</label>
                <textarea name="data"
                          id="input-data"
                          class="form-control"
                          rows="20">{{ $lang->data }}</textarea>
            </div>
        </div>

        @push ('scripts')
            <script>
                $('#display-lang-{{ $lang->id }}').on('click', function () {
                    $('#lang-{{ $lang->id }}').fadeToggle('fast', function () {
                        $('#icon-down').toggle();
                        $('#icon-up').toggle();
                        $('#btn-lang-save-{{ $lang->id }}').toggle();
                    });
                });
            </script>
        @endpush
        <div class="form-group text-right" id="btn-lang-save-{{ $lang->id }}" style="display: none;">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i>
                Save
            </button>
        </div>
    </form>
@endforeach

