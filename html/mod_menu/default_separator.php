<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * °version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
//Gestion du title avec ou sans title defini dans l'admin, gestion de la page active
if (!empty($item->anchor_title)) {
	if (!empty($is_active)) {
	$title = 'title=" '. $item->anchor_title .' - Page active"';
	} else {
	$title = 'title=" '. $item->anchor_title .'"';
	}
} else {
	if (!empty($is_active)) {
	$title = 'title="'.$item->title.' - Page active"';
	} else {
	$title = '';
	}
}

if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img class="margeright" alt="" aria-hidden="true" src="' . $item->menu_image . '"  /><span class="image-title">' . $item->title . '</span> ' :
		$linktype = '<img alt="" aria-hidden="true" src="' . $item->menu_image . '" /><span class="sr-only">' . $item->title . '</span> '; //Pas de 'alt' car image décorative
}
else
{
	$linktype = $item->title;
}
?>	


<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	<span class="separator <?php echo $item->anchor_css; ?>" <?php echo $title; ?>>
		<?php echo $linktype; ?>
	</span>
</a>
