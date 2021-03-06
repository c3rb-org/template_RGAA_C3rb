<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 * version J! : 3.6.5 - MIR
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

foreach ($list as $item) : ?>
<article role="article"><!-- HTML5 c3rbrgaa -->
		<div <?php if ($_SERVER['REQUEST_URI'] == JRoute::_(ContentHelperRoute::getCategoryRoute($item->id))) echo ' class="active"';?>> <?php $levelup = $item->level - $startLevel - 1; ?><!-- Pas de liste C3rbRgaa -->
			<h<?php echo $params->get('item_heading') + $levelup; ?>>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
				<?php echo $item->title;?>
					<?php if ($params->get('numitems')) : ?>
						(<?php echo $item->numitems; ?>)
					<?php endif; ?>
				</a>
	   		</h<?php echo $params->get('item_heading') + $levelup; ?>>
			<?php if ($params->get('show_description', 0)) : ?>
				<?php echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content'); ?>
			<?php endif; ?>
			<?php if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0)
				|| ($params->get('maxlevel') >= ($item->level - $startLevel)))
				&& count($item->getChildren())) : ?>
				<?php echo '<ul>'; ?>
				<?php $temp = $list; ?>
				<?php $list = $item->getChildren(); ?>
				<?php require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
				<?php $list = $temp; ?>
				<?php echo '</ul>'; ?>
			<?php endif; ?>
		</div><!-- FIN Pas de liste C3rbRgaa -->
</article><!-- FIN HTML5 c3rbrgaa -->
<?php endforeach; ?>
