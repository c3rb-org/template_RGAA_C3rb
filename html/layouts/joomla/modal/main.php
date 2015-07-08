<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 * °version J! : 3.4.3 - MIR
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

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

$modalClasses = array('modal', 'hide');

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

/**
 * These lines below are for disabling scrolling of parent window.
 * $('body').addClass('modal-open');
 * $('body').removeClass('modal-open')
 *
 * Specific hack for Bootstrap 2.3.x
 */
$script[] = "jQuery(document).ready(function($) {";
$script[] = "   $('#" . $selector . "').on('show', function() {";
$script[] = "       $('body').addClass('modal-open');";

if (isset($params['url']))
{
	$iframeHtml = JLayoutHelper::render('joomla.modal.iframe', $displayData);

	// Script for destroying and reloading the iframe
	$script[] = "       var modalBody = $(this).find('.modal-body');";
	$script[] = "       modalBody.find('iframe').remove();";
	$script[] = "       modalBody.prepend('" . trim($iframeHtml) . "');";
}

$script[] = "   }).on('hide', function () {";
$script[] = "       $('body').removeClass('modal-open');";
$script[] = "   });";
$script[] = "});";

JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));
?>
<div id="<?php echo $selector; ?>" <?php echo JArrayHelper::toString($modalAttributes); ?> role="dialog" aria-labelledby="<?php echo $selector; ?>Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
	<?php
		// Header
		if (!isset($params['closeButton']) || isset($params['title']) || $params['closeButton'])
		{
			echo JLayoutHelper::render('joomla.modal.header', $displayData);
		}

		// Body
		echo JLayoutHelper::render('joomla.modal.body', $displayData);

		// Footer
		if (isset($params['footer']))
		{
			echo JLayoutHelper::render('joomla.modal.footer', $displayData);
		}
	?>
		</div>
	</div>
</div>
