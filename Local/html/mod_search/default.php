<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *	°version J! : 3.4.0 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
//JHtml::_('script', 'system/html5fallback.js', false, true); //genere des erreur aria
?>
<!-- Des corrections sont a faire dans le cas ou les options droite gauche au bas sont choisies, par default btn a draoite sans image -->
<div class="search<?php echo $moduleclass_sfx ?>" id="search-lnk">
	<form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline" role="search"><!-- Ajout du role C3rbrgaa -->
			<?php
				$output = '<label for="mod-search-searchword" class="sr-only">' . $label . '</label> ';
				$output .= '<input title="'. $label .'" name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="form-control" type="text" size="' . $width . '" value="' . $text . '"  onblur="if (this.value==\'\') this.value=\'' . $text . '\';" onfocus="if (this.value==\'' . $text . '\') this.value=\'\';" />';
				if ($button) :
					if ($imagebutton) :
						$btn_output = '<input  type="image" value="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
					else :
						$btn_output = '<button class="btn btn-default pull-right" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
					endif;
					switch ($button_pos) :
						case 'top' :
							$output = $btn_output . '<br />' . $output;
							break;
						case 'bottom' :
							$output .= '<br />' . $btn_output;
							break;
						case 'right' :
							$output .= $btn_output;
							break;
						case 'left' :
						default :
							$output = $btn_output . $output;
							break;
					endswitch;
				endif;
				echo $output;
			?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
		
	</form>
	<div class="clearfix"></div>
</div>

