<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * °version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$msgList = $displayData['msgList'];
$error_type = array('error'=>'alert-danger','warning'=>'alert-warning',
    'message'=>'alert-info');
?>
<div class="container margetop">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="system-message-container">
				<?php if (is_array($msgList) && !empty($msgList)) : ?>
				<div id="system-message">
				<?php foreach ($msgList as $type => $msgs) : ?>
					<div role="alert" class="alert <?php echo (array_key_exists($type, $error_type) == true) ? $error_type[$type] : 'alert-info'; ?> alert-dismissible fade in">
						<button aria-label="Fermer" data-dismiss="alert" class="close" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
						<?php if (!empty($msgs)) : ?>
						<h4 class="alert-heading"><?php echo JText::_($type); ?></h4>
						<div>
							<?php foreach ($msgs as $msg) : ?>
							<p><?php echo $msg; ?></p>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>