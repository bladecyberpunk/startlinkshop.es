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

function ws_basic(c,a,b){this.go=function(d){b.find("ul").css("transform","translate3d(0,0,0)").stop(true).animate({left:(d?-d+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},c.duration,"easeInOutExpo");return d}};