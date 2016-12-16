<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 * version J! : 3.6.5 - MIR
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('formbehavior.chosen', 'select');
?>
<div class="search<?php echo $this->pageclass_sfx; ?>">

<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h2 class="page-title">
	<?php if ($this->escape($this->params->get('page_heading'))) :?>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	<?php else : ?>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	<?php endif; ?>
</h2>
<?php else: ?>
<h2 class="sr-only">
	<?php if ($this->escape($this->params->get('page_heading'))) :?>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	<?php else : ?>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	<?php endif; ?>
</h2>

<?php endif; ?>

<?php echo $this->loadTemplate('form'); ?>

<?php if ($this->error == null && count($this->results) > 0) :
	echo $this->loadTemplate('results');
else :
	echo $this->loadTemplate('error');
endif; ?>
</div>
