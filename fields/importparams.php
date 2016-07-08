<?php

class JFormFieldImportparams extends JFormField
{

	protected $type = 'Importparams';

	protected function getInput()
	{
		JFactory::getDocument()->addScript(JURI::root(true).'/templates/c3rb_rgaa/js/admin.js');
		
		$input = JFactory::getApplication()->input;
		$templateId = $input->getInt('id',0);
		
		$html = array();
		$html[] = '<input type="file" name="file_importparams" id="file_importparams" accept=".json" />';
		$html[] = '<button type="button" data-template-id="'.$templateId.'" class="btn btn-default" name="bt_importparams" id="bt_importparams"><i class="icon-upload"></i>'.JText::_('TPL_C3RB_RGAA_EXPORT_FIELD_IMPORT_BT').'</button>';
		
		return implode('', $html);
	}

}
