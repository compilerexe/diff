@php
    $about_axis = \App\Models\AboutAxis::where('country_id', $country->id)->first();
@endphp

<form action="{{ route('manage.content.about_axis', ['country_id' => $country->id]) }}" method="post">
    <div class="form-group">
        <label for="input-first-section-header">First Section Header</label>
        <input type="text"
               class="form-control"
               name="first_section_header"
               value="{{ $about_axis->first_section_header }}">
    </div>
    <div class="form-group">
        <label for="input-second-section-header">Second Section Header</label>
        <input type="text"
               class="form-control"
               name="second_section_header"
               value="{{ $about_axis->second_section_header }}">
    </div>
    <div class="form-group">
        <label for="input-second-section-description">Second Section Description</label>
        <textarea name="second_section_description"
                  id="input-second-section-description"
                  class="form-control"
                  rows="8">{{ $about_axis->second_section_description }}</textarea>
    </div>
    <div class="form-group">
        <label for="input-third-section-description">Third Section Description</label>
        {{--<pre id="about-malibu-json-display"></pre>--}}
        {{--<input type="hidden" name="third_section_description" id="about-malibu-json-input">--}}
        <textarea name="third_section_description"
                  id="input-third-section-description"
                  class="form-control"
                  rows="20">{!! $about_axis->third_section_description !!}</textarea>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i>
            Save
        </button>
    </div>
</form>

{{--@push ('scripts')--}}
{{--<script>--}}
{{--$.get('{{ route('json.about_axis') }}', {--}}
{{--country_id: '{{ $country->id }}'--}}
{{--}--}}
{{--).done(function (data) {--}}
{{--// initialize--}}
{{--var editor = new JsonEditor('#about-malibu-json-display', getJson(data));--}}
{{--editor.load(getJson(data));--}}
{{--});--}}

{{--setInterval(function () {--}}
{{--$('#about-malibu-json-input').val(convertJson($('#about-malibu-json-display').text()));--}}
{{--}, 1000);--}}
{{--</script>--}}
{{--@endpush--}}
