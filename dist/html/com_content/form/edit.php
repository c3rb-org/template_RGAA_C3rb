<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die; 

//JHtml::_('behavior.tabstate');
JHtml::_('behavior.keepalive');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidator');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.modal', 'a.modal_jform_contenthistory');

// Create shortcut to parameters.
$params = $this->state->get('params');
//$images = json_decode($this->item->images);
//$urls = json_decode($this->item->urls);

// This checks if the editor config options have ever been saved. If they haven't they will fall back to the original settings.
$editoroptions = isset($params->show_publishing_options);
if (!$editoroptions)
{
	$params->show_urls_images_frontend = '0';
}

JFactory::getDocument()->addScriptDeclaration("
	Joomla.submitbutton = function(task)
	{
		if (task == 'article.cancel' || document.formvalidator.isValid(document.getElementById('adminForm')))
		{
			" . $this->form->getField('articletext')->save() . "
			Joomla.submitform(task);
		}
	}
");

$tab_input = array('title','alias');
foreach($tab_input as $i)
	$this->form->setFieldAttribute($i, 'class', 'form-control');
	
?>

<div class="edit item-page<?php echo $this->pageclass_sfx; ?>">
	<?php if ($params->get('show_page_heading', 1)) : ?>
	<div class="page-header">
		<h1>
			<?php echo $this->escape($params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_content&a_id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
		<hr class="hrlight" />
		<div class="btn-toolbar text-right">
			<button type="button" class="btn btn-default" onclick="Joomla.submitbutton('article.save')">
				<span class="glyphicon glyphicon-ok margeright-s"></span><?php echo JText::_('JSAVE') ?>
			</button>
			<button type="button" class="btn btn-default" onclick="Joomla.submitbutton('article.cancel')">
				<span class="glyphicon glyphicon-cancel"></span><?php echo JText::_('JCANCEL') ?>
			</button>
			<?php if ($params->get('save_history', 0)) : ?>
				<?php echo $this->form->getInput('contenthistory'); ?>
			<?php endif; ?>
		</div>
		<hr class="hrlight" />
		<fieldset>
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation"  class="active">
					<a aria-controls="nom*du*lien" href="#editor" data-toggle="tab" aria-expanded="true"><?php echo JText::_('COM_CONTENT_ARTICLE_CONTENT') ?></a></li>
					<?php if ($params->get('show_urls_images_frontend') ) : ?>
					<li role="presentation" >
					<a aria-controls="nom*du*lien" href="#images" data-toggle="tab" aria-expanded="false"><?php echo JText::_('COM_CONTENT_IMAGES_AND_URLS') ?></a></li>
					<?php endif; ?>
					<li role="presentation" >
					<a aria-controls="nom*du*lien" href="#publishing" data-toggle="tab" aria-expanded="false"><?php echo JText::_('COM_CONTENT_PUBLISHING') ?></a></li>
					<li role="presentation" >
					<a aria-controls="nom*du*lien" href="#language" data-toggle="tab" aria-expanded="false"><?php echo JText::_('JFIELD_LANGUAGE_LABEL') ?></a></li>
					<li role="presentation" >
					<a aria-controls="nom*du*lien" href="#metadata" data-toggle="tab" aria-expanded="false"><?php echo JText::_('COM_CONTENT_METADATA') ?></a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane-noconflictchosen active" id="editor">
						<div class="row margetop margebottom">
							<div class="col-xs-12 col-sm-6">
								<?php echo $this->form->renderField('title'); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?php if (is_null($this->item->id)) : ?>
									<?php echo $this->form->renderField('alias'); ?>
								<?php endif; ?>
							</div>
						</div>
						<?php echo $this->form->getInput('articletext'); ?>
					</div>
					<?php if ($params->get('show_urls_images_frontend')): ?>
					<div role="tabpanel" class="tab-pane-noconflictchosen fade" id="images">
						<?php echo $this->form->renderField('image_intro', 'images'); ?>
						<?php echo $this->form->renderField('image_intro_alt', 'images'); ?>
						<?php echo $this->form->renderField('image_intro_caption', 'images'); ?>
						<?php echo $this->form->renderField('float_intro', 'images'); ?>
						<?php echo $this->form->renderField('image_fulltext', 'images'); ?>
						<?php echo $this->form->renderField('image_fulltext_alt', 'images'); ?>
						<?php echo $this->form->renderField('image_fulltext_caption', 'images'); ?>
						<?php echo $this->form->renderField('float_fulltext', 'images'); ?>
						<?php echo $this->form->renderField('urla', 'urls'); ?>
						<?php echo $this->form->renderField('urlatext', 'urls'); ?>
						<div class="form-group">
							<div class="">
								<?php echo $this->form->getInput('targeta', 'urls'); ?>
							</div>
						</div>
						<?php echo $this->form->renderField('urlb', 'urls'); ?>
						<?php echo $this->form->renderField('urlbtext', 'urls'); ?>
						<div class="form-group">
							<div class="">
								<?php echo $this->form->getInput('targetb', 'urls'); ?>
							</div>
						</div>
						<?php echo $this->form->renderField('urlc', 'urls'); ?>
						<?php echo $this->form->renderField('urlctext', 'urls'); ?>
						<div class="form-group">
							<div class="">
								<?php echo $this->form->getInput('targetc', 'urls'); ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div role="tabpanel" class="tab-pane-noconflictchosen fade" id="publishing">

						<?php echo $this->form->renderField('catid'); ?>

						<?php echo $this->form->renderField('tags'); ?>

						<?php if ($params->get('save_history', 0)) : ?>
							<?php echo $this->form->renderField('version_note'); ?>
						<?php endif; ?>
						<?php echo $this->form->renderField('created_by_alias'); ?>
						<?php if ($this->item->params->get('access-change')) : ?>
							<?php echo $this->form->renderField('state'); ?>
							<?php echo $this->form->renderField('featured'); ?>
							<?php echo $this->form->renderField('publish_up'); ?>
							<?php echo $this->form->renderField('publish_down'); ?>
						<?php endif; ?>
						<?php echo $this->form->renderField('access'); ?>
						<?php if (is_null($this->item->id)):?>
							<div class="form-group">
								<div class="">
								</div>
								<div class="">
									<?php echo JText::_('COM_CONTENT_ORDERING'); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div role="tabpanel" class="tab-pane-noconflictchosen fade" id="language">
						<?php echo $this->form->renderField('language'); ?>
					</div>
					<div role="tabpanel" class="tab-pane-noconflictchosen fade" id="metadata">
						<?php echo $this->form->renderField('metadesc'); ?>
						<?php echo $this->form->renderField('metakey'); ?>

						<input type="hidden" name="task" value="" />
						<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
						<?php if ($this->params->get('enable_category', 0) == 1) :?>
						<input type="hidden" name="jform[catid]" value="<?php echo $this->params->get('catid', 1); ?>" />
						<?php endif; ?>
					</div>
				</div>
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</fieldset>
	</form>
</div>
