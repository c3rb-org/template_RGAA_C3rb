<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * °version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $displayData->params;
$canEdit = $displayData->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
?>
<?php $images = json_decode($displayData->images); ?>
<!-- Si image intro -->
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<!-- Agencement image intro -->
	<div class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image"> 
		<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>">
			<div class="item-image-bloc">
				<img
				<?php if ($images->image_intro_caption):
					echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"';
				endif; ?>
				src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php //echo htmlspecialchars($images->image_intro_alt); ?>" itemprop="thumbnailUrl"/>
				<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
				<div class="fxfadeInUp">+</div>
			</div>
		<!-- Image decorative, alt vide, pas de title -->
		<?php else : ?><img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php //echo htmlspecialchars($images->image_intro_alt); ?>" itemprop="thumbnailUrl"/><!-- Image decorative, alt vide, pas de title -->
		<?php endif; ?> 
		
		<?php endif; ?>
		<!-- Fin agencement image intro -->
		<!-- Si titre -->
		<?php if ($params->get('show_title') || $displayData->state == 0 || ($params->get('show_author') && !empty($displayData->author ))) : ?>
			
			<?php if ($params->get('show_title')) : ?>
				<div class="page-header">
					<h3>
						<?php echo $this->escape($displayData->title); ?>
					</h3>
				</div>
			<?php else : ?>
				<h3 class="sr-only">
					<?php echo $this->escape($displayData->title); ?>
				</h3>
			<?php endif; ?>

			<?php if ($displayData->state == 0) : ?>
				<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
			<?php endif; ?>

			<?php if (strtotime($displayData->publish_up) > strtotime(JFactory::getDate())) : ?>
				<span class="label label-warning"><?php echo JText::_('JNOTPUBLISHEDYET'); ?></span>
			<?php endif; ?>

			<?php if ((strtotime($displayData->publish_down) < strtotime(JFactory::getDate())) && $displayData->publish_down != JFactory::getDbo()->getNullDate()) : ?>
				<span class="label label-warning"><?php echo JText::_('JEXPIRED'); ?></span>
			<?php endif; ?>
		<?php endif ?>
		<!-- Fin titre -->
		</a> 
	</div>
<?php else : ?>
	<?php if ($params->get('show_title') || $displayData->state == 0 || ($params->get('show_author') && !empty($displayData->author ))) : ?>
		<div class="page-header">

			<?php if ($params->get('show_title')) : ?>
				<h3>
					<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
						<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid)); ?>" itemprop="url">
						<?php echo $this->escape($displayData->title); ?></a>
					<?php else : ?>
						<?php echo $this->escape($displayData->title); ?>
					<?php endif; ?>
				</h3>
			<?php else : ?>
				<h3 class="sr-only">
					<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
						<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid)); ?>" itemprop="url">
						<?php echo $this->escape($displayData->title); ?></a>
					<?php else : ?>
						<?php echo $this->escape($displayData->title); ?>
					<?php endif; ?>
				</h3>
			<?php endif; ?>

			<?php if ($displayData->state == 0) : ?>
				<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
			<?php endif; ?>
			<?php if (strtotime($displayData->publish_up) > strtotime(JFactory::getDate())) : ?>
				<span class="label label-warning"><?php echo JText::_('JNOTPUBLISHEDYET'); ?></span>
			<?php endif; ?>
			<?php if ((strtotime($displayData->publish_down) < strtotime(JFactory::getDate())) && $displayData->publish_down != JFactory::getDbo()->getNullDate()) : ?>
				<span class="label label-warning"><?php echo JText::_('JEXPIRED'); ?></span>
		<?php endif; ?>
		</div>
	<?php endif; ?>
<?php endif; ?><!-- Fin Si image intro -->