<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 * °version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>
<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post" class="">
<div class="form-inline">
		<div class="form-group">
		<input type="text" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="form-control" />
		</div>
		<button name="Search" onclick="this.form.submit()" class="btn btn-default hasTooltip" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>"><span class="glyphicon glyphicon-search"></span></button>
		<input type="hidden" name="task" value="search" />
		<div class="clearfix"></div>
</div>
<hr>
	<div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)):?>
		<p class="alert alert-info"><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', '<span class="badge badge-info">' . $this->total . '</span>');?></p>
		<?php endif;?>
	</div>
	<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<fieldset class="phrases">
			<legend><?php echo JText::_('COM_SEARCH_FOR');?>
			</legend>
				<div class="checkbox">	
				<?php echo $this->lists['searchphrase']; ?>
				</div>
				<div class="ordering-box">
				<label for="ordering" class="ordering">
					<?php echo JText::_('COM_SEARCH_ORDERING');?>
				</label>
				<?php echo $this->lists['ordering'];?>
				</div>
		</fieldset>
	</div>
	<?php if ($this->params->get('search_areas', 1)) : ?>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<fieldset class="only">
			<legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
			<?php foreach ($this->searchareas['search'] as $val => $txt) :
				$checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
			?>
			<div class="checkbox">
				
			<label for="area-<?php echo $val;?>">
				<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> >
				<?php echo JText::_($txt); ?>
			</label>
			</div>
			<?php endforeach; ?>
			</fieldset>
		</div>
	<?php endif; ?>
	</div>

<?php if ($this->total > 0) : ?>

	<div class="form-limit">
		<label for="limit">
			<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
		</label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>

<?php endif; ?>

</form>
