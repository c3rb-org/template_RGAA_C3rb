<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *	°version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="newsflash<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
		<article role="article"><!-- c3rbrgaa html5 -->
		<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
		<div class="clearfix"></div>
		</article>
	<?php endforeach; ?>
</div>
