<?php

class JFormFieldExportparams extends JFormField
{

	protected $type = 'Exportparams';

	protected function getInput()
	{
		$currentUrl =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$export_url = $currentUrl . '&rgaac3rbtask=export';

		$html = array();
		$html[] = '<a class="btn btn-default" href="'.$export_url.'"><i class="icon-download"></i>'.JText::_('TPL_C3RB_RGAA_EXPORT_FIELD_EXPORT_BT').'</a>';
		
		return implode('', $html);
	}

}
