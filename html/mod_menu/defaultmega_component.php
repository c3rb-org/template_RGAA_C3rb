<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 * version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//Gestion de la ClassCss
if (!empty($item->anchor_css)) {
$class = 'class=" '. $item->anchor_css .' "';
} else {
$class='';
}

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

// fin generation du title rgaac3rb

if ($item->menu_image)
{
	$item->params->get('menu_text', 1) ?
	$linktype = '<img alt="" class="margeright" aria-hidden="true" src="' . $item->menu_image . '" /><span class="image-title">' . $item->title . '</span> ' :  //Pas de 'alt' car image d?orative
	$linktype = '<img alt="" aria-hidden="true" src="' . $item->menu_image . '" /><span class="sr-only">' . $item->title . '</span> '; //Pas de 'alt' car image d?orative
}
else
{
	$linktype = $item->title;
}

switch ($item->browserNav)
{
	default:
	case 0:
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?>
<?php if (!empty($item->note)) : ?>
<div class="megadesc">
<p>
	<?php echo $item->note; ?>
</p>
</div>
<?php endif ; ?>
</a>
<?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
	// Use JavaScript "window.open"
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
}

