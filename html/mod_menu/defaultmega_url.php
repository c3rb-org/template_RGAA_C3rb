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

if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img alt="" class="margeright" aria-hidden="true" src="' . $item->menu_image . '" /><span class="image-title">' . $item->title . '</span> ' : //Pas de 'alt' car image décorative
		$linktype = '<img alt="" aria-hidden="true" src="' . $item->menu_image . '" /><span class="sr-only">' . $item->title . '</span> '; //Pas de 'alt' car image décorative
}
else
{
	$linktype = $item->title;
}

$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));

switch ($item->browserNav) :
	default:
	case 0:
?><a <?php echo $class; ?>href="<?php echo $flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
		// Use JavaScript "window.open"
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,' . $params->get('window_open');
			?><a <?php echo $class; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
endswitch;
