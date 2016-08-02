<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * °version J! : 3.6 - MIR
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<h3>Plus d'articles</h3><!-- modif tmpl -->
<ul class="nav nav-tabs nav-stacked"><!-- modif tmpl -->
<?php foreach ($this->link_items as &$item) : ?>
	<li>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)); ?>">
			<?php echo $item->title; ?></a>
	</li>
<?php endforeach; ?>
</ul><!-- modif tmpl -->
