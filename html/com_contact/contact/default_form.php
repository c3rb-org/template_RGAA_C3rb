<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * version J! : 3.6.5 - MIR
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

$captchaEnabled = false;
/* On injecte des classes dans les input */
$tab_input = array('contact_name','contact_email','contact_subject','contact_message');
foreach($tab_input as $i)
	$this->form->setFieldAttribute($i,'class','form-control');
/* fin On injecte des classes dans les input */

$captchaSet = $this->params->get('captcha', JFactory::getApplication()->get('captcha', '0'));

foreach (JPluginHelper::getPlugin('captcha') as $plugin)
{
	if ($captchaSet === $plugin->name)
	{
		$captchaEnabled = true;
		break;
	}
}
?>
<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal well">
		<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
			<?php if ($fieldset->name === 'captcha' && !$this->captchaEnabled) : ?>
				<?php continue; ?>
<?php endif; ?>
			<?php $fields = $this->form->getFieldset($fieldset->name); ?>
			<?php if (count($fields)) : ?>
		<fieldset>
					<?php if (isset($fieldset->label) && strlen($legend = trim(JText::_($fieldset->label)))) : ?>
						<legend><?php echo $legend; ?></legend>
			<?php endif; ?>
					<?php foreach ($fields as $field) : ?>
						<?php if ($field->name === 'contact_email_copy' && !$this->params->get('show_email_copy')) : ?>
							<?php continue; ?>
									<?php endif; ?>
						<?php echo $field->renderField(); ?>
					<?php endforeach; ?>
				</fieldset>
				<?php endif; ?>
			<?php endforeach; ?>
		<div class="control-group">
			<div class="controls">
				<button class="btn btn-primary validate margetop" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button><!-- Ajout tmpl -->

				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</div>
	</form>
</div>
