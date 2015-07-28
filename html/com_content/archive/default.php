<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * °version 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.caption');
?>

<div class="archive<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading')) : ?>
<div class="page-header">
<h2>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h2>
</div>
<?php else: ?>
<h2 class="sr-only">
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h2>
<?php endif; ?>
<form id="adminForm" action="<?php echo JRoute::_('index.php')?>" method="post" class="form-inline">
	<div class="clearfix"></div>
	<fieldset class="filters">
	<div class="row filter-search">

		<?php if ($this->params->get('filter_field') != 'hide') : ?>
		<label class="filter-search-lbl element-invisible" for="filter-search"><?php echo JText::_('COM_CONTENT_TITLE_FILTER_LABEL') . '&#160;'; ?></label>
		<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="inputbox span2" onchange="document.getElementById('adminForm').submit();" placeholder="<?php echo JText::_('COM_CONTENT_TITLE_FILTER_LABEL'); ?>" />
		<?php endif; ?>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<?php echo $this->form->monthField; ?>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<?php echo $this->form->yearField; ?>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<?php echo $this->form->limitField; ?>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<button type="submit" class="btn btn-sm btn-default" style="vertical-align: top;"><?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?></button>
		</div>
		<input type="hidden" name="view" value="archive" />
		<input type="hidden" name="option" value="com_content" />
		<input type="hidden" name="limitstart" value="0" />
	</div>
	<br />
	</fieldset>

	<?php echo $this->loadTemplate('items'); ?>

</form>
</div>
