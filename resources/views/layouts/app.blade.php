<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/ico" href="{{ asset('images/logo-axis.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dev Axis Wake {{ ucfirst(config('country')->country_name) }}</title>

    <!-- START SEO -->
    <meta name="author" content="Axis Wake Asia">
    <meta name="description"
          content="Axis Wake Research Boats: World's Fastest Growing Wakesurfing & Wakeboarding Towboat Brand, Value-Priced Performance.">
    <meta name="keywords"
          content="malibu, axis, boat, malibuboats, axiswake, malibuboatsasia, axiswakeasia, wakesurfing, wakeboarding, asia, middle east">

    <meta name="og:title" content="Axis Wake Asia"/>
    <meta name="og:type" content="website"/>
    <meta name="og:url" content="https://www.axiswakeasia.com"/>
    <meta name="og:image" content="https://www.axiswakeasia.com/images/logo-axis.png"/>
    <meta name="og:site_name" content="Axis Wake Asia"/>
    <meta name="og:description" content="Axis Wake Research Boats: World's Fastest Growing Wakesurfing & Wakeboarding Towboat Brand, Value-Priced Performance."/>
    <!-- END SEO -->

    <!-- FAVICON FILES -->
    {{--<link href="{{ asset('template/ico/apple-touch-icon-144-precomposed.png')}}" rel="apple-touch-icon" sizes="144x144">--}}
    {{--<link href="{{ asset('template/ico/apple-touch-icon-114-precomposed.png')}}" rel="apple-touch-icon" sizes="114x114">--}}
    {{--<link href="{{ asset('template/ico/apple-touch-icon-72-precomposed.png')}}" rel="apple-touch-icon" sizes="72x72">--}}
    {{--<link href="{{ asset('template/ico/apple-touch-icon-57-precomposed.png')}}" rel="apple-touch-icon">--}}
    {{--<link href="{{ asset('images/favicon.png')}}" rel="shortcut icon">--}}

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/boleiro.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/custom.css?v=1.1.6') }}">

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "url": "https://www.axiswakeasia.com",
          "name": "AxisWakeAsia",
          "description": "Axis Wake Research Boats: World's Fastest Growing Wakesurfing & Wakeboarding Towboat Brand, Value-Priced Performance.",
          "image": [
            "https://www.axiswakeasia.com/images/logo-axis.png",
           ]
        }
    </script>

    <!-- Fast Loading -->
    <noscript>
        <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker.min.css') }}">
    </noscript>

    <script>
        var giftofspeed = document.createElement('link');
        giftofspeed.rel = 'stylesheet';
        giftofspeed.href = "{{ asset('template/css/main.css')}}";
        var godefer = document.getElementsByTagName('link')[0];
        godefer.parentNode.insertBefore(giftofspeed, godefer);

        var giftofspeed3 = document.createElement('link');
        giftofspeed3.rel = 'stylesheet';
        giftofspeed3.href = "{{ asset('plugins/bootstrap-datepicker.min.css') }}";
        var godefer3 = document.getElementsByTagName('link')[0];
        godefer3.parentNode.insertBefore(giftofspeed3, godefer3);
    </script>
    <!-- End Fast Loading -->
    @stack ('css')
</head>
<body>

@php
    clientSessionCountryId();
@endphp

<div class="page-loading">
    <div class="logo-loading">
        <img src="{{ asset('images/axis-logo.png') }}" class="logo-file" alt="logo">
        <div class="text-center">
            <h4 style="font-family: AtlasTypewriter-Bold, sans-serif;">
                <br>
                <span class="text-white">Loading</span>
                <span class="text-loading" data-text=".....">.....</span>
            </h4>
        </div>
    </div>
</div>
<div class="page-completed" style="display: none;">
    @include ('layouts.components.side-menu')

    <main>

        @include ('layouts.components.header')

        <script>
            let isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            if (isMobile) {
                let width = screen.width;
                if (width > 768) {
                    document.getElementById('navbar-mobile').style.display = 'none';
                    document.getElementById('navbar-desktop').style.display = 'block';
                } else {
                    document.getElementById('navbar-desktop').style.display = 'none';
                    document.getElementById('navbar-mobile').style.display = 'block';
                }
            } else {
                let clientWidth = document.body.clientWidth;
                if (clientWidth <= 1000) {
                    document.getElementById('navbar-mobile').style.display = 'block';
                    document.getElementById('navbar-desktop').style.display = 'none';
                } else {
                    document.getElementById('navbar-mobile').style.display = 'none';
                    document.getElementById('navbar-desktop').style.display = 'block';
                }
            }
        </script>

        @yield ('content')

        @if (config('country')->country_name == 'asia')
            @include ('layouts.components.contact_us')
        @else
            @if (\Request::route()->getName() != "contact-dealer")
                @include ('layouts.components.contact_dealer')
            @endif
        @endif

    </main>
<!-- end main -->
</div>
@include ('layouts.components.modal.language')
@include ('layouts.components.footer')
<a href="#" class="scrollup"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>

<!-- JS FILES -->
<script src="{{ asset('template/js/jquery.min.js') }}"></script>
{{--<script src="{{ asset('template/js/main.js') }}"></script>--}}

<script src="{{ asset('template/js/popper.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/js/prettify.min.js') }}"></script>
{{--<script src="{{ asset('template/js/fancybox.min.js') }}"></script>--}}
{{--<script src="{{ asset('template/js/flipclock.min.js') }}"></script>--}}
<script src="{{ asset('template/js/swiper.min.js') }}"></script>
<script src="{{ asset('template/js/isotope.min.js') }}"></script>
{{--<script src="{{ asset('template/js/particles.min.js') }}"></script>--}}
<script src="{{ asset('template/js/jquery.stellar.min.js') }}"></script>
{{--<script src="{{ asset('template/js/instagram.min.js') }}" async></script>--}}
{{--<script src="{{ asset('template/js/odometer.min.js') }}"></script>--}}
{{--<script src="{{ asset('template/js/jquery.validate.min.js') }}" async></script>--}}
{{--<script src="{{ asset('template/js/contact.form.min.js') }}"></script>--}}
{{--<script src="{{ asset('template/js/jquery.form.min.js') }}"></script>--}}
<script src="{{ asset('template/js/wow.min.js') }}"></script>
{{--<script src="{{ asset('template/js/TweenMax.min.js') }}" async></script>--}}
{{--<script src="{{ asset('template/js/easypiechart.min.js') }}"></script>--}}
{{--<script src="{{ asset('template/js/perspective.min.js') }}" async></script>--}}
<script src="{{ asset('template/js/scripts.js') }}"></script>


<!-- REVOLUTION JS FILES -->
<script src="{{ asset('template/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('template/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('template/revolution/addons/slicey/js/revolution.addon.slicey.min.js?ver=1.0.0') }}"></script>
<script src="{{ asset('template/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
{{--<script src="{{ asset('template/revolution/js/extensions/revolution.extension.carousel.min.js') }}" async></script>--}}
<script src="{{ asset('template/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('template/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('template/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('template/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('template/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
{{--<script src="{{ asset('template/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>--}}
{{--<script src="{{ asset('template/revolution/js/extensions/revolution.extension.video.min.js') }}" async></script>--}}

<script src="{{ asset('plugins/player-vimeo.js') }}" async></script>
<script src="{{ asset('plugins/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('template/js/lab-section.js') }}"></script>

@stack ('scripts')

<script>
    @if (session()->has('send_mail_contact_us'))
    swal('Thank you for contacting Axis Wake Asia. We will get in touch with you shortly.', '', 'success');
    @endif

    @if (session('send_mail_contact_dealer') == 'free-test-drive')
    swal('Thank you for contacting Axis Wake {{ ucfirst(country_name()) }}. We will get in touch with you shortly.', '', 'success');
    @endif

    @if (session('send_mail_contact_dealer') == 'request-catalog')
    swal('Thank you for contacting Axis Wake {{ ucfirst(country_name()) }}. We will get in touch with you shortly.', '', 'success');
    @endif

    @if (session('send_mail_contact_dealer') == 'general')
    swal('Thank you for contacting Axis Wake {{ ucfirst(country_name()) }}. We will get in touch with you shortly.', '', 'success');
    @endif

    @if (session('send_mail_contact_dealer') == 'inventory')
    swal('Thank you for contacting Axis Wake {{ ucfirst(country_name()) }}. We will get in touch with you shortly.', '', 'success');
    @endif

    $(document).ready(function () {
        $('.date').datepicker({
            'format': 'yyyy-m-d',
            'autoclose': true
        });
    });

    window.addEventListener("resize", function (event) {
        // console.log(document.body.clientWidth);
        let clientWidth = document.body.clientWidth;
        if (clientWidth <= 1000) {
            document.getElementById('navbar-mobile').style.display = 'block';
            document.getElementById('navbar-desktop').style.display = 'none';
        } else {
            document.getElementById('navbar-mobile').style.display = 'none';
            document.getElementById('navbar-desktop').style.display = 'block';
        }
    });

    $(window).on("load", function (e) {
        $('.page-loading').hide();
        $('.page-completed').show();
        $('.footer-custom').show();
    });
</script>

</body>
</html>
