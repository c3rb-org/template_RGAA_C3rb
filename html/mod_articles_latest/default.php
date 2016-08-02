<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *	�version J! : 3.6 - MIR
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="list-group latestnews<?php echo $moduleclass_sfx; ?>"><!-- bs3 c3rbrgaa -->
<?php foreach ($list as $item) :  ?>
	<li itemscope itemtype="https://schema.org/Article">
		<a href="<?php echo $item->link; ?>" itemprop="url">
			<span itemprop="name">
				<?php echo $item->title; ?>
			</span>
		</a>
	</li>
<?php endforeach; ?>
</ul>
