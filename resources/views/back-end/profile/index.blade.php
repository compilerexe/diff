@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <form action="{{ route('profile.update', ['profile' => permission_allow()->id]) }}"
                                  method="post">
                                {{ method_field('PUT') }}
                                <input type="hidden" name="id" value="{{ permission_allow()->id }}">
                                @if(\Session::has('user_information'))
                                    <div class="form-group">
                                        <div class="alert alert-success" role="alert">
                                            <strong>{{ txt_success() }}</strong>
                                        </div>
                                    </div>
                                    @push ('scripts')
                                        <script>
                                            timeOutAlert('.alert');
                                        </script>
                                    @endpush
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="text"
                                                   id="input-username"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Username"
                                                   value="{{ permission_allow()->username }}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email"
                                                   id="input-email"
                                                   class="form-control form-control-alternative"
                                                   name="email"
                                                   placeholder="jesse@example.com"
                                                   value="{{ permission_allow()->email }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="my-4"/>
                        <h6 class="heading-small text-muted mb-4">Change Password</h6>
                        <div class="pl-lg-4">
                            <form action="{{ route('admin.password.update', ['id' => permission_allow()->id]) }}"
                                  method="post">
                                <input type="hidden" name="id" value="{{ permission_allow()->id }}">
                                @if(\Session::has('password_update'))
                                    <div class="form-group">
                                        <div class="alert alert-success" role="alert">
                                            <strong>{{ txt_success() }}</strong>
                                        </div>
                                    </div>
                                    @push ('scripts')
                                        <script>
                                            timeOutAlert('.alert');
                                        </script>
                                    @endpush
                                @endif

                                @if (session()->has('password_status'))
                                    @if (session('password_status') === 'not match')
                                        <div class="form-group">
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Please check password again.</strong>
                                            </div>
                                        </div>
                                        @push ('scripts')
                                            <script>
                                                timeOutAlert('.alert');
                                            </script>
                                        @endpush
                                    @endif
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-password">New Password</label>
                                            <input type="password"
                                                   id="input-password"
                                                   class="form-control form-control-alternative"
                                                   name="password"
                                                   minlength="6"
                                                   placeholder=""
                                                   value=""
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-confirm-password">Confirm
                                                Password</label>
                                            <input type="password"
                                                   id="input-confirm-password"
                                                   class="form-control form-control-alternative"
                                                   name="password_confirmation"
                                                   minlength="6"
                                                   placeholder=""
                                                   value=""
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
