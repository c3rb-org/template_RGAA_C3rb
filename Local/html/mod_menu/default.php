<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *	°version J! : 3.4.0 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
	<ol class="nav nav-pills menu<?php echo $class_sfx;?>"<?php
		$tag = '';

		if ($params->get('tag_id') != null)
		{
			$tag = $params->get('tag_id') . '';  
			echo ' id="' . $tag . '"';
		}
	?>>
	<?php
	foreach ($list as $i => &$item)
	{
		$class = 'item-' . $item->id;

		if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))
		{
			$class .= ' current';
		}

	$is_active=false;
		if (in_array($item->id, $path))
		{
			$class .= ' active';
			$is_active=true;
		}
		elseif ($item->type == 'alias')
		{
			$aliasToId = $item->params->get('aliasoptions');

			if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
			{
				$class .= ' active';
				$is_active=true;
			}
			elseif (in_array($aliasToId, $path))
			{
				$class .= ' alias-parent-active';
				$is_active=true;
			}
		}

		if ($item->type == 'separator')
		{
			$class .= ' divider';
		}

		if ($item->deeper)
		{
			$class .= ' deeper';
		}

		if ($item->parent)
		{
			$class .= ' parent dropdown';//class bootstrap3 pour sub menu
		}

		if (!empty($class))
		{
			$class = ' class="' . trim($class) . '"';
		}

		echo '<li' . $class . '>';

		// Render the menu item.
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
			case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
				break;

			default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				break;
		endswitch; 

		// The next item is deeper.
		if ($item->deeper)
		{
			echo '<ul class="nav-child dropdown-menu">'; 
		}
		elseif ($item->shallower)
		{
			// The next item is shallower.
			echo '</li>'; 
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		else
		{
			// The next item is on the same level.
			echo '</li>';
		}
	}
	?></ol>