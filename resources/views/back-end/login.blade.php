<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Administrator</title>
    <!-- Favicon -->
    <link href="{{ asset('admin_template/assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('admin_template/assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_template/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('admin_template/assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="main-content">

    <!-- Page content -->
    <div class="container" style="padding-top: 20vh;">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">

                        <form role="form" action="{{ route('post.login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <h3>Administrator / {{ env('APP_NAME') }}</h3>
                            </div>

                            @if(\Session::has('errors'))
                                <div class="form-group">
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ found_errors() }}</strong> {{ $errors }}
                                    </div>
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Username" type="text" name="username"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" name="password"
                                           required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Login</button>
                            </div>
                            <div class="form-group">
                                <p class="text-danger">
                                    If you have problem loggin in, please email to malibuboatsasia@malibuboats.com
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('admin_template/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin_template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('admin_template/assets/js/argon.js?v=1.0.0') }}"></script>
</body>

</html>
