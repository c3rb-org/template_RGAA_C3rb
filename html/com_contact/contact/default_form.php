<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * °version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

/* On injecte des classes dans les input */
$tab_input = array('contact_name','contact_email','contact_subject','contact_message');
foreach($tab_input as $i)
	$this->form->setFieldAttribute($i,'class','form-control');
/* fin On injecte des classes dans les input */



if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>

<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal">
		<fieldset>
			<legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>
			<div class="form-group">
				<div class="col-xs-12 col-sm-2"><?php echo $this->form->getLabel('contact_name'); ?></div>
				<div class="col-xs-12 col-sm-10"><?php echo $this->form->getInput('contact_name'); ?></div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-2"><?php echo $this->form->getLabel('contact_email'); ?></div>
				<div class="col-xs-12 col-sm-10"><?php echo $this->form->getInput('contact_email'); ?></div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-2"><?php echo $this->form->getLabel('contact_subject'); ?></div>
				<div class="col-xs-12 col-sm-10"><?php echo $this->form->getInput('contact_subject'); ?></div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-2 "><?php echo $this->form->getLabel('contact_message'); ?></div>
				<div class="col-xs-12 col-sm-10"><?php echo $this->form->getInput('contact_message'); ?></div>
			</div>
			<?php if ($this->params->get('show_email_copy')) : ?>
				<div class="form-group">
					<div class="col-sm-offset-2 col-xs-12 col-sm-1"><?php echo $this->form->getInput('contact_email_copy'); ?></div>
					<div class="col-xs-12 col-sm-6"><?php echo $this->form->getLabel('contact_email_copy'); ?></div>
				</div>
			<?php endif; ?>
			<?php // Dynamically load any additional fields from plugins. ?>
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
				<?php if ($fieldset->name != 'contact') : ?>
					<?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php foreach ($fields as $field) : ?>
						<div class="form-group">
							<?php if ($field->hidden) : ?>
								<div class="col-xs-12 col-sm-10">
									<?php echo $field->input; ?>
								</div>
							<?php else: ?>
		
									<?php echo $field->label; ?>
									<?php if (!$field->required && $field->type != "Spacer") : ?>
										<span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL'); ?></span>
									<?php endif; ?>
								
								<div class="col-xs-12 col-sm-10"><?php echo $field->input; ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?>
			<div class="form-actions">
				<button class="btn btn-primary validate" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</fieldset>
	</form>
</div>
