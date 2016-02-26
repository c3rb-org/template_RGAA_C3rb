<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$params  = $displayData->params;
$images = json_decode($displayData->images);
$imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro;
?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<?php if ($imgfloat == "left") : ?>
		<div class="col-sm-3">
	<?php endif; ?>
	<?php if ($imgfloat == "right") : ?>
		<div class="col-sm-3 pull-right">
	<?php endif; ?>
	<?php if ($imgfloat == "none") : ?>
		<div class="col-sm-12">
	<?php endif; ?>
		<div class="item-image-bloc" aria-hidden="true">
			<div class="item-image 	<?php if ($imgfloat == "none") : ?>imgcfgaucun<?php endif; ?>">
				<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>"><img
				<?php if ($images->image_intro_caption):
					echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"';
				endif; ?>
				src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" itemprop="thumbnailUrl"/>
				<div class="fxfadeInUp">+</div>
				</a>
				<?php else : ?><img
				<?php if ($images->image_intro_caption):
					echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"';
				endif; ?>
				src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" itemprop="thumbnailUrl"/>
				<?php endif; ?> 
			</div>
		</div>
	</div>
	
<?php endif; ?>
