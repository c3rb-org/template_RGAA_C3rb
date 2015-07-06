<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_users_latest
 *	°version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($names)) : ?>
	<div role="list" class="latestusers<?php echo $moduleclass_sfx ?>"><!-- C3rbrgaa -->
	<?php foreach ($names as $name) : ?>
		<div role="listitem" class="label label-default">
			<?php echo $name->username; ?>
		</div>&nbsp;
	<?php endforeach;  ?>
	</div>
<?php endif; ?>
