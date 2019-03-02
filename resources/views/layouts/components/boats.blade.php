<div id="boat-models">

    <div class="container-fluid" id="boat-models-top">
        <div class="row">
            <div class="col-12 col-sm-12 text-right" style="border-top: 1px solid #E8E8E8;">
                <button type="button" class="btn"
                        style="color: #df0b25; font-weight: bold; border-left: 1px solid #E8E8E8 !important;">
                    EXPLORE ALL BOAT
                </button>
            </div>
        </div>
        <div class="row">
            @for ($i = 1; $i <= 3; $i++)
                <div class="col-12 col-sm-3 text-center boat-display">
                    <img src="{{ asset('template/axis-images/home/18-A20-rear.png') }}"
                         alt="image"
                         class="img-fluid" style="padding: 10px 10px 10px 10px;">
                    <p class="text-light-blue" style="font-weight: bold; margin-top: 10px;">A20 | AXIS WAKE</p>
                    <div class="boat-focus" style="display: none; margin-top: 10px; margin-bottom: 15px;">
                        <a href="#">
                            <button type="button" class="btn"
                                    style="font-size: 18px; text-transform: none; color: white; background-color: #df0b25; border-color: transparent !important;">
                                VIEW
                            </button>
                        </a>
                    </div>
                </div>
            @endfor
            <div class="col-12 col-sm-3 text-center boat-display">
                <br><br><br><br><br>
                <a href="javascript:void(0)" style="text-decoration: none;">
                    <i class="fa fa-angle-double-right fa-4x"></i>
                </a>
                <br><br><br><br><br><br>
            </div>
        </div>
    </div>

</div>
