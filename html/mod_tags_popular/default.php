<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_popular
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$db = JFActory::getDbo();
?>
<?php JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php'); ?>
<div class="tagspopular<?php echo $moduleclass_sfx; ?>">
	<?php if (!count($list)) : ?>
		<div class="alert alert-no-items"><?php echo JText::_('MOD_TAGS_POPULAR_NO_ITEMS_FOUND'); ?></div>
	<?php else : ?>
		<ul class="tags list-inline tag-pop">
		<?php foreach ($list as $item) : ?>

			<?php
				$query = $db->getQuery(true);
				$query->select($db->quoteName('parent_id'))->from($db->quoteName('#__tags'))->where('id='.(int)$item->tag_id);
				$parent_id = $db->setQuery($query)->loadResult();
			?>

		<li class="tag-<?php echo $item->tag_id; ?> <?php if(is_null($parent_id) == false): ?>tag-parent-<?php echo $parent_id; ?><?php endif; ?>">
		<?php $route = new TagsHelperRoute; ?>
			<a title="<?php echo JText::_('TPL_C3RB_RGAA_MOD_TAG_POP_LIENRECHERCHE'); ?><?php echo htmlspecialchars($item->title); ?>" class="label label-info hasTooltip" href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($item->tag_id . '-' . $item->alias)); ?>">
				<?php echo htmlspecialchars($item->title); ?></a>
			<?php if ($display_count) : ?>
				<span class="tag-count badge badge-info"><?php echo $item->count; ?></span>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>