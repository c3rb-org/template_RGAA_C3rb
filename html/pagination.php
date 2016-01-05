<?php
defined('_JEXEC') or die;

function pagination_list_footer($list)
{
	$html = array();
	$html[] = '<nav role="navigation">';
	$html[] = '<div class="pagination">';
	$html[] = $list['pageslinks'];
	$html[] = '<input type="hidden" name="'.$list['prefix'].'limitstart" value="'.$list['limitstart'].'" />';
	$html[] = '</nav>';
	$html[] = '</div>';
	return implode('',$html);
}

function pagination_list_render($list)
{
	$currentPage = 1;
		
	foreach ($list['pages'] as $k => $page)
	{
		if (!$page['active'])
		{
			$currentPage = $k;
		}
	}
	
	$html = array();
	$html[] = '<div class="pagination">';
	$html[] = '<div class="pagination-page text-left">';
	$html[] = '<div class="btn-group">';
	$html[] = '<nav role="navigation" aria-label="Pagination">';
	$html[] = $list['start']['data'];
	$html[] = $list['previous']['data'];

	$html[] = '<div class="dropdown btn btn-default pagi">';
	$html[] = '<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Page '.$currentPage .'<span class="caret"></span></button>';
	$html[] = '<ul class="dropdown-menu">';

	foreach ($list['pages'] as $k => $page)
	{
		$html[] = $page['data'];
	}

	$html[] = '</ul></div>';
	$html[] = $list['next']['data'];
	$html[] = $list['end']['data'];
	$html[] = '</div></nav>';
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
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PAGE_PREM_SR') .'</span><span aria-hidden="true" class="glyphicon glyphicon-fast-backward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_PAGE_PREM');
			break;

		case JText::_('JPREV'):
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PAGE_PREC_SR') .'</span><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_PAGE_PREC');
			break;

		case JText::_('JNEXT'):
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PAGE_SUIV_SR') .'</span><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_PAGE_SUIV');
			break;

		case JText::_('JLIB_HTML_END'):
			$display = '<span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PAGE_DER_SR') .'</span><span aria-hidden="true" class="glyphicon glyphicon-fast-forward"></span>';
			$title = JText::_('TPL_C3RB_RGAA_PAGE_DER');
			break;

		default :
			return '<li><a href="' . $item->link . '" class="btn btn-default hidden-phone"><span class="sr-only">'.JText::_('TPL_C3RB_RGAA_PAGE_ACCES').'</span>' . $item->text . '</a></li>';
	}

	return '<a href="' . $item->link . '" title="'.$title.'" class="btn btn-default hidden-phone hasTooltip">' . $display . '</a>';
}

function pagination_item_inactive(&$item)
{
	if ($item->text == JText::_('JLIB_HTML_START'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="First"><span aria-hidden="true" class="glyphicon glyphicon-fast-backward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PREM_PAGE') .'</span></a>';
	}

	if ($item->text == JText::_('JPREV'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="Previous"><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PREC_PAGE') .'</span></a>';
	}

	if ($item->text == JText::_('JNEXT'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="Next"><span aria-hidden="true" class="glyphicon glyphicon-step-forward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_PAGE_SUIV') .'</span></a>';
	}

	if ($item->text == JText::_('JLIB_HTML_END'))
	{
		return '<a class="btn btn-default disabled" href="#" aria-label="End"><span aria-hidden="true" class="glyphicon glyphicon-fast-forward"></span><span class="sr-only">'. JText::_('TPL_C3RB_RGAA_DER_PAGE') .'</span></a>';
	}

	if (isset($item->active) && ($item->active))
	{
		return '<li class="active hidden-phone"><a href="#">' . $item->text . '</a></li>';
	}

	return '<li class="disabled hidden-phone"><a href="#">' . $item->text . '</a></li>';
}
