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

$doc = JFactory::getDocument();
$doc->addScript('modules/mod_vina_awesome_image_slider/assets/js/script.js', 'text/javascript');
$doc->addStyleSheet('modules/mod_vina_awesome_image_slider/assets/styles/style.css');
modVinaAwesomeImageSliderHelper::loadEffect($transitionEffect);

$timthumb = JURI::base() . 'modules/mod_vina_awesome_image_slider/libs/timthumb.php?a=c&q=99&z=0';
?>
<style type="text/css">
#vina-awesome-slider<?php echo $module->id; ?> {
	max-width: <?php echo $moduleScaleWidth; ?>;
}
#vina-awesome-slider<?php echo $module->id; ?> .ws_bulframe div {
	width: <?php echo $smallImageWidth; ?>px;
}
#vina-awesome-slider<?php echo $module->id; ?> .ws_bulframe div div {
	height: <?php echo $smallImageHeight; ?>px;
}
#vina-awesome-slider<?php echo $module->id; ?> .ws_bulframe span {
	left: <?php echo $smallImageWidth/2; ?>px;
}
#vina-awesome-slider<?php echo $module->id; ?> .ws-title {
	<?php echo $captionPosition; ?>
}
#vina-copyright<?php echo $module->id; ?> {
	font-size: 12px;
	<?php if(!$params->get('copyRightText', 0)) : ?>
	height: 1px;
	overflow: hidden;
	<?php endif; ?>
	clear: both;
}
</style>
<div id="vina-awesome-slider<?php echo $module->id; ?>" class="vina-awesome-slider">
	<div class="ws_images">
		<ul>
			<?php foreach($slides as $key => $slide) : ?>
			<?php
				$title = $slide->name;
				$image = $slide->img;
				$image = (strpos($image, 'http://') === false) ? JURI::base() . $image : $image;
				
				if($resizeImage)
					$image = $timthumb . '&w=' . $moduleWidth . '&h=' . $moduleHeight . '&src=' . $image;
			?>
			<li>
				<img src="<?php echo $image; ?>" title="<?php echo $title; ?>" id="wows1_<?php echo $key; ?>"/>
				<?php echo $slide->text; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	
	<?php if($bullets) : ?>
	<div class="ws_bullets">
		<div>
			<?php foreach($slides as $key => $slide) : ?>
			<?php
				$image = $slide->img;
				$image = (strpos($image, 'http://') === false) ? JURI::base() . $image : $image;
				$image = $timthumb . '&w=' . $smallImageWidth . '&h=' . $smallImageHeight . '&src=' . $image;
			?>
			<a href="#" title="<?php echo $slide->name; ?>">
				<img src="<?php echo $image; ?>" />
				<?php echo $key; ?>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="ws_shadow"></div>
</div>
<script>
jQuery(document).ready(function ($) {
	$("#vina-awesome-slider<?php echo $module->id; ?>").wowSlider({
		effect: 		"<?php echo $transitionEffect; ?>",
		duration: 		<?php echo $duration; ?>,
		delay:			<?php echo $delay; ?>,
		width:			<?php echo $moduleWidth; ?>,
		height:			<?php echo $moduleHeight; ?>,
		autoPlay:		<?php echo $autoPlay; ?>,
		playPause:		<?php echo $playPause; ?>,
		stopOnHover:	<?php echo $stopOnHover; ?>,
		loop:			<?php echo $loop; ?>,
		bullets:		<?php echo $bullets; ?>,
		caption:		<?php echo $caption; ?>,
		captionEffect:	"<?php echo $captionEffect; ?>",
		controls:		<?php echo $controls; ?>,
	});
});
</script>