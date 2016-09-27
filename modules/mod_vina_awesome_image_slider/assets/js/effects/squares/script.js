/*
# ------------------------------------------------------------------------
# Vina Awesome Image Slider for Joomla 3
# ------------------------------------------------------------------------
# Copyright(C) 2014 www.VinaGecko.com. All Rights Reserved.
# @license http://www.gnu.org/licenseses/gpl-3.0.html GNU/GPL
# Author: VinaGecko.com
# Websites: http://vinagecko.com
# Forum:    http://vinagecko.com/forum/
# ------------------------------------------------------------------------
*/

function ws_squares(c,a,b){var g=jQuery;var e=b.find("ul").get(0);e.id="wowslider_tmp"+Math.round(Math.random()*99999);var h=0;g(e).coinslider({hoverPause:false,startSlide:c.startSlide,navigation:0,delay:-1,effect:c.type,width:c.width,height:c.height,sDelay:c.duration/(7*5)});var f=g("#coin-slider-"+e.id).css({position:"absolute",left:0,top:0,"z-index":8,transform:"translate3d(0,0,0)"});var d=c.startSlide;g(e).bind("cs:animFinished",function(){g(e).css({left:-d+"00%"}).stop(true,true).show();if(h<2){h=0;f.hide()}});this.go=function(i){h++;f.show();d=i;g.transition(e,i);f.css("background","none");if(c.fadeOut){g(e).fadeOut(c.duration)}return i}};