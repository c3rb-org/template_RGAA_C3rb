<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 * @version J! : 3.6 - MIR
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="category-module<?php echo $moduleclass_sfx; ?>"><!-- Pas de liste C3rbrgaa -->
	<?php if ($grouped) : ?>
		<?php foreach ($list as $group_name => $group) : ?>
		<article role="article"><!-- HTML5 C3rbrgaa -->
			<div><!-- Pas de liste C3rbrgaa -->
				<?php foreach ($group as $item) : ?>
					<div><!-- Pas de liste C3rbrgaa -->
						<?php if ($params->get('link_titles') == 1) : ?>
							<header><!-- systeme hx C3rbrgaa -->
								<h2>
									<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
									<?php echo $item->title; ?>
									</a>
								</h2>
							
						<?php else : ?>
							<header>
								<h2><!-- systeme hx C3rbrgaa -->
								<?php echo $item->title; ?>
								</h2>
							
						<?php endif; ?>
						<?php if ( ($item->displayHits)||($params->get('show_author'))||($item->displayCategoryTitle)||($item->displayDate) ) : ?>
						<address>
						<div class="article-info-mod-cat"><!-- On armonise en css pour les affichages des details = aux affichages sur un article -->
						<?php endif ?>	
						<?php if ($item->displayHits) : ?>
							<span class="mod-articles-category-hits">
							<meta content="UserPageVisits:<?php echo $item->displayHits; ?>" itemprop="interactionCount"><!-- C3rbrgaa itemprop -->
								<?php echo $item->displayHits; ?>
							</span>
						<?php endif; ?>
	
						<?php if ($params->get('show_author')) : ?>
							<span class="mod-articles-category-writtenby" itemprop="name" ><!-- C3rbrgaa itemprop  -->
								<?php echo $item->displayAuthorName; ?>
							</span>
						<?php endif;?>
						<?php if ($item->displayCategoryTitle) : ?>
							<span class="mod-articles-category-category">
							<a href="<?php echo $item->displayCategoryLink; ?>" itemprop="genre"><?php echo $item->category_title; ?></a><!-- modifie pour les microformat C3rbrgaa itemprop -->
							</span>
						<?php endif; ?>
	
						<?php if ($item->displayDate) : ?>
							<span class="mod-articles-category-date">
								<time datetime="<?php echo $item->displayDate; ?>" itemprop="dateCreated"><!-- Le format de datetime est pas au top pour les microformats -->
									<?php echo $item->displayDate; ?>
								</time>
							</span>
						<?php endif; ?>
						<?php if ( ($item->displayHits)||($params->get('show_author'))||($item->displayCategoryTitle)||($item->displayDate) ) : ?><!-- C3rbrgaa balisage html5 -->
						</div>
						</address>
						<?php endif ?>
						</header>
						<?php if ($params->get('show_introtext')) : ?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>
	
						<?php if ($params->get('show_readmore')) : ?>
							<footer>
							<p class="mod-articles-category-readmore">
								<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
									<?php if ($item->params->get('access-view') == false) : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
									<?php elseif ($readmore = $item->alternative_readmore) : ?>
										<?php echo $readmore; ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php if ($params->get('show_readmore_title', 0) != 0) : ?>
												<?php echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit')); ?>
											<?php endif; ?>
									<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
										<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
									<?php else : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
										<?php echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit')); ?>
									<?php endif; ?>
								</a>
							</p>
							</footer>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</article>
		<?php endforeach; ?>
	
	<?php else : ?>
		<?php foreach ($list as $item) : ?>
		<article role="article">
			<div><!-- Pas de liste C3rbrgaa -->
				<header>
				<?php if ($params->get('link_titles') == 1) : ?>
					<h2>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<?php echo $item->title; ?>
						</a>
					</h2>
				<?php else : ?>
					<h2><?php echo $item->title; ?></h2><!-- systeme hx C3rbrgaa -->
				<?php endif; ?>
				</header>

				<?php if ( ($item->displayHits)||($params->get('show_author'))||($item->displayCategoryTitle)||($item->displayDate) ) : ?>
				<address>
				<div class="article-info-mod-cat"><!-- On armonise en css pour les affichages des details = aux affichages sur un article -->
				<?php endif ?>
				<?php if ($item->displayHits) : ?>
					<span class="mod-articles-category-hits">
					<meta content="UserPageVisits:<?php echo $item->displayHits; ?>" itemprop="interactionCount"> <!-- C3rbrgaa itemprop -->
						<?php echo $item->displayHits; ?>
					</span>
				<?php endif; ?>
	
				<?php if ($params->get('show_author')) : ?>
					<span class="mod-articles-category-writtenby" itemprop="name" >
						<?php echo $item->displayAuthorName; ?>
					</span>
				<?php endif;?>
	
				<?php if ($item->displayCategoryTitle) : ?>
					<span class="mod-articles-category-category">
						<a href="<?php echo $item->displayCategoryLink; ?>" itemprop="genre"><?php echo $item->category_title; ?></a><!-- modifie pour les microformat -->
					</span>
				<?php endif; ?>
	
				<?php if ($item->displayDate) : ?>
					<span class="mod-articles-category-date">
					<time datetime="<?php echo $item->displayDate; ?>" itemprop="dateCreated"><!-- Le format de datetime est pas au top pour les microformats -->
						<?php echo $item->displayDate; ?>
					</time>
					</span>
				<?php endif; ?>
				<?php if ( ($item->displayHits)||($params->get('show_author'))||($item->displayCategoryTitle)||($item->displayDate) ) : ?><!-- systeme balise html5 C3rbrgaa -->
				</div>
				</address>
				<?php endif ?>
				</header>
				<?php if ($params->get('show_introtext')) : ?>
					<p class="mod-articles-category-introtext">
						<?php echo $item->displayIntrotext; ?>
					</p>
				<?php endif; ?>
	
				<?php if ($params->get('show_readmore')) : ?>
				 <footer>
					<p class="mod-articles-category-readmore">
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php if ($item->params->get('access-view') == false) : ?>
								<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
							<?php elseif ($readmore = $item->alternative_readmore) : ?>
								<?php echo $readmore; ?>
								<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
							<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
								<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
							<?php else : ?>
								<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
								<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
							<?php endif; ?>
						</a>
					</p>
				</footer>
				<?php endif; ?>
			</div>
		</article>
		<?php endforeach; ?>
	<?php endif; ?>
</div>