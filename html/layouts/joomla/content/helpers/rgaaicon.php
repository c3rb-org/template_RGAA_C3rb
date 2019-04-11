<?php
abstract class JHtmlRgaaicon
{
	public static function email($article, $params, $attribs = array(), $legacy = false)
	{
                require_once JPATH_SITE . '/components/com_mailto/helpers/mailto.php';
		$uri      = JUri::getInstance();
		$base     = $uri->toString(array('scheme', 'host', 'port'));
		$template = JFactory::getApplication()->getTemplate();
                
                if(isset($article->repetitions))
                {
                        JLoader::register('C3rbevenementHelperRoute', JPATH_ROOT . '/components/com_c3rbevenement/helpers/route.php');
                        $link = $base . JRoute::_(C3rbevenementHelperRoute::getEventRoute($article->id.':'.$article->alias, $article->catid, $article->language), false);
                }
                else 
                {
                        $link = $base . JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language), false);
                }
                
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
	
	public static function print_popup($article, $params, $attribs = array(), $legacy = false)
	{
                $app = JFactory::getApplication();
		$input = $app->input;
		$request = $input->request;
                
                if(isset($article->repetitions))
                {
                        JLoader::register('C3rbevenementHelperRoute', JPATH_ROOT . '/components/com_c3rbevenement/helpers/route.php');
                        $url = C3rbevenementHelperRoute::getEventRoute($article->id.':'.$article->alias, $article->catid, $article->language);
                        $url .= '&tmpl=component&print=1';
                }
                else
                {
                        $url  = ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language);
                        $url .= '&tmpl=component&print=1&layout=default&page=' . @ $request->limitstart;
                }
                
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
	
	
}