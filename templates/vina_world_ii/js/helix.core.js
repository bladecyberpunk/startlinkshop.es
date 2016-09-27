/**
 * @package Helix Framework
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2013 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

spnoConflict(function($){
    $('.sp-totop').on('click', function() {
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 500);
    });
    
    //tooltip
    $('.hasTip').tooltip({
        html: true
    });
	
	jQuery('#vina-accordion .pull-right').addClass('icon-plus');
	jQuery('#vina-accordion>div:first-child .pull-right').removeClass('icon-plus').addClass('icon-minus');
	
	var item = jQuery('#vina-accordion .accordion-heading');
	jQuery(item).on('click',function(){
		jQuery('#vina-accordion .accordion-heading .pull-right').removeClass('icon-minus').addClass('icon-plus');
		jQuery(this).find('.pull-right').removeClass('icon-plus').addClass('icon-minus');
	});
});


jQuery(document).ready(function($){
	
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		$('body').swipe({
			swipeLeft: function(event, phase, direction, distance) {
				$('.row-offcanvas').removeClass('active');
			},
			swipeRight: function(event, phase, direction, distance) {
				$('.row-offcanvas').addClass('active');
			}
		});
	}
	
	$('[data-toggle=offcanvas]').click(function () {
		$('.row-offcanvas').toggleClass('active')
	});
	
	$(window).load(function(){	
		$window        	= $(window),
		minHeight		= $window.height(),
		minWidth		= $window.width(),
		$head			= $("#sp-header-wrapper"),
		$breadcrumb		= $("#sp-breadcrumb-wrapper"),
		$header			= $("#sp-header-wrapper .container"),
		$logo			= $("#sp-header-wrapper .container #sp-logo");
		$mobilemenu		= $(".sp-mobile-menu.nav-collapse"),
		$mobilemenuUl	= $(".sp-mobile-menu.nav-collapse >ul"),
		$mainMenu		= $(".sp-main-menu-toggler"),
		
		$mobilemenu.css('z-index'		, 1000);
		$mobilemenuUl.css('width'		, $header.width());
		$mobilemenuUl.css('margin-left'	, 'auto');
		$mobilemenuUl.css('margin-right', 'auto');
		$position1 = $("#sp-position1"),
		$position2 = $("#sp-position2"),
		$slide 	   = $("#sp-feature");
		$goals     = $("#sp-goals-wrapper .user-item");
		
		$slide.css('margin-bottom', -15);
		$breadcrumb.css('margin-top', $head.height());
		$mainMenu.attr("href", '#1');
		
		$blogdate = $(".blogdate");
		$itemHits = $(".itemHits");
		
		$(".itemTitle").css('padding-left',$blogdate.outerWidth()+30);
		$(".itemTitle").css('padding-right',$itemHits.width());
		
		if($('body').hasClass("homepage")) {
			$header.css('background', 'transparent');
		}
		
		//menu-mobile
		$sidebaroffcanvas = $(".sidebar-offcanvas");
		$bodyinnerwrapper = $(".body-innerwrapper");
		$sidebaroffcanvas.height($(window).height());
		
		if (minWidth > 750) {
			$position2.css('min-height', $position1.height());
			$mobilemenu.css('top', $header.height() + 8);
		}
		if (minWidth < 750) {
			$mobilemenu.css('top', $header.height() );
			$("#sp-feature").css('margin-top', $head.height());
			$goals.removeClass('bottom_to_top').addClass('left_to_right');
		}
		if (minWidth < 400) {
			$goals.removeClass('left_to_right').addClass('bottom_to_top');
		}
	});
	
	$(window).resize(function(){
		$(this).load();
	});					  
});