<?php
defined('_JEXEC') or die;
?>

<?php foreach ($this->intro_items as $key => $item): ?>

    <?php
        $params = $item->params;
        $images = json_decode($item->images);
        if(!isset($images->image_intro) || empty($images->image_intro)) {
            $images->image_intro = '';
        }
	?>

	<?php echo $this->escape($item->title); ?><br/>

    <?php echo $images->image_intro; ?><br/>

	<?php echo $item->introtext; ?><br/>

	<?php
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
	else :
		$menu   = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link   = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
		$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)));
	endif;

	echo $link;
	?><br/><br/>

<?php endforeach; ?>

