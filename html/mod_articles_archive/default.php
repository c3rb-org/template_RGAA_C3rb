<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_archive
 * version J! : 3.6 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($list)) : ?>
	<ul class="nav nav-pills nav-stacked archive-module<?php echo $moduleclass_sfx; ?>"><!-- BS3 c3rbrgaa -->
	<?php foreach ($list as $item) : ?>
	<li>
		<a href="<?php echo $item->link; ?>">
			<?php echo $item->text; ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
