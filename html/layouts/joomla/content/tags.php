<?php
/**
 * @package     Joomla.Cms
 * @subpackage  Layout
 * version J! : 3.6.5 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\Registry\Registry;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

?>
<?php if (!empty($displayData)) : ?>
	<div class="col-sm-12">
		<ul class="tags inline">
			<?php foreach ($displayData as $i => $tag) : ?>
				<?php if (in_array($tag->access, JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id')))) : ?>
					<?php $tagParams = new Registry($tag->params); ?>
					<?php $link_class = $tagParams->get('tag_link_class', 'label label-info'); ?>
					<li class="tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i ?> tag-parent-<?php echo $this->escape($tag->parent_id); ?>" itemprop="keywords">
						<a title="<?php echo JText::_('TPL_C3RB_RGAA_MOD_TAG_POP_LIENRECHERCHE'); ?><?php echo $this->escape($tag->title); ?>"  href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($tag->tag_id . '-' . $tag->alias)) ?>" class="hasTooltip <?php echo $link_class; ?>">
							<?php echo $this->escape($tag->title); ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
