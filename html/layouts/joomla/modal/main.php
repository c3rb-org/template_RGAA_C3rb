<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * version J! : 3.4.3 - MIR
 * Modale BS3 - compatible template - !! Attention lors du merge !!
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

// Améliore les performances...
$use_modal_layout = false;

extract($displayData);
/**
 * Layout variables
 * ------------------
 * @param   string  $selector  Unique DOM identifier for the modal. CSS id without #
 * @param   array   $params    Modal parameters. Default supported parameters:
 *                             - title        string   The modal title
 *                             - backdrop     mixed    A boolean select if a modal-backdrop element should be included (default = true)
 *                                                     The string 'static' includes a backdrop which doesn't close the modal on click.
 *                             - keyboard     boolean  Closes the modal when escape key is pressed (default = true)
 *                             - closeButton  boolean  Display modal close button (default = true)
 *                             - animation    boolean  Fade in from the top of the page (default = true)
 *                             - footer       string   Optional markup for the modal footer
 *                             - url          string   URL of a resource to be inserted as an <iframe> inside the modal body
 *                             - height       string   height of the <iframe> containing the remote resource
 *                             - width        string   width of the <iframe> containing the remote resource
 * @param   string  $body      Markup for the modal body. Appended after the <iframe> if the url option is set
 *
 */

$modalClasses = array('modal');

if (!isset($params['animation']) || $params['animation'])
{
	array_push($modalClasses, 'fade');
}

$modalAttributes = array(
	'tabindex' => '-1',
	'class'    => implode(' ', $modalClasses)
);

if (isset($params['backdrop']))
{
	$modalAttributes['data-backdrop'] = (is_bool($params['backdrop']) ? ($params['backdrop'] ? 'true' : 'false') : $params['backdrop']);
}

if (isset($params['keyboard']))
{
	$modalAttributes['data-keyboard'] = (is_bool($params['keyboard']) ? ($params['keyboard'] ? 'true' : 'false') : 'true');
}

if (isset($params['url']))
{
	//$iframeHtml = JLayoutHelper::render('joomla.modal.iframe', $displayData);

	/*JFactory::getDocument()->addScriptDeclaration("
		jQuery(document).ready(function($) {
			$('#" . $selector . "').on('show.bs.modal', function() {
				var modalBody = $(this).find('.modal-body');
				
				// Destroy previous iframe if loaded
				modalBody.find('iframe').remove();

				// Load iframe
				modalBody.prepend('" . trim($iframeHtml) . "');

			});
		});
	");*/
	
	$modalAttributes['data-iframe'] = $params['url'];
	$modalAttributes['data-iframe-width'] = $params['width'];
	$modalAttributes['data-iframe-height'] = $params['height'];
}
?>
<div id="<?php echo $selector; ?>" <?php echo JArrayHelper::toString($modalAttributes); ?> role="dialog" aria-labelledby="<?php echo $selector; ?>Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	<?php
	
		// Header
		if (!isset($params['closeButton']) || isset($params['title']) || $params['closeButton'])
		{
			if($use_modal_layout)
			{
				echo JLayoutHelper::render('joomla.modal.header', $displayData);
			}
			else 
			{
			?>
				<div class="modal-header">
					<?php if (!isset($params['closeButton']) || $params['closeButton']) : ?>
				        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo JText::_('TPL_C3RB_RGAA_LABEL_FERMER_MODALE'); ?>"><span aria-hidden="true">&times;</span></button>
					<?php endif; ?>
					<?php if (isset($params['title'])) : ?>
				        <h2 class="modal-title" id="<?php echo $selector; ?>Label"><?php echo $params['title']; ?></h2>
					<?php endif; ?>
				</div>
				<?php 
			}
		}

		// Body
		if($use_modal_layout)
		{
			echo JLayoutHelper::render('joomla.modal.body', $displayData);
		}
		else 
		{
			$bodyClass = 'modal-body';
			
			$bodyHeight = isset($params['bodyHeight']) ? round((int) $params['bodyHeight'], -1) : '';
			
			if ($bodyHeight && $bodyHeight >= 20 && $bodyHeight < 90)
			{
				$bodyClass .= ' jviewport-height' . $bodyHeight;
			}
			?>
			<div class="<?php echo $bodyClass; ?>">
				<?php echo $body; ?>
			</div>
					
<?php 	}
		// Footer
		if (isset($params['footer']))
		{
			if($use_modal_layout)
			{
				echo JLayoutHelper::render('joomla.modal.footer', $displayData);
			}
			else
			{ ?>
				<div class="modal-footer">
					<?php echo $params['footer']; ?>
				</div>
<?php 		}
		}
	?>
		</div>
	</div>
</div>