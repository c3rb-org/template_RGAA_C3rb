<?php  
/*--------- ---------------------------------------------------------------
# author    C3rb informatique
# copyright Copyright (C) 2013 c3rb.net All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.c3rb.fr
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;



// Module standard avec integration taille bootstrap admin joomla
function modChrome_CrbXhtml($module, &$params, &$attribs) { 
	?> 
	<?php
	//Variable utiles
	$nbmod 				= $attribs['nbmod']; 					// Nombre de module dans la position
	$modbssize 			= $params->get('bootstrap_size');		// Taille bootstrap defini dans l'administration
	$modstyle			= $attribs['style'];					// Style du module choisi dans l'admin
	$modposname			= $attribs['name'];						// Nom de la position du module choisi dans l'admin
	$paramtmpl_debug	= $attribs['debug'];
	
	$datacontent =
	"
					Nbre de module dans la position : <span class='label label-info'>$nbmod</span><br />
					Taille bootstrap dans l\'admin : <span class='label label-info'>$modbssize</span><br />
					Style du module : <span class='label label-info'>$modstyle</span><br />
					Nom de la positiondu module : <span class='label label-info'>$modposname</span>
	"
	?>

	<?php if ($modbssize != 0) : ?>
		<div class="col-xs-12 col-sm-<?php echo $modbssize; ?> col-md-<?php echo $modbssize; ?> col-lg-<?php echo $modbssize; ?>">
		<?php else : ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php endif; ?>
			<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> ">
				<!-- Titre du module -->
				<?php if ($module->showtitle) : ?> 
					<h3><span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span></h3>
				<?php endif; ?>
				<!-- Content du module -->
				<div class="modcontent">    
					<?php echo $module->content; ?>
				</div>
			</div>
			<?php if ($paramtmpl_debug == 1) : ?>	
			<a tabindex="0" class="btn btn-sm btn-warning" role="button" data-html="true" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Paramètre du template" 
			data-content="<?php echo $datacontent; ?>">
			<i class="fa fa-cubes"></i>
			</a>
			<?php endif; ?>
		</div>
		<?php
	}
function modChrome_CrbXhtmlElastic($module, &$params, &$attribs) { 
	?> 
	<?php
	//Variable utiles
	$nbmod 		= $attribs['nbmod']; 					// Nombre de module dans la position
	$modbssize 	= $params->get('bootstrap_size');		// Taille bootstrap defini dans l'administration
	$modstyle	= $attribs['style'];					// Style du module choisi dans l'admin
	$modposname	= $attribs['name'];						// Nom de la position du module choisi dans l'admin
	$colbsauto	= 12/$nbmod;							// calcul auto de la taille bs 
	?>

			<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> ">
				<div class="col-xs-12 col-sm-<?php echo $colbsauto; ?> col-md-<?php echo $colbsauto; ?> col-lg-<?php echo $colbsauto; ?>">
					<!-- Titre du module -->
					<?php if ($module->showtitle) : ?> 
						<h3><span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span></h3>
					<?php endif; ?>
					<!-- Content du module -->
					<div class="modcontent">    
						<?php echo $module->content; ?>
					</div>
					<div class="alert alert-info">
						Nbre de module dans la position : <?php echo $nbmod; ?> <br /> 
						Taille bootstrap dans l'admin : <?php echo $modbssize; ?> <br />
						Style du module : <?php echo $modstyle; ?> <br />
						Nom de la positiondu module : <?php echo $modposname; ?>
					</div>
				</div>		
			</div>
		<?php
	}

