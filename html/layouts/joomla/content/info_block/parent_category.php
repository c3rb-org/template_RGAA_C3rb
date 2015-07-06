<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * �version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

?>
			<dd class="parent-category-name">
				<?php $title = $this->escape($displayData['item']->parent_title); ?>
				<?php if ($displayData['params']->get('link_parent_category') && !empty($displayData['item']->parent_slug)) : ?>
					<?php $url = '&nbsp;<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($displayData['item']->parent_slug)) . '" itemprop="genre">' . $title . '</a>'; ?>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
				<?php else : ?>
					<?php echo JText::sprintf('COM_CONTENT_PARENT', '<span itemprop="genre">&nbsp;' . $title . '</span>'); ?>
				<?php endif; ?>
			</dd>