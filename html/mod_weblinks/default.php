<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="list-group weblinks<?php echo $moduleclass_sfx; ?>">
	<?php
	foreach ($list as $item) :
		?>
		<li class="list-group-item">
			
				
			<?php
			$link = $item->link;
			echo '<div class="row">';
			echo '<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">';
			switch ($params->get('target', 3))
			{
				case 1:
					// Open in a new window
					echo '<a href="' . $link . '" target="_blank" rel="' . $params->get('follow', 'nofollow') . '">' .
						htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') . '</a>';
					break;

				case 2:
					// Open in a popup window
					echo "<a href=\"#\" onclick=\"window.open('" . $link . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\">" .
						htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') . '</a>';
					break;

				default:
					// Open in parent window
					echo '<a href="' . $link . '" rel="' . $params->get('follow', 'nofollow') . '">' .
						htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') . '</a>';
					break;
			}

			if ($params->get('description', 0))
			{
				echo nl2br($item->description);
			}
			echo '</div>';
			echo '<div>';

			if ($params->get('hits', 0))
			{
				echo '<div class="label label-default" data-toggle="tooltip" data-placement="top" title="' . JText::_('TPL_RGAAC3RB_LNKWEB_CLIK') . '">'; 
				echo '' . $item->hits . '';
				echo '';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			?>
			
		</li>
	<?php
	endforeach;
	?>
</ul>
