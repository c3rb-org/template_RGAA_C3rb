<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * version J! : 3.6.5 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$buttons = $displayData;

// Load modal popup behavior
JHtml::_('behavior.modal', 'a.modal-button');
?>
<div id="editor-xtd-buttons" class="btn-toolbar pull-left margetop margebottom">
	<?php if ($buttons) : ?>
		<?php foreach ($buttons as $button) : ?>
			<?php echo JLayoutHelper::render('joomla.editors.buttons.button', $button); ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div>