$(window).on("load", function() {
    responsiveLayout();
});

// responsiveLayout Menu
var responsiveflagMenu = false;
function responsiveLayout(element,eclass){
	var $header = $("header"),
    offset_top = $header.offset().top;
    $(window).scroll(function(event){
		// processScroll($header, "navbar-compact", offset_top);
		processScroll($header, "", offset_top);
	});
	responsiveflagMenu = true;
	
}

// processScroll Menu
function processScroll(element, eclass, offset_top) {
    var scrollTop = $(window).scrollTop();
    if($(element).height()< $(window).height()){
        if (scrollTop > offset_top) {
            //fix secondary navigation
            $(element).addClass(eclass);
			
        } else if (scrollTop <= offset_top) {
            $(element).removeClass(eclass);
        }

    }
}

// $(window).load(function() {
// 	var lastScrollTop = 0;
// 	$(window).scroll(function(event) {
// 		var $header = $("header");
// 		var scrTop = $(window).scrollTop();
// 		if( scrTop > lastScrollTop ) {
// 			if($header.hasClass('navbar-compact')) {
// 				$header.addClass('hidden-menu');
// 			}
// 		} else {
// 			if($header.hasClass('navbar-compact')) {
// 				$header.removeClass('hidden-menu');
// 			}
// 		}
// 		lastScrollTop = scrTop;
// 	});
// });

 /* ----------------------------------------------------------- */
	/*  Fixed header
	/* ----------------------------------------------------------- */
    
     
    $(window).on('scroll', function(){
		if ( $(window).scrollTop() > 200 ) {
			$('.header-bottom').addClass('fixed');
		} else {
			$('.header-bottom').removeClass('fixed');
		}
	});