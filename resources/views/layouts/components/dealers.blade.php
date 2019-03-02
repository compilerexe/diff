<div class="row">

    @foreach ($dealer_profile as $profile)
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <h2 class="font-ds" style="text-transform: capitalize; letter-spacing: 2px;">
                    {{ $profile->dealer->country->country_name }}
                </h2>
                <br>
                <p class="font-ag">
                    {!! $profile->fullAddressEnglish() !!}
                </p>
            </div>
        </div>
    @endforeach

</div>
