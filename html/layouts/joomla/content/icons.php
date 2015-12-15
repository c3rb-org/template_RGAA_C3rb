<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * °version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('JPATH_BASE') or die;
$canEdit = $displayData['params']->get('access-edit');

//On redefini la function pour une gestion correcte des titles
//https://github.com/joomla/joomla-cms/issues/8694  --- Check for update
function rgaa_email($article, $params, $attribs = array(), $legacy = false)
{
	require_once JPATH_SITE . '/components/com_mailto/helpers/mailto.php';
	$uri      = JUri::getInstance();
	$base     = $uri->toString(array('scheme', 'host', 'port'));
	$template = JFactory::getApplication()->getTemplate();
	$link     = $base . JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language), false);
	$url      = 'index.php?option=com_mailto&tmpl=component&template=' . $template . '&link=' . MailToHelper::addLink($link);
	$status = 'width=400,height=350,menubar=yes,resizable=yes';
	if ($params->get('show_icons'))
	{
		if ($legacy)
		{
			$text = JHtml::_('image', 'system/emailButton.png', JText::_('JGLOBAL_EMAIL'), null, true);
		}
		else
		{
			$text = '<span class="icon-envelope"></span>' . JText::_('JGLOBAL_EMAIL');
		}
	}
	else
	{
		$text = JText::_('JGLOBAL_EMAIL');
	}
	$attribs['title']   = JText::_('TPL_C3RB_RGAA_ARTICLE_EMAIL_TITLE');
	$attribs['onclick'] = "window.open(this.href,'win2','" . $status . "'); return false;";
	$attribs['rel']     = 'nofollow';
	$output = JHtml::_('link', JRoute::_($url), $text, $attribs);
	return $output;
}

function rgaa_print_popup($article, $params, $attribs = array(), $legacy = false)
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$request = $input->request;
		$url  = ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language);
		$url .= '&tmpl=component&print=1&layout=default&page=' . @ $request->limitstart;
		$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no';
		// Checks template image directory for image, if non found default are loaded
		if ($params->get('show_icons'))
		{
			if ($legacy)
			{
				$text = JHtml::_('image', 'system/printButton.png', JText::_('JGLOBAL_PRINT'), null, true);
			}
			else
			{
				$text = '<span class="icon-print"></span>' . JText::_('JGLOBAL_PRINT');
			}
		}
		else
		{
			$text = JText::_('JGLOBAL_PRINT');
		}
		$attribs['title']   = JText::_('TPL_C3RB_RGAA_ARTICLE_PRINT_TITLE');
		$attribs['onclick'] = "window.open(this.href,'win2','" . $status . "'); return false;";
		$attribs['rel']     = 'nofollow';
		return JHtml::_('link', JRoute::_($url), $text, $attribs);
	}

?>

<div class="clearfix"></div>
<div class="icons">
	<?php if (empty($displayData['print'])) : ?>
		<?php if ($canEdit || $displayData['params']->get('show_print_icon') || $displayData['params']->get('show_email_icon')) : ?>
			<div class="btn-group pull-right">
				<a title="<?php echo JText::_('TPL_C3RB_RGAA_ARTICLE_OUTIL_OPEN'); ?>" class="btn btn-default dropdown-toggle hasTooltip" data-toggle="dropdown" href="#">
				<span class="glyphicon glyphicon-cog"></span>
				<span class="sr-only"><?php echo JText::_('TPL_C3RB_RGAA_ARTICLE_OUTIL'); ?></span>
				</a>

				<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
				<ul class="dropdown-menu">
					<?php if ($displayData['params']->get('show_print_icon')) : ?>
						<li class="print-icon"> 
						<?php //joomla code -- echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?>
						<?php echo rgaa_print_popup($displayData['item'], $displayData['params']); ?>
						</li>
					<?php endif; ?>
					<?php if ($displayData['params']->get('show_email_icon')) : ?>
						<li class="email-icon">
							<?php echo rgaa_email($displayData['item'], $displayData['params']); ?>
						</li>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $displayData['item'], $displayData['params']); ?> </li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>
	<?php else : ?>
		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $displayData['item'], $displayData['params']); ?>
		</div>
	<?php endif; ?>
</div>
