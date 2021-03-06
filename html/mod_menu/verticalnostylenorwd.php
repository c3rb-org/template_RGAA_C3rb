<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *	°version J! : 3.4.0 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('bootstrap.tooltip');

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>



<div class="" id="menu-lnk">
  <div>
        <!-- Collect the nav links, forms, and other content for toggling -->
    <div>
	<ul class="list list-unstyled <?php echo $class_sfx;?>"<?php
		$tag = '';

		if ($params->get('tag_id') != null)
		{
			$tag = $params->get('tag_id') . '';  
			echo ' id="' . $tag . '"';
		}
		?> role="menubar">
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
				$class .= '';
			}

			if ($item->deeper)
			{
				$class .= ' deeper';
			}

			if ($item->parent)
			{
			//<?php echo ($item->deeper && $item->parent && $item->level > 1) ? '-submenu' : '-toggle'
				
			$class .= ' hadparent '; //class bootstrap3 pour sub menu
			if ($item->deeper && $item->parent && $item->level > 1) {
				$class .= ' parent dropdown-submenu';
			}
		}

		if (!empty($class))
		{
			$class = ' class="' . trim($class) . '"';
		}

		echo '<li' . $class . ' role="menuitem">';

		// Render the menu item.
		switch ($item->type) :
		case 'separator':
		require JModuleHelper::getLayoutPath('mod_menu', 'default_separatormultilvl');
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
			echo '<ul class="" role="menu">'; 
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
	?></ul>
		</div>
	</div>
	
</div>