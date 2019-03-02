<section class="site-section bg-orangered">
    <div class="container" style="//padding: 0 0 40px 0;">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">

                <div class="text-center">
                    <h2 class="title-header text-white font-fz-b">{{ lang_contact_us()->contact_us }}</h2>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-8 ml-auto mr-auto">
                        <form action="{{ route('mail.send.contact-us') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="font-fz-b text-white">{{ lang_contact_us()->name }}</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="{{ lang_contact_us()->name }}"
                                       style="width: 100%;" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-fz-b text-white">{{ lang_contact_us()->email }}</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="{{ lang_contact_us()->email }}"
                                       style="width: 100%;" required>
                            </div>

                            <div class="form-group">
                                <label for="phone-number"
                                       class="font-fz-b text-white">{{ lang_contact_us()->phone_number }}</label>
                                <input type="text" name="phone_number" id="phone-number" class="form-control"
                                       placeholder="{{ lang_contact_us()->phone_number }}" style="width: 100%;"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="country"
                                       class="font-fz-b text-white">{{ lang_contact_us()->country }}</label>
                                <input type="text" name="country" id="country" class="form-control"
                                       placeholder="{{ lang_contact_us()->country }}"
                                       style="width: 100%;" required>
                            </div>

                            <div class="form-group">
                                <label for="reason_for_contact"
                                       class="font-fz-b text-white">{{ lang_contact_us()->reason_for_contact }}</label>
                                <textarea name="reason_for_contact" id="reason-for-contact" class="form-control"
                                          placeholder="{{ lang_contact_us()->reason_for_contact }}"
                                          rows="5" style="width: 100%;" required></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-axis border-white"
                                        style="background: transparent; padding-top: 15px !important;">
                                    {{ lang_button()->submit }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
