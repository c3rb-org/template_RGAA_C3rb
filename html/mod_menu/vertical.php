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



<div class="defaultverti navbar navbar-default " id="menu-lnk">
  <div class="row-fluid ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse<?php echo $module->id; ?>">
        <span class="sr-only"><?php echo JText::_('TPL_C3RB_RGAA_MOD_MENU_OUVRIR'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse menuvertical" id="collapse<?php echo $module->id; ?>">
	<ul class="nav nav-pills nav-stacked menu<?php echo $class_sfx;?>"<?php
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

			$class .= ' parent '; //class bootstrap3 pour sub menu
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
		break;

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
			echo '<ul class="nav-child dropdown-menu multi-level" role="menu">';
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
	<div class="clearfix"></div>
</div>