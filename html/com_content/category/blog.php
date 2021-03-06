<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 * version 3.6.5
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');
?>
<div class="blog<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
<header><!-- Ajout tmpl -->
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h2><?php echo $this->escape($this->params->get('page_heading')); ?></h2><!-- modif tmpl -->
		</div>
<!-- modif tmpl niveau de titre -->
	<?php else: ?>
			<h2 class="sr-only">
			<?php echo $this->escape($this->params->get('page_heading')); ?>
			</h2>
<!-- FIN modif tmpl -->

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
	</header><!-- Ajout tmpl -->

	<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
		<?php if ($this->params->get('show_no_articles', 1)) : ?>
			<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
<!-- modif tmpl -->
		<div class="items-leading row ">
			<div class="col-sm-12 posinh">
				<?php
				foreach ($this->lead_items as &$item) :
					$imgintro = json_decode($item->images, true);
					if (!empty($imgintro['image_intro'])) {
						$classimgart="hasimgart";
					}
					else {
						$classimgart="hasnoimgart";
					}
				?>
					<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> <?php echo $classimgart; ?>"
						itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
					<article role="main">
						<?php
						$this->item = & $item;
						echo $this->loadTemplate('item');
						?>
					</article>
					</div>
					<?php $leadingcount++; ?>
				<?php endforeach; ?>
			</div>
		</div><!-- end items-leading -->
<!-- FIN modif tmpl -->
	<?php endif; ?>

	<?php
	$introcount = (count($this->intro_items));
	$counter = 0;
	?>

	<?php if (!empty($this->intro_items)) : ?>
<!-- modif tmpl -->
		<?php foreach ($this->intro_items as $key => &$item) :
		$imgintro = json_decode($item->images, true);
					if (!empty($imgintro['image_intro'])) {
						$classimgart="hasimgart";
					}
					else {
						$classimgart="hasnoimgart";
					}
		?>
<!-- FIN modif tmpl -->
				<?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
				<?php if ($rowcount == 1) : ?>
					<?php $row = $counter / $this->columns; ?>
					<div class="items-row cols-<?php echo (int) $this->columns; ?> <?php echo 'row-' . $row; ?> row ">
				<?php endif; ?>
				<div class="col-sm-<?php echo round((12 / $this->columns)); ?> <?php echo $classimgart; ?> posinh">
					<div class="item column-<?php echo $rowcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> <?php echo $classimgart; ?>"
						itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
			<article role="article">
						<?php
						$this->item = & $item;
						echo $this->loadTemplate('item');
						?>
			</article>
					</div>
					<!-- end item -->
					<?php $counter++; ?>
				</div><!-- end span -->
				<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>
					</div><!-- end row -->
				<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<footer><!-- Ajout tmpl -->
			<div class="items-more">
				<?php echo $this->loadTemplate('links'); ?>
			</div>
		</footer><!-- Ajout tmpl -->
	<?php endif; ?>

	<?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
		<div class="cat-children">
			<?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
				<h2><?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?></h2><!-- Ajout tmpl -->
			<?php endif; ?>
			<?php echo $this->loadTemplate('children'); ?> </div>
	<?php endif; ?>
	<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> </div>
	<?php endif; ?>
</div>
