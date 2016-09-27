<?php
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

// no direct access
defined('_JEXEC') or die('Restricted access');
require_once dirname(__FILE__) . '/helper.php';

// load json code
$slider = json_decode($params->get('slides', ''));

// load data
$slides = modVinaAwesomeImageSliderHelper::getSildes($slider);

// check if don't have any slide
if(empty($slides)) {
	echo "You don't have any slide!";
	return;
}

// get module params
$moduleWidth		= $params->get('moduleWidth', '600');
$moduleHeight		= $params->get('moduleHeight', '300');
$moduleScaleWidth	= $params->get('moduleScaleWidth', '600px');
$resizeImage		= $params->get('resizeImage', 1) ? 'true' : 'false';
$transitionEffect	= $params->get('transitionEffect', 'blinds');
$duration			= $params->get('duration', 2000);
$delay				= $params->get('delay', 2000);
$autoPlay			= $params->get('autoPlay', 1) ? 'true' : 'false';
$playPause			= $params->get('playPause', 1) ? 'true' : 'false';
$stopOnHover		= $params->get('stopOnHover', 1) ? 'true' : 'false';
$loop				= $params->get('loop', 0) ? 'true' : 'false';
$bullets			= $params->get('bullets', 1) ? 'true' : 0;
$caption			= $params->get('caption', 1) ? 'true' : 'false';
$captionEffect		= $params->get('captionEffect', 'slide');
$controls			= $params->get('controls', 1) ? 'true' : 'false';
$smallImageWidth	= $params->get('smallImageWidth', '120');
$smallImageHeight	= $params->get('smallImageHeight', '60');
$captionPosition	= $params->get('captionPosition', 'bottom: 30px; left: 0;');

// display layout
require JModuleHelper::getLayoutPath('mod_vina_awesome_image_slider', $params->get('layout', 'default'));

// display copyright text
modVinaAwesomeImageSliderHelper::getCopyrightText($module);