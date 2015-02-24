<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_users/helpers/route.php';

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');

?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" class="form-inline">
	<?php if ($params->get('pretext')) : ?>
		<div class="pretext">
			<p><?php echo $params->get('pretext'); ?></p>
		</div>
	<?php endif; ?>
	<div class="userdata">
		<div id="form-login-username" class="form-group">
			<div class="form-group">
				<?php if (!$params->get('usetext')) : ?>
					<div class="input-prepend">
						<span class="add-on">
							<span class="glyphicon glyphicon-user hasTooltip" title="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>"></span>
							<label id="modlgn-username-label" for="modlgn-username" class="sr-only"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?></label>
						</span>
						<input id="modlgn-username" type="text" name="username" class="form-control" tabindex="0" size="18" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>" aria-labelledby="modlgn-username-label" />
					</div>
				<?php else: ?>
					<label for="modlgn-username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
					<input id="modlgn-username" type="text" name="username" class="form-control" tabindex="0" size="18" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>" />
				<?php endif; ?>
			</div>
		</div>
		<div id="form-login-password" class="form-group">
			<div class="form-group">
				<?php if (!$params->get('usetext')) : ?>
					<div class="input-prepend">
						<span class="add-on">
							<span class="glyphicon glyphicon-lock hasTooltip" title="<?php echo JText::_('JGLOBAL_PASSWORD') ?>">
							</span>
								<label id="modlgn-passwd-label" for="modlgn-passwd" class="sr-only"><?php echo JText::_('JGLOBAL_PASSWORD'); ?>
							</label>
						</span>
						<input id="modlgn-passwd" type="password" name="password" class="form-control" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" aria-labelledby="modlgn-passwd-label" />
					</div>
				<?php else: ?>
					<label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
					<input id="modlgn-passwd" type="password" name="password" class="form-control" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" />
				<?php endif; ?>
			</div>
		</div>
		<?php if (count($twofactormethods) > 1): ?>
		<div id="form-login-secretkey" class="form-group">
			<div class="form-control">
				<?php if (!$params->get('usetext')) : ?>
					<div class="input-prepend input-append">
						<span class="add-on">
							<span class="icon-star hasTooltip" title="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>">
							</span>
								<label for="modlgn-secretkey" class="sr-only"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?>
							</label>
						</span>
						<input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey" class="form-control" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>" />
						<span class="btn width-auto hasTooltip" title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
							<span class="icon-help"></span>
						</span>
				</div>
				<?php else: ?>
					<label for="modlgn-secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY') ?></label>
					<input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey" class="form-control" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>" />
					<span class="btn width-auto hasTooltip" title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
						<span class="icon-help"></span>
					</span>
				<?php endif; ?>

			</div>
		</div>
		<?php endif; ?>
		<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
		<div id="form-login-remember" class="checkbox">
			<label>
			<input id="modlgn-remember" type="checkbox" name="remember" class="" value="yes" role="checkbox" aria-checked="false" tabindex="0"/>
			<label for="modlgn-remember"><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?></label>
			</label> 
		</div>
		<?php endif; ?>
		<div class="clearfix"></div>
		<div id="form-login-submit" class="form-group">
				<button type="submit" tabindex="0" name="Submit" class="btn"><?php echo JText::_('JLOGIN') ?></button>
		</div>
		<?php
			$usersConfig = JComponentHelper::getParams('com_users'); ?>
			<ul class="unstyled">
			<?php if ($usersConfig->get('allowUserRegistration')) : ?>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration&Itemid=' . UsersHelperRoute::getRegistrationRoute()); ?>">
					<?php echo JText::_('MOD_LOGIN_REGISTER'); ?> <span class="glyphicon glyphicon-menu-right"></span></a>
				</li>
			<?php endif; ?>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind&Itemid=' . UsersHelperRoute::getRemindRoute()); ?>">
					<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?>  <span class="glyphicon glyphicon-menu-right"></span></a>
				</li>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset&Itemid=' . UsersHelperRoute::getResetRoute()); ?>">
					<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?>  <span class="glyphicon glyphicon-menu-right"></span></a>
				</li>
			</ul>
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	<?php if ($params->get('posttext')) : ?>
		<div class="posttext">
			<p><?php echo $params->get('posttext'); ?></p>
		</div>
	<?php endif; ?>
</form>
