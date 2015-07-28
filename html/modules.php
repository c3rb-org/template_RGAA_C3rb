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
	$nbmod 						= $attribs['nbmod']; 				// Nombre de module dans la position.
	$modbssize 					= $params->get('bootstrap_size');	// Taille bootstrap defini dans l'administration.
	$modstyle					= $attribs['style'];				// Style du module choisi dans l'admin.
	$modposname					= $attribs['name'];					// Nom de la position du module choisi dans l'admin.
	$paramtmpl_debug			= $attribs['debug'];				// Parametre du debug
	$paramtmpl_tmpltitmodforce 	= $attribs['tmpltitmodforce'];		//Choix forcer les titres des modules
	$moduletype					= $module->module;					// type de module.
	$headerLvl 					= $params->get('header_tag');		// niveau de h dans le titre
	$moduleTag      			= $params->get('module_tag');		// Choix html5 de la balise du module
		
	$datacontent 				=											//Contenu du debug
	"
					Nom de la positiondu module : <span class='label label-info'>$modposname</span><br />
					Nbre de module dans la position : <span class='label label-info'>$nbmod</span><br />
					Taille bootstrap dans l'admin : <span class='label label-info'>$modbssize</span><br />
					Style du module : <span class='label label-info'>$modstyle</span><br />
					Nom du module : <span class='label label-info'>$moduletype</span><br />

	";															

	//Suivant le type du module le aside est different
	if (($moduletype == 'mod_users_latest') || ($moduletype == 'mod_banners') || ($moduletype == 'mod_wrapper') || ($moduletype == 'mod_syndicate') || ($moduletype == 'mod_random_image') || ($moduletype == 'mod_languages') || ($moduletype == 'mod_feed') || ($moduletype == 'mod_custom') || ($moduletype == 'mod_banner') ) {
		$activeasidemod = 1;
		$asidemod = 'note';    
	} elseif (($moduletype == 'mod_search') || ($moduletype == 'mod_finder')) {
		$activeasidemod = 1;
		$asidemod = 'search';  
	} elseif (($moduletype == 'mod_menu') || ($moduletype == 'mod_breadcrumbs')) {
		$activeasidemod = 0; 
	} else {
		$activeasidemod = 1;
		$asidemod = 'complementary';  
	}
?>

	<!-- Taille BS dans l'admin du module -->
	<?php if ($modbssize != 0) : ?>
	<div class="col-xs-12 col-sm-<?php echo $modbssize; ?> col-md-<?php echo $modbssize; ?> col-lg-<?php echo $modbssize; ?>">
	<?php else : ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php endif; ?>
	<!-- Fin taille BS dans l'admin du module -->		

	<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> ">
	
	<!-- Choix de la balise html5 -->
	<?php if (($moduleTag == 'div') || (empty($moduleTag))) : ?>
		<?php if ($activeasidemod == 1 ): ?>
		<aside role="<?php echo $asidemod; ?>">
		<?php endif ?>
			
		<?php if (($moduletype == 'mod_menu') || ($moduletype == 'mod_breadcrumbs')): ?>
		<nav role="navigation" aria-labelledby="label<?php echo $module->id; ?>">
		<?php endif; ?>

	<?php else : ?> 
	<<?php echo $moduleTag; ?>>
	<?php endif; ?>
	<!-- Fin Choix de la balise html5 -->

	<!-- Titre Hn du module -->
	<?php if ($module->showtitle) : ?> 
		<?php if ($paramtmpl_tmpltitmodforce  == 1) : ?>
			<?php echo "<h2>"; ?>
		<?php else : ?>
			<?php
			if ($headerLvl == "") {
				echo "<h3>";
			} else {
			echo "<"; 
			echo $headerLvl; 
			echo ">";				
			}
			?>
		<?php endif; ?>
	<!-- Fin titre du module -->
		<span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span>	
	<!-- Fermeture Hn du module -->
		<?php if ($paramtmpl_tmpltitmodforce  == 1) : ?>
			<?php echo "</h2>"; ?>
		<?php else : ?>
			<?php
			if ($headerLvl == "") {
				echo "</h3>";
			} else {
			echo "</"; 
			echo $headerLvl; 
			echo ">";				
			}
			?>
		<?php endif; ?>
	<?php else : ?>

		<?php if ($paramtmpl_tmpltitmodforce  == 1) : ?>
			<?php echo "<h2 class='sr-only'>"; ?>
		<?php else : ?>
			<<?php echo $headerLvl; ?> class="sr-only">
		<?php endif; ?>
		<span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span>	
		<?php if ($paramtmpl_tmpltitmodforce  == 1) : ?>
			<?php echo "</h2>"; ?>
		<?php else : ?>
			<?php
			if ($headerLvl == "") {
				echo "</h3>";
			} else {
			echo "</"; 
			echo $headerLvl; 
			echo ">";				
			}
			?>
		<?php endif; ?>

	<?php endif; ?>

			<!-- Content du module -->
			<div class="modcontent"> 
				<?php echo $module->content; ?>
			</div>
				
	<!-- Fermeture balise html5 -->
	<?php if (($moduleTag == 'div') || (empty($moduleTag))) : ?>
		<?php if ($activeasidemod == 1 ): ?>
		</aside>
		<?php endif ?>
			
		<?php if (($moduletype == 'mod_menu') || ($moduletype == 'mod_breadcrumbs')): ?>
		</nav>
		<?php endif; ?>

	<?php else : ?> 
	</<?php echo $moduleTag; ?>>
	<?php endif; ?>
	<!-- Fin Fermeture balise html5 -->
 
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

