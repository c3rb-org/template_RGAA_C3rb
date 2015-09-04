<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 * @version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('bootstrap.tooltip');

$showHere = $params->get('showHere', 1);
$showHome = $params->get('showHome', 1);
$showLast = $params->get('showLast', 1);
$separator = $params->get('separator', null);
$homeText = $params->get('homeText', null);
?>

<nav role="navigation">
	<p id="breadcrumblabel"<?php echo $showHere?'':' class="hidden"'; ?>><?php echo JText::_('MOD_BREADCRUMBS_HERE'); ?></p>
	<ol class="breadcrumb<?php echo $moduleclass_sfx; ?>" role="menu" aria-labelledby="breadcrumblabel" itemscope itemtype="http://schema.org/BreadcrumbList">
		<?php $position=1; foreach($list as $key => $item): ?>
			<?php $last = ($item === end($list)); $first = ($item === reset($list)); ?>
			<?php $name = (!empty($homeText))?$homeText:$item->name; ?>

			<?php if(($first && $showHome) || ($last && $showLast) || (!$first || !$last)): ?>
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" role="menuitem" <?php echo $last?' class="active"':''; ?>>
					<meta itemprop="position" content="<?php echo $position; ?>" />
					<?php if(!$last): ?><a itemprop="item" href="<?php echo $item->link; ?>" title="<?php echo $name; ?>"><?php endif; ?>
						<span itemprop="name"><?php echo $name; ?></span>
						<?php if(!$last): ?></a><?php endif; ?>
				</li>
			<?php endif; ?>

			<?php if(!$last && !empty($separator)): ?>
				<?php echo $separator; ?>
			<?php endif; ?>
			<?php $position++; endforeach; ?>
	</ol>
</nav>
