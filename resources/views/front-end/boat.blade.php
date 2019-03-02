@extends ('layouts.app')
@section ('content')

    <div id="wrapper-content">
        <section class="site-section bg1 color11">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-5">
                        <h1 class="title-content">
                            AMAZINGLY AGILE
                        </h1>
                        <p class="small-title">
                            Wakes and waves of every size
                        </p>
                        <br>
                        <p class="content">
                            With seating for 11 and the available Performance Surf Package, the A20 hangs with the big
                            boats on all the tools to make a great wave in a package that fits in standard garages and
                            size-restricted waterways.
                        </p>
                    </div>
                    <div class="col-12 col-sm-7 text-center" style="padding: 0; margin: 0;">
                        <img src="https://cdn.malibuboats.com/2018/Models/Axis/A20/hero-boat-detail.png" alt="image"
                             class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section bg1 color11" style="margin-top: 20px;">
            <div class="container-fluid" style="padding: 0;">
                <div class="row">
                    <div class="col-12 col-sm-7">

                        {{--<div id="boat-section-1">--}}
                        {{--<div class="text-over-image-center">--}}
                        {{--<button type="button" id="btn-boat-section-1"--}}
                        {{--class="bg-orangered text-white padding-all-20 text-bold">--}}
                        {{--PLAY VIDEO--}}
                        {{--</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div style="padding:56.25% 0 0 0;position:relative;" id="video-boat-section-1">
                            <iframe src="https://player.vimeo.com/video/283841346?title=0&byline=0&portrait=0"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>

                    </div>
                    <div class="col-12 col-sm-5" style="padding-left: 50px; padding-top: 20vh; padding-bottom: 20vh;">
                        <h1 class="title-2">
                            2019 AXIS A-SERIES
                        </h1>
                        <br>
                        <p style="display: block;">
                            This 20-footer is the perfect boat for anyone looking for all-around functionality,
                            versatility and value that fits in the garage!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section color7" style="background-color: #EC2721;">
            <div class="container-fluid" style="padding: 40px 40px 40px 40px;">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <div class="headline center" style="margin-bottom: 0;">
                            <h1 class="title-2 text-white title-content">EXTRAS</h1>
                        </div><!-- headline -->

                        <div class="form-group">
                            <ul style="display: block;">
                                <li style="display: inline-block;">
                                    <a href="javascript:void(0)" style="display: block;">
                                        <p class="text-bold small-title text-white" id="display-g4-tower"
                                           style="font-family: AtlasTypewriter-Bold, sans-serif;">
                                            AXIS TRAILERS
                                        </p>
                                    </a>
                                </li>
                                <li style="display: inline-block;">
                                    <a href="javascript:void(0)" style="display: block;">
                                        <p class="text-bold small-title text-white" id="display-g3-5-tower"
                                           style="font-family: AtlasTypewriter-Bold, sans-serif;">TOWER</p>
                                    </a>
                                </li>
                                <li style="display: inline-block;">
                                    <a href="javascript:void(0)" style="display: block;">
                                        <p class="text-bold small-title text-white"
                                           style="font-family: AtlasTypewriter-Bold, sans-serif;">
                                            POWER</p>
                                    </a>
                                </li>
                                <li style="display: inline-block;">
                                    <a href="javascript:void(0)" style="display: block;">
                                        <p class="text-bold small-title text-white"
                                           style="font-family: AtlasTypewriter-Bold, sans-serif;">
                                            SOUND</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group" id="g4-tower" style="clear: left; //border: 1px solid yellow;">
                            <div class="row">
                                <div class="col-sm-7" style="//border: 1px solid yellow;">
                                    <img src="https://cdn.malibuboats.com/images/axis/models/axis-trailer-hotspot-image.png"
                                         alt="image"
                                         class="img-fluid">
                                </div>
                                <div class="col-sm-5 text-left flex" style="padding-left: 100px;">
                                    <p></p>
                                    <p class="content text-white">
                                        <span class="text-bold small-title"
                                              style="font-size: 18px;">Axis Trailers</span>
                                        <br>
                                        <br>
                                        There’s no better way to haul your Axis boat than with an Axis trailer. We hired
                                        the
                                        best team of craftspeople in the business to custom-build trailers that matched
                                        our
                                        boats in engineering and quality. We make Axis trailers in the same Loudon,
                                        Tennessee, facility where we build boats and where our corporate headquarters is
                                        located. When you buy a Axis trailer, you’re assured that your Axis boat will
                                        fit
                                        properly and securely with no clearance issues.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;" id="g3-5-tower">
                            <div class="row">
                                <div class="col-sm-7" style="//border: 1px solid yellow;">
                                    <img src="{{ asset('template/axis-images/boat/axis-tower-hotspot-image.png') }}"
                                         alt="image"
                                         style="width: 100%; height: 90%;">
                                </div>
                                <div class="col-sm-5 text-left flex" style="padding-left: 100px;">
                                    <p></p>
                                    <p>
                                        <span class="text-bold" style="font-size: 18px;">AW15 Tower</span>
                                        <br>
                                        <br>
                                        At Axis, we know the tower is an integral part of the watersports experience,
                                        something that should have the rider’s full trust. That’s why we make our AW15
                                        tower
                                        in-house. Take a close look at the AW15 and you’ll see engineering and build
                                        quality
                                        that excels the competition. Get it in black, white, or charcoal and choose from
                                        our
                                        bimini designs, including an optional high-end Z5 hard shell bimini and a
                                        surfboard
                                        storage.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </section>

        <section class="bg1 color11">
            <div class="container-fluid" style="padding-top: 12vh; padding-bottom: 12vh;">
                <div class="row">
                    <div class="col-12 col-sm-12 text-center">
                        <img src="https://cdn.malibuboats.com/2018/Models/Axis/A24/image-carousel-slide_1.jpg" alt="image"
                             class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
