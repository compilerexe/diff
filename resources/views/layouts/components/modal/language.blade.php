<!-- 1b, 1c start -->
<div class="modal fade" tabindex="-1" id="country-modal" role="dialog" aria-labelledby="country-modal"
     aria-hidden="true" style="margin-top: 95px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content country-list-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="white-color" aria-hidden="true">&times;</span>
                </button>
                <div class="country-list clear-float">
                    @foreach (\App\Models\Countries::all() as $country)
                        @php
                            $country_name = str_replace(' ', '-', $country->country_name);
                        @endphp
                        <a href="{{ url('/'.$country_name) }}">
                            <img src="{{ $country->icon }}" alt="image">
                            <div>{{ $country->display }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 1b, 1c end -->
