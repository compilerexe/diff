jQuery(document).ready(function () {

    //BOAT SECTION SCRIPT
    jQuery('#boat-section').show().revolution({
        sliderLayout: 'auto',
        /* options are 'auto', 'fullwidth' or 'fullscreen' */
        stopLoop: 'on',
        stopAfterLoops: 0,
        stopAtSlide: 1,
        responsiveLevels: [1920,1680,1400, 1280, 1024, 769, 480],
        gridwidth: [1920,1680,1400, 1280, 1024, 769, 480],
        gridheight: [780,780,750, 640, 560, 800, 800],

        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
        visibilityLevels: [1920,1680,1400, 1240, 1024, 768, 480],

        /* basic navigation arrows and bullets */
        navigation: {

            arrows: {
                enable: true,
                style: 'uranus',
                hide_onleave: false,
                hide_over: 768,
                left: {
                    container: 'slider',
                    h_align: 'left',
                    v_align: 'bottom',
                    h_offset: 40,
                    v_offset: 20
                },
            
                right: {
                    container: 'slider',
                    h_align: 'right',
                    v_align: 'bottom',
                    h_offset: 40,
                    v_offset: 20
                }
            },

            tabs: {
                enable: true,
                style: 'erinyen',
                width: 30,
                height: 20,
                min_width: 240,
                hide_onleave: false,
                h_align: 'center',
                v_align: 'bottom',
                h_offset: 0,
                v_offset: 20,
                wrapper_color: 'transparent',
                space: 10,
                hide_over: 768,
                tmp: '<div class="tp-tab-title">{{title}}</div>',
            }
        }
    });

    function changeStyle() {
        $.each(['.boat-axis-a20','.boat-axis-a22','.boat-axis-a24','.boat-axis-t22','.boat-axis-t23'], 
        function(index, value) {
            $(value).css('opacity',0);
        });
        $.each(['.boat-a20','.boat-a22','.boat-a24','.boat-t22','.boat-t23'], 
        function(index, value) {
            $(value).css('color','#ccc');
        });
    }

    $('.boat-a20').on('click', function() {
        changeStyle()
        $('.boat-axis-a20').css('opacity',1);
        $(this).css('color','#e10019');
        $.each(['.boat-a22','.boat-a24','.boat-t22','.boat-t23'], 
        function(index, value) {
            $(value).addClass('boat-nav-down');
        });
    });
    $('.boat-a22').on('click', function() {
        changeStyle()
        $('.boat-axis-a22').css('opacity',1);
        $(this).css('color','#e10019');
        $(this).removeClass('boat-nav-down');
        $(this).addClass('boat-nav-up');
        $.each(['.boat-a24','.boat-t22','.boat-t23'], 
        function(index, value) {
            $(value).addClass('boat-nav-down');
        });
    });
    $('.boat-a24').on('click', function() {
        changeStyle();
        $('.boat-axis-a24').css('opacity',1);
        $(this).css('color','#e10019');
        $(this).removeClass('boat-nav-down');
        $(this).addClass('boat-nav-up');
        $.each(['.boat-t22','.boat-t23'], 
        function(index, value) {
            $(value).addClass('boat-nav-down');
        });
        $('.boat-a22').removeClass('boat-nav-down');
        $('.boat-a22').addClass('boat-nav-up');
    });
    $('.boat-t22').on('click', function() {
        changeStyle()
        $('.boat-axis-t22').css('opacity',1);
        $(this).css('color','#e10019');
        $(this).removeClass('boat-nav-down');
        $(this).addClass('boat-nav-up');
        $.each(['.boat-a22','.boat-a24','.boat-t22'], 
        function(index, value) {
            $(value).removeClass('boat-nav-down');
            $(value).addClass('boat-nav-up');
        });
        $('.boat-t23').addClass('boat-nav-down');
    });
    $('.boat-t23').on('click', function() {
        changeStyle()
        $('.boat-axis-t23').css('opacity',1);
        $(this).css('color','#e10019');
        $(this).removeClass('boat-nav-down');
        $(this).addClass('boat-nav-up');
        $.each(['.boat-a22','.boat-a24','.boat-t22'], 
        function(index, value) {
            $(value).removeClass('boat-nav-down');
            $(value).addClass('boat-nav-up');
        });
    });
    //BOAT SECTION END

    //LAB SECTION START
    jQuery('#axis-lab').show().revolution({
        sliderLayout: 'auto',
        /* options are 'auto', 'fullwidth' or 'fullscreen' */
        stopLoop: 'on',
        stopAfterLoops: 0,
        stopAtSlide: 1,
        responsiveLevels: [1920, 1680, 1400, 1280, 1024, 768, 480],
        gridwidth: [1920, 1680, 1400, 1280, 1024, 768, 480],
        gridheight: [680,680,640, 640, 540, 500, 450],

        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
        visibilityLevels: [1920, 1680,1400, 1240, 1024, 1024, 480],

        /* basic navigation arrows and bullets */
        navigation: {

            arrows: {
                enable: true,
                style: 'uranus',
                hide_onleave: false,
                hide_over: 960,
                left: {
                    container: 'slider',
                    h_align: 'left',
                    v_align: 'bottom',
                    h_offset: 30,
                    v_offset: -45
                },

                right: {
                    container: 'slider',
                    h_align: 'right',
                    v_align: 'bottom',
                    h_offset: 30,
                    v_offset: -45
                }
            },

            tabs: {
                enable: true,
                style: 'erinyen',
                width: 20,
                height: 20,
                min_width: 180,
                hide_onleave: false,
                h_align: 'center',
                v_align: 'bottom',
                h_offset: 0,
                v_offset: -40,
                wrapper_color: 'transparent',
                space: 0,
                hide_over: 960,
                tmp: '<div class="tp-tab-title">{{title}}</div>',
            }
        }
    });
    //LAB SECTION END
});