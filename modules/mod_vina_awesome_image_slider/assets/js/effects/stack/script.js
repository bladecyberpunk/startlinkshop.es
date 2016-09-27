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

function ws_stack(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=c.length>2?(k-h+1)%c.length:1;if(Math.abs(n)>=1){g=(n>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?-1:1)+"00%";var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,left:((g?i:l)),transform:"translate3d(0,0,0)"});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){j.hide().css({left:-k+"00%"});if(d.fadeOut){j.stop(true,true).fadeIn(d.duration)}else{j.show()}}else{if(d.fadeOut){j.fadeOut(d.duration)}}f.animate({left:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"}).stop(true,true).show()}e(this).remove()});return k}};