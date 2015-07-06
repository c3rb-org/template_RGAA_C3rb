<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *	°version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="list-group mostread<?php echo $moduleclass_sfx; ?>"><!-- bs3 c3rbrgaa -->
<?php foreach ($list as $item) : ?>
	<li class="list-group-item"><!-- bs3 c3rbrgaa -->
		<a href="<?php echo $item->link; ?>">
			<?php echo $item->title; ?></a>
	</li>
<?php endforeach; ?>
</ul>
