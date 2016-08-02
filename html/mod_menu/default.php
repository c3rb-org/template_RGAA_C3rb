<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *°version J! : 3.6 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('bootstrap.tooltip');
// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<div class="navbar navbar-default " id="menu-lnk<?php echo $module->id; ?>">
  <div class="row-fluid ">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse<?php echo $module->id; ?>">
        <span class="sr-only"><?php echo JText::_('TPL_C3RB_RGAA_MOD_MENU_OUVRIR'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse menuhoryzontal" id="collapse<?php echo $module->id; ?>">
	<nav aria-label="<?php echo $module->title; ?>" role="navigation">
	<ul class="nav navbar-nav menu<?php echo $class_sfx;?>"<?php
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
	?>
	</ul>
	</nav>
		</div>
	</div>
	<div class="clearfix"></div>
</div>