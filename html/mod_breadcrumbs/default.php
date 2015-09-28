<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 * @version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
//JHtml::_('bootstrap.tooltip');

$showHere = (bool) $params->get('showHere', true);
$showHome = (bool) $params->get('showHome', true);
$showLast = (bool) $params->get('showLast', true);
$separator = $params->get('separator', null);
$homeText = $params->get('homeText', null);

// Copy array for manipulations
$listMod = $list;

// Set property home = true if home
if($showHome) {
	$list[0]->home = true;
}// Else : Joomla already remove item if home not showed

// Set property last = true if last
if(!$showLast) {
	//$listMod = array_pop($listMod); // Doesn't work as expected
	unset($listMod[count($listMod)-1]);
}else {
	$listMod[count($listMod)-1]->last = true;
}

// Add position to all items
if(!empty($listMod)) {
	array_walk($listMod, function(&$arr, $key, $startNum=1){
		$arr->position = $startNum++;
	});
}

?>

<?php if( !empty($listMod) ): ?>
<nav role="navigation">
	<p id="breadcrumblabel"<?php echo $showHere?'class="txtbreadcrumb"':' class="hidden"'; ?>><?php echo JText::_('MOD_BREADCRUMBS_HERE'); ?></p>
	<ol class="breadcrumb<?php echo $moduleclass_sfx; ?>" role="menu" aria-labelledby="breadcrumblabel" itemscope itemtype="http://schema.org/BreadcrumbList">
		<?php foreach($listMod as $key => $item): ?>
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" role="menuitem" <?php echo !empty($item->last)?' class="active"':''; ?>>
			<meta itemprop="position" content="<?php echo $item->position; ?>" />
			<?php if(empty($item->last)): ?><a itemprop="item" href="<?php echo $item->link; ?>" title="Accéder à la page : <?php echo $item->name; ?>"><?php endif; ?>
				<span itemprop="name"><?php echo $item->name; ?></span>
			<?php if(empty($item->last)): ?></a><?php endif; ?>
		</li>
			<?php if(empty($item->last) && !empty($separator)): ?>
				<?php echo $separator; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</ol>
</nav>
<?php endif; ?>
