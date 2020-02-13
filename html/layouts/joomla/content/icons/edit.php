<?php
defined('JPATH_BASE') or die;
JHtml::_('bootstrap.tooltip');

$article = $displayData['article'];
$overlib = $displayData['overlib'];
$legacy  = $displayData['legacy'];

if ($legacy)
{
	$icon = $article->state ? 'edit.png' : 'edit_unpublished.png';

	if (strtotime($article->publish_up) > strtotime(JFactory::getDate())
		|| ((strtotime($article->publish_down) < strtotime(JFactory::getDate())) && $article->publish_down != JFactory::getDbo()->getNullDate()))
	{
		$icon = 'edit_unpublished.png';
	}
}
else
{
	$icon = $article->state ? 'edit' : 'eye-close';

	if (strtotime($article->publish_up) > strtotime(JFactory::getDate())
		|| ((strtotime($article->publish_down) < strtotime(JFactory::getDate())) && $article->publish_down != JFactory::getDbo()->getNullDate()))
	{
		$icon = 'eye-close';
	}
}

?>
<?php if ($legacy) : ?>
	<?php echo JHtml::_('image', 'system/' . $icon, JText::_('JGLOBAL_EDIT'), null, true); ?>
<?php else : ?>
    <?php if($article->params->get('show_icons')): ?>
	<span class="hasTooltip glyphicon glyphicon-<?php echo $icon; ?> tip" title="<?php echo JHtml::tooltipText(JText::_('COM_CONTENT_EDIT_ITEM'), $overlib, 0, 0); ?>"></span>
    <?php endif; ?>
	<?php echo JText::_('JGLOBAL_EDIT'); ?>
<?php endif; ?>
