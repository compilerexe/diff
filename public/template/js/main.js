function getScripts( scripts, onScript, onComplete )
{
    this.async = true;
    this.cache = false;
    this.data = null;
    this.complete = function () { $.scriptHandler.loaded(); };
    this.scripts = scripts;
    this.onScript = onScript;
    this.onComplete = onComplete;
    this.total = scripts.length;
    this.progress = 0;
};

getScripts.prototype.fetch = function() {
    $.scriptHandler = this;
    var src = this.scripts[ this.progress ];
    console.log('%cFetching %s','color:#ffbc2e;', src);

    $.ajax({
        crossDomain:true,
        async:this.async,
        cache:this.cache,
        type:'GET',
        url: src,
        data:this.data,
        statusCode: {
            200: this.complete
        },
        dataType:'script'
    });
};

getScripts.prototype.loaded = function () {
    this.progress++;
    if( this.progress >= this.total ) {
        if(this.onComplete) this.onComplete();
    } else {
        this.fetch();
    };
    if(this.onScript) this.onScript();
};


var scripts = new getScripts(
    ['js/popper.min.js',
	 'js/bootstrap.min.js',
	 'js/bootstrap.bundle.min.js',
	 'js/prettify.min.js',
	 'js/fancybox.min.js',
	 'js/flipclock.min.js',
	 'js/swiper.min.js',
	 'js/isotope.min.js',
	 'js/particles.min.js',
	 'js/jquery.stellar.min.js',
	 'js/instagram.min.js',
	 'js/odometer.min.js',
	 'js/jquery.validate.min.js',
	 'js/jquery.form.min.js',
	 'js/contact.form.min.js',
	 'js/wow.min.js',
	 'js/TweenMax.min.js',
	 'js/easypiechart.min.js',
	 'js/perspective.min.js',
	 'js/scripts.js'],
    function() {
       
		// PRELOADER
		(function($) {
			$(window).load(function(){
				$("body").addClass("page-loaded");	
			});
		})(jQuery)
    
	},
	
    function () {
		// ---
    }
);
scripts.fetch();




