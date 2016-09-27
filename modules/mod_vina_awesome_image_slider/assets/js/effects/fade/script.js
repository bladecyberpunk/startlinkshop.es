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

function ws_fade(c,a,b){var e=jQuery;var d=e("ul",b);var f={position:"absolute",left:0,top:0,width:"100%",height:"100%",transform:"translate3d(0,0,0)"};this.go=function(g,h){var i=e(a.get(g)).clone().css(f).hide().appendTo(b);if(!c.noCross){var j=e(a.get(h)).clone().css(f).appendTo(b);j.fadeOut(c.duration,function(){j.remove()})}i.fadeIn(c.duration,function(){d.css({left:-g+"00%"});i.remove()});return g}};