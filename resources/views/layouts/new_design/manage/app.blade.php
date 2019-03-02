<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <!-- Plugins -->
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->

    <style>
        @media (max-width: 756px) {
            .init-content {
                padding-top: 20px;
            }
        }

        @media (min-width: 756px) {
            .init-content {
                padding-top: 30px;
            }
        }

        button {
            min-width: 100px;
        }

        th, td {
            text-align: center;
            vertical-align: middle !important;
        }

        .div-preview-img {
            -webkit-background-size: contain;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
            width: 250px;
            height: 250px;
        }
    </style>
</head>

<body class="bg-dark">
@include('layouts.new_design.manage.navbar')
<div class="main-content">
    {{--@include('layouts.new_design.dealer.top_navbar')--}}
    @yield('content')
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('admin_template/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin_template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('admin_template/assets/js/argon.js?v=1.0.0') }}"></script>

<!-- Plugins -->
<script src="{{ asset('plugins/sweetalert.min.js') }}"></script>
{{--<script src="{{ asset('plugins/jquery.json-editor.min.js') }}"></script>--}}
<script
    src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=uqu1f8au5oo6t0z3qoxx9ywkex4rif0eu5vrh5e4i44re3nx"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('form').append('{{ csrf_field() }}');

    tinymce.init({
        selector: '.tinymce',
        height: 500
        ,
        menubar: false,
        plugins: [
            'image code advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime table contextmenu paste code help wordcount media'
        ],
        toolbar: 'insert | undo redo | image | media | formatselect | bold italic backcolor link  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'],
        paste_data_images: true,
        image_class_list: [
            {title: 'img-fluid', value: 'img-fluid'},
        ],

        // without images_upload_url set, Upload tab won't show up
        images_upload_url: "{{ url('tinymce/news/upload') }}",

        // we override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) {

            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', "{{ url('tinymce/news/upload') }}");
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function () {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);

            // setTimeout(function() {
            // no matter what you upload, we will turn it into TinyMCE logo :)
            //success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
            // }, 2000);
        },

        init_instance_callback: function (ed) {
            //ed.execCommand('mceImage');
        }
    });

    @if (session('insert_status'))
    swal('Insert Success', '', 'success');
    @endif

    @if (session('update_status'))
    swal('Update Success', '', 'success');
    @endif
</script>
@stack('scripts')
</body>

</html>

