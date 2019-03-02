@extends ('layouts.new_design.manage.app')
@section ('content')

    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0 text-center">
                        <h1>Dealer Profile</h1>
                        <h2>
                            Country : {{ $dealer->display }}
                            &ensp;
                            <img src="{{ $dealer->country->icon }}" alt="" style="width: 32px; height: 32px;">
                        </h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('manage.dealer.profile.post') }}" method="post"
                              enctype="multipart/form-data">
                            <div class="form-group text-right">
                                <h2 class="text-success">Dealer’s details</h2>
                            </div>
                            <div class="form-group">
                                <label for="">Dealer Name (Eng)</label>
                                <input type="text" name="name_en" value="{{ $dealer->profile->name_en }}"
                                       class="form-control" required>
                            </div>
                            @if (checkLangSwitch())
                                <div class="form-group">
                                    <label for="">Dealer Name (Local)</label>
                                    <input type="text" name="name_local" value="{{ $dealer->profile->name_local }}"
                                           class="form-control" required>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Address (Eng)</label>
                                <input type="text" name="address_en" value="{{ $dealer->profile->address_en }}"
                                       class="form-control" required>
                            </div>
                            @if (checkLangSwitch())
                                <div class="form-group">
                                    <label for="">Address (Local)</label>
                                    <input type="text" name="address_local"
                                           value="{{ $dealer->profile->address_local }}"
                                           class="form-control" required>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Telephone</label>
                                <input type="text" name="telephone" value="{{ $dealer->profile->telephone }}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ $dealer->profile->email }}"
                                       class="form-control">
                            </div>
                            <hr>

                            <div class="form-group text-right">
                                <h2 class="text-success">About Dealer</h2>
                            </div>
                            <div class="form-group">
                                <label for="">About Dealer, short Description (Eng)</label>
                                <input type="text" name="short_description_en"
                                       value="{{ $dealer->profile->short_description_en }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">About Dealer, long Description (Eng)</label>
                                <textarea name="long_description_en" class="form-control"
                                          rows="8">{{ $dealer->profile->long_description_en }}</textarea>
                            </div>

                            @if (checkLangSwitch())
                                <div class="form-group">
                                    <label for="">About Dealer, short Description (Local)</label>
                                    <input type="text" name="short_description_local"
                                           value="{{ $dealer->profile->short_description_local }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">About Dealer, long Description (Local)</label>
                                    <textarea name="long_description_local" class="form-control"
                                              rows="8">{{ $dealer->profile->long_description_local }}</textarea>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Dealer photo</label>
                                <div
                                    style="background-image: url({{ asset('app/'.$dealer->profile->dealer_photo) }}); width: 250px; height: 250px; background-size: contain; background-repeat: no-repeat;"></div>
                                <input type="file" name="dealer_photo" class="form-control-file">
                            </div>
                            <hr>

                            <div class="form-group text-right">
                                <h2 class="text-success">Dealer’s external pages link</h2>
                            </div>
                            <div class="form-group">
                                <label for="">Facebook Link</label>
                                <input type="text" name="facebook_link" value="{{ $dealer->profile->facebook_link }}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Instagram Link</label>
                                <input type="text" name="instagram_link" value="{{ $dealer->profile->instagram_link }}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Website Link</label>
                                <input type="text" name="website_link" value="{{ $dealer->profile->website_link }}"
                                       class="form-control">
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>

                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
