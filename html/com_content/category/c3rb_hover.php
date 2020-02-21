<?php
defined('_JEXEC') or die;
?>

<?php foreach ($this->intro_items as $key => $item): ?>

	<?php
	$params = $item->params;

	$texte = '';
	$image = null;
	if (!empty($item->jcfields))
	{
		foreach ($item->jcfields as $field)
		{
			switch ($field->name)
			{
				case 'texte':
					$texte = $field->rawvalue;
					break;
				case 'image':
					$image = $field->rawvalue;
					break;
				default:
					break;
			}
		}
	}

	?>

    <div class="blog-card"
	     <?php if (!is_null($image)): ?>style="background-image: url('<?= htmlspecialchars($image, ENT_COMPAT, 'UTF-8'); ?>');"<?php endif; ?>>
        <div class="title-content">
            <h3><?php echo $this->escape($item->title); ?></h3>
        </div>
        <div class="card-info"><?php echo $texte; ?></div>
        <div class="utility-info">
            <hr/>
            <ul class="utility-list">
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
				?>
                <li class="showmore"><a href="<?= $link; ?>">+ Lire la suite</a></li>
            </ul>
        </div>
        <div class="gradient-overlay"></div>
        <div class="color-overlay"></div>
    </div>
<?php endforeach; ?>

