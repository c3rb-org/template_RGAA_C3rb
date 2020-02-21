<?php
defined('_JEXEC') or die;

$c3rbstyle = $this->params->get('c3rbstyle', 'hover');

JHtml::_('stylesheet', 'templates/c3rb_rgaa/html/com_content/category/c3rb_'.$c3rbstyle.'.css', array('version' => 'auto'));
?>

<div class="blog-cards<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">

    <header>
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h2><?php echo $this->escape($this->params->get('page_heading')); ?></h2>
		</div>
	<?php else: ?>
        <h2 class="sr-only">
        <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h2>
	<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h2><?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_category_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title; ?></span>
			<?php endif; ?>
		</h2>
	<?php endif; ?>

	<?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
		<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
	<?php endif; ?>

	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc clearfix">
			<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($this->category->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>"/>
			<?php endif; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	</header>

<?php if (empty($this->intro_items)) : ?>
    <div class="alert alert-warning">Aucun article à afficher</div>
<?php else: ?>
	<?php echo $this->loadTemplate($c3rbstyle); ?>
<?php endif; ?>

<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
    <div class="pagination">
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="counter"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
        <?php endif; ?>
        <?php echo $this->pagination->getPagesLinks(); ?> </div>
<?php endif; ?>

</div>
