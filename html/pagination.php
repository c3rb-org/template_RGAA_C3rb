<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
/**
 * Renders the pagination footer
 *
 * @param   array   $list  Array containing pagination footer
 *
 * @return  string         HTML markup for the full pagination footer
 *
 * @since   3.0
 */
function pagination_list_footer($list)
{

	$html = "<nav role=\"navigation\"><div class=\"pagination\">\n";
	$html .= $list['pageslinks'];
	$html .= "\n<input type=\"hidden\" name=\"" . $list['prefix'] . "limitstart\" value=\"" . $list['limitstart'] . "\" />";
	$html .= "\n</div></nav>";

	return $html;
}

/**
 * Renders the pagination list
 *
 * @param   array   $list  Array containing pagination information
 *
 * @return  string         HTML markup for the full pagination object
 *
 * @since   3.0
 */

function pagination_list_render($list)
{

	// Calculate to display range of pages
	$currentPage = 1;
	$range = 1;
	$step = 5;
	if(JFactory::getApplication()->input->get('layout') == 'vignette')
		$step = 12;

	foreach ($list['pages'] as $k => $page)
	{
		if (!$page['active'])
		{
			$currentPage = $k;
		}
	}
	if ($currentPage >= $step)
	{
		if ($currentPage % $step == 0)
		{
			$range = ceil($currentPage / $step) + 1;
		}
		else
		{
			$range = ceil($currentPage / $step);
		}
	}


	$html = array();
	$html[] = '<div class="pagination">';
	$html[] = '<div class="pagination-page text-left">';
	$html[] = '<div class="btn-group">';
	$html[] = $list['start']['data'];
	$html[] = $list['previous']['data'];

	$html[]= '
	<div class="dropdown btn btn-default pagi">
	<nav role="navigation" aria-label="Pagination">
	<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Page '.$currentPage .'<span class="caret"></span></button>
	<ul class="dropdown-menu">';

	foreach ($list['pages'] as $k => $page)
	{
		if (in_array($k, range($range * $step - ($step + 1), $range * $step)))
		{
			if (($k % $step == 0 || $k == $range * $step - ($step + 1)) && $k != $currentPage && $k != $range * $step - $step)
			{
				$page['data'] = preg_replace('#(<a.*?>).*?(</a>)#', '$1...$2', $page['data']);
			}
		}

		$html[] = $page['data'];
	}

	$html[] = '</ul></nav></div>';
	$html[] = $list['next']['data'];
	$html[] = $list['end']['data'];
	$html[] = '</div>';
	$html[] = '</div>';
	$html[] = '</div>';
	return implode('',$html);
}

function pagination_item_active(&$item)
{
	$display = '';
	$title = '';

	switch($item->text)
	{
		case JText::_('JLIB_HTML_START'):
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PREM_PAGE') .'</span><span aria-hidden="true" class="glyphicon glyphicon-fast-backward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_PREM_PAGE');
			break;

		case JText::_('JPREV'):
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PREC_PAGE') .'</span><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_PREC_PAGE');
			break;

		case JText::_('JNEXT'):
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PAGE_SUIV') .'</span><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_PAGE_SUIV');
			break;

		case JText::_('JLIB_HTML_END'):
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_DER_PAGE') .'</span><span aria-hidden="true" class="glyphicon glyphicon-fast-forward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_DER_PAGE');
			break;

		default :
			return '<li><a href="' . $item->link . '" title="'. JText::_('TPL_C3RB_RGAA_ACCES_PAGE') .' '. $item->text . '" class="btn btn-default hidden-phone">' . $item->text . '</a></li>';
	}

	return '<a href="' . $item->link . '" title="'.$title.'" class="btn btn-default hidden-phone">' . $display . '</a>';
}

/**
 * Renders an inactive item in the pagination block
 *
 * @param   JPaginationObject  $item  The current pagination object
 *
 * @return  string  HTML markup for inactive item
 *
 * @since   3.0
 */
function pagination_item_inactive(&$item)
{
	// Check for "Start" item
	if ($item->text == JText::_('JLIB_HTML_START'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="First"><span aria-hidden="true" class="glyphicon glyphicon-fast-backward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PREM_PAGE') .'</span></a>';
	}

	// Check for "Prev" item
	if ($item->text == JText::_('JPREV'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="Previous"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PREC_PAGE') .'</span></a>';
	}

	// Check for "Next" item
	if ($item->text == JText::_('JNEXT'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="Next"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PAGE_SUIV') .'</span></a>';
	}

	// Check for "End" item
	if ($item->text == JText::_('JLIB_HTML_END'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="End"><span aria-hidden="true" class="glyphicon glyphicon-fast-forward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_DER_PAGE') .'</span></a>';
	}

	// Check if the item is the active page
	if (isset($item->active) && ($item->active))
	{
		return '<li class="active hidden-phone"><a href="#">' . $item->text . '</a></li>';
	}

	// Doesn't match any other condition, render a normal item
	return '<li class="disabled hidden-phone"><a href="#">' . $item->text . '</a></li>';
}
