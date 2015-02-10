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
	$nbmod 				= $attribs['nbmod']; 					// Nombre de module dans la position.
	$modbssize 			= $params->get('bootstrap_size');		// Taille bootstrap defini dans l'administration.
	$modstyle			= $attribs['style'];					// Style du module choisi dans l'admin.
	$modposname			= $attribs['name'];						// Nom de la position du module choisi dans l'admin.
	$paramtmpl_debug	= $attribs['debug'];					// Parametre du debug
	$moduletype			= $module->module;						// type de module.
	$headerLvl 			= $params->get('header_tag');			// niveau de h dans le titre
	$datacontent 		=
	"
					Nbre de module dans la position : <span class='label label-info'>$nbmod</span><br />
					Taille bootstrap dans l'admin : <span class='label label-info'>$modbssize</span><br />
					Style du module : <span class='label label-info'>$modstyle</span><br />
					Nom du module : <span class='label label-info'>$moduletype</span><br />
					Nom de la positiondu module : <span class='label label-info'>$modposname</span>
	";															//Contenu du debug

	// On defini un role pour chaque type de module default joomla.
	//mod_articles_archive				x
	//mod_articles_categories			z							
	//mod_articles_category				z							
	//mod_articles_latest				z							
	//mod_articles_news					z							
	//mod_articles_popular				z			
	//mod_banners						x	
	//mod_breadcrumbs						-		
	//mod_custom						x	
	//mod_feed							x
	//mod_finder							-	
	//mod_footer							-	
	//mod_languages						x
	//mod_login							x
	//mod_menu								-
	//mod_random_image					x		
	//mod_related_items					z		
	//mod_search						x	
	//mod_stats							z
	//mod_syndicate						x	
	//mod_tags_popular					z		
	//mod_tags_similar					z		
	//mod_users_latest					x		
	//mod_weblinks						z	
	//mod_whosonline					z		
	//mod_wrapper						x	


//	if ($moduletype == 'mod_articles_archive' || 'mod_users_latest' || 'mod_wrapper' || 'mod_syndicate' || 'mod_random_image' || 'mod_languages' || 'mod_feed' || 'mod_custom' || 'mod_banner') {
//			$asidemod = 'note'; 			//parenthese au contenu
//	} 
//	elseif ($moduletype ==  'mod_search' || 'mod_menu') {
//
//	    $asidemod = 'search';
//	}
//	else {
//	    $asidemod = 'complementary'; 	//complementaire au contenu
//	}

if (($moduletype == 'mod_articles_archive') || ($moduletype == 'mod_users_latest') || ($moduletype == 'mod_wrapper') || ($moduletype == 'mod_syndicate') || ($moduletype == 'mod_random_image') || ($moduletype == 'mod_languages') || ($moduletype == 'mod_feed') || ($moduletype == 'mod_custom') || ($moduletype == 'mod_banner') ) {
	$activeasidemod = 1;
	$asidemod = 'note';    
} elseif ($moduletype == 'mod_search') {
	$activeasidemod = 1;
	$asidemod = 'search';  
} elseif ($moduletype == 'mod_menu') {
	$activeasidemod = 0; 
} else {
	$activeasidemod = 1;
	$asidemod = 'complementary';  
}
?>

	<?php if ($modbssize != 0) : ?>
		<div class="col-xs-12 col-sm-<?php echo $modbssize; ?> col-md-<?php echo $modbssize; ?> col-lg-<?php echo $modbssize; ?>">
		<?php else : ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php endif; ?>
			<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> ">
				<?php if ($activeasidemod == 1 ): ?>
				<aside role="<?php echo $asidemod; ?>">
				<?php endif ?>
				<?php if ($moduletype == 'mod_menu') {
					echo '<nav role="navigation" aria-labelledby="label<?php echo $module->id;?>">';
				} ?>
					<!-- Titre du module -->
					<?php if ($module->showtitle) : ?> 
						<<?php echo $headerLvl; ?>><span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span></<?php echo $headerLvl;  ?>>
					<?php else : ?>
						<<?php echo $headerLvl; ?> class="sr-only"><span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span></<?php echo $headerLvl;  ?>>	
					<?php endif; ?>

					<!-- Content du module -->
					<div class="modcontent"> 
						<?php echo $module->content; ?>
					</div>
				<?php if ($moduletype == 'mod_menu') {
					echo '</nav>';
				} ?>
				<?php if ($activeasidemod == 1 ): ?>
				</aside>
				<?php endif ?>
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
						<<?php echo $headerLvl;  ?>><span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span></<?php echo $headerLvl; ?>>
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

