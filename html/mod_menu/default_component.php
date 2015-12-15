<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *	�version J! : 3.4.3 - MIR
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





//Gestion du title
if (!empty($item->anchor_title)) {
$title = 'title=" '. $item->anchor_title .' "';
} else {
$title='';
}

if ($item->menu_image)
{
	$item->params->get('menu_text', 1) ?
	$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
	$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
}
else
{
	$linktype = $item->title;
}

switch ($item->browserNav)
{
	default:
	case 0:
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" <?php echo $title; ?>> <?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" target="_blank" title="<?php echo $title; ?>"><?php echo $linktype; ?></a><?php
		break;
	case 2:
	// Use JavaScript "window.open"
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
}
