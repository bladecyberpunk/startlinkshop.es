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

function ws_rotate(c,a,b){var f=jQuery;var d=f("ul",b);var g={position:"absolute",left:0,top:0,width:"100%"};var e;this.go=function(h,i){if(e){e.stop(true,true)}e=f(a.get(h)).clone().css(g).hide().appendTo(b);if(!c.noCross){var j=f(a.get(i)).clone().css(g).appendTo(b);d.hide();j.animate({rotate:c.rotateOut||180,scale:c.scaleOut||10,opacity:"hide"},{duration:c.duration,easing:"easeInOutExpo",complete:function(){f(this).remove()}})}e.css({scale:c.scaleIn||10,rotate:-(c.rotateIn||180),zIndex:10});e.animate({opacity:"show",rotate:0,scale:1},{duration:c.duration,easing:"easeInOutExpo",queue:false,complete:function(){d.css({left:-h+"00%"}).show();f(this).remove();e=0}});return h}};