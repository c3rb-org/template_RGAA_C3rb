<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 * version J! : 3.6.5 - MIR
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<article role="main"><!-- Ajout tmpl -->
<div class="blog-featured<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading') != 0 ) : ?>
	<h2><!-- Ajout tmpl -->
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h2><!-- Ajout tmpl -->
<!-- modif tmpl -->
<?php else: ?>
	<h2 class="sr-only">
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h2>
<!-- FIN modif tmpl -->
<?php endif; ?>

<?php echo $this->loadTemplate('items'); ?>
<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
	<div class="pagination">

		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		<?php  endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
<?php endif; ?>
</article><!-- Ajout tmpl -->

</div>
