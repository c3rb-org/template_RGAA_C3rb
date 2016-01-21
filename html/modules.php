<?php
/*--------- ---------------------------------------------------------------
# author    C3rb informatique
# copyright Copyright (C) 2016 c3rb.net All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.c3rb.fr
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

function getAsideModule($moduleType)
{
	$tabNotActive = array('mod_menu', 'mod_breadcrumbs');
	$tabSideMod = array(
	    'mod_users_latest' => 'note', 'mod_banners' => 'note', 'mod_wrapper' => 'note',
	    'mod_syndicate' => 'note', 'mod_random_image' => 'note', 'mod_random_image' => 'note',
	    'mod_languages' => 'note', 'mod_feed' => 'note', 'mod_custom' => 'note','mod_banner' => 'note',
	    'mod_search' => 'search', 'mod_finder' => 'search',
	    'mod_menu' => null, 'mod_breadcrumbs' => null
	);
	
	$activeasidemod = 1;
	if(in_array($moduleType, $tabNotActive) == true)
	{
		$activeasidemod = 0;
	}
	
	$asidemod = 'complementary';
	if(array_key_exists($moduleType, $tabSideMod) == true)
	{
		$asidemod = $tabSideMod[$moduleType];
	}
		
	return array($activeasidemod, $asidemod);
}

function getDebugInfos($moduleType, $params, $attribs)
{
	$debug= array_key_exists('debug', $attribs) ? $attribs['debug'] : 0;
	if($debug == 0)
		return '';
	
	$modposname = array_key_exists('name', $attribs) ? $attribs['name'] : 'Non spécifié';	
	$nbmod 	= array_key_exists('nbmod', $attribs) ? $attribs['nbmod'] : 'Non spécifié';	
	$modstyle = array_key_exists('style', $attribs) ? $attribs['style'] : 'Non spécifié';	
	
	$modbssize = $params->get('bootstrap_size');
	
	$infos 	=					
	"
		Nom de la positiondu module : <span class='label label-info'>$modposname</span><br />
		Nbre de module dans la position : <span class='label label-info'>$nbmod</span><br />
		Taille bootstrap dans l'admin : <span class='label label-info'>$modbssize</span><br />
		Style du module : <span class='label label-info'>$modstyle</span><br />
		Nom du module : <span class='label label-info'>$moduleType</span><br />
	";
	
	$html = array();
	$html[] = '<a tabindex="0" class="btn btn-sm btn-warning" role="button" data-html="true" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Paramètre du template"
			   data-content="'.$infos.'">';
	$html[] = '<i class="fa fa-cubes"></i>';
	$html[] = '</a>';
	
	return implode('', $html);
}


/* Module standard avec integration taille bootstrap admin joomla */
 function modChrome_CrbXhtml($module, &$params, &$attribs) 
{
	/* Choix forcer les titres des modules */
	$paramtmpl_tmpltitmodforce 	= array_key_exists('tmpltitmodforce', $attribs) ? $attribs['tmpltitmodforce'] : 0; 
	
	/* Type de module */
	$moduletype			= $module->module;			
	/* Niveau de h dans le titre */
	$headerLvl 			= $params->get('header_tag');		
	/* Choix html5 de la balise du module */
	$moduleTag      		= $params->get('module_tag');		
	$header_class			= $params->get('header_class');
	/* Taille bootstrap defini dans l'administration. */
	$modbssize			= $params->get('bootstrap_size');	
		
	list($activeasidemod, $asidemod) = getAsideModule($moduletype);
?>
	<?php /* Taille BS dans l'admin du module */ ?>
	<?php if ($modbssize != 0) : ?>
	<div class="col-xs-12 col-sm-<?php echo $modbssize; ?> col-md-<?php echo $modbssize; ?> col-lg-<?php echo $modbssize; ?> <?php echo $header_class; ?>">
	<?php else : ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $header_class; ?>">
	<?php endif; ?>
	<?php /* Fin taille BS dans l'admin du module */ ?>

	<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">

	<?php /* Choix de la balise html5 */ ?>
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
	<?php /* Fin Choix de la balise html5 */ ?>

	<?php /* Titre Hn du module */ ?>
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
	<?php /* Fin titre du module */ ?>
		<span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span>
	<?php /* Fermeture Hn du module */ ?>
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

			<?php /* Content du module */ ?>
			<div class="modcontent">
				<?php echo $module->content; ?>
				<div class="clearfix"></div>
			</div>

	<?php /* Fermeture balise html5 */ ?>
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
	<?php /* Fin Fermeture balise html5 */ ?>

			</div>
			<?php echo getDebugInfos($moduletype, $params, $attribs); ?>
		</div>
		<?php
}

function modChrome_div($module, &$params, &$attribs) 
{	
	/* Type de module */
	$moduletype			= $module->module;			
	/* Niveau de h dans le titre */
	$headerLvl 			= $params->get('header_tag');		
	/* Choix html5 de la balise du module */
	$moduleTag      		= $params->get('module_tag');		
	$header_class			= $params->get('header_class');
	/* Taille bootstrap defini dans l'administration. */
	$modbssize			= $params->get('bootstrap_size');	
		
	list($activeasidemod, $asidemod) = getAsideModule($moduletype);
?>
	<?php /* Taille BS dans l'admin du module */ ?>
	<?php if ($modbssize != 0) : ?>
	<div class="<?php echo $header_class; ?>">
	<?php else : ?>
	<div class="<?php echo $header_class; ?>">
	<?php endif; ?>
	<?php /* Fin taille BS dans l'admin du module */ ?>

	<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> ">

	<?php /* Choix de la balise html5 */ ?>
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
	<?php /* Fin Choix de la balise html5 */ ?>

	<?php /* Titre Hn du module */ ?>
	<?php if ($module->showtitle) : ?>
		<?php if (empty($headerLvl)) : ?>
			<?php echo "<h3>"; ?>
			<?php else: ?>
			<<?php echo $headerLvl; ?>>
		<?php endif; ?>
	<?php /* Fin titre du module */ ?>
		<span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span>
	<?php /* Fermeture Hn du module */ ?>
		<?php if (empty($headerLvl)) : ?>
			<?php echo "</h3>"; ?>
		<?php else: ?>
			</<?php echo $headerLvl; ?>>
		<?php endif; ?>
	<?php /* Fin fermeture Hn du module */ ?>
		<?php else : ?>
		<<?php echo $headerLvl; ?> class="sr-only">
		<span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span>
		</<?php echo $headerLvl;  ?>>
	<?php endif; ?>

			<?php /* Content du module */ ?>
			<div class="modcontent">
				<?php echo $module->content; ?>
				<div class="clearfix"></div>
			</div>

	<?php /* Fermeture balise html5 */ ?>
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
	<?php /* Fin Fermeture balise html5 */ ?>

			</div>
			<?php echo getDebugInfos($moduletype, $params, $attribs); ?>
		</div>
		<?php
}

// Module standard avec systeme retractable
function modChrome_retractable($module, &$params, &$attribs) 
{
	/* Choix forcer les titres des modules */
	$paramtmpl_tmpltitmodforce 	= array_key_exists('tmpltitmodforce', $attribs) ? $attribs['tmpltitmodforce'] : 0; 
		
	/* Type de module */
	$moduletype			= $module->module;			
	/* Niveau de h dans le titre */
	$headerLvl 			= $params->get('header_tag');		
	/* Choix html5 de la balise du module */
	$moduleTag      		= $params->get('module_tag');		
	$header_class			= $params->get('header_class');
	/* Taille bootstrap defini dans l'administration. */
	$modbssize			= $params->get('bootstrap_size');	
			
	list($activeasidemod, $asidemod) = getAsideModule($moduletype);
?>	<?php /* Taille BS dans l'admin du module */ ?>
	<?php if ($modbssize != 0) : ?>
	<div class="col-xs-12 col-sm-<?php echo $modbssize; ?> col-md-<?php echo $modbssize; ?> col-lg-<?php echo $modbssize; ?> <?php echo $header_class; ?>">
	<?php else : ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $header_class; ?>">
	<?php endif; ?>
	<?php /* Fin taille BS dans l'admin du module */ ?>

	<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> ">

	<?php /* Choix de la balise html5 */ ?>
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
	<?php /* Fin Choix de la balise html5 */ ?>

	<?php /* Titre Hn du module */ ?>
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
	<?php /* Fin titre du module */ ?>
		<a class="togglelink" role="button" data-toggle="collapse" href="#collapseElem<?php echo $module->id; ?>" aria-expanded="true" aria-controls="collapseElem<?php echo $module->id; ?>">
			<span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span>
			<span class="glyphicon" aria-hidden="true"></span>
		</a>
	<?php /* Fermeture Hn du module */ ?>
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
	
			<?php /* Content du module */ ?>
			<div class="collapse in" id="collapseElem<?php echo $module->id; ?>">
				<div class="modcontent">
					<?php echo $module->content; ?>
					<div class="clearfix"></div>
				</div>
			</div>

	<?php /* Fermeture balise html5 */ ?>
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
	<?php /* Fin Fermeture balise html5 */ ?>

			</div>
			<?php echo getDebugInfos($moduletype, $params, $attribs); ?>
		</div>
		<?php
}

// Module standard avec systeme retractable
function modChrome_retractableferme($module, &$params, &$attribs) 
{
	/* Choix forcer les titres des modules */
	$paramtmpl_tmpltitmodforce 	= array_key_exists('tmpltitmodforce', $attribs) ? $attribs['tmpltitmodforce'] : 0; 
	
	/* Type de module */
	$moduletype			= $module->module;			
	/* Niveau de h dans le titre */
	$headerLvl 			= $params->get('header_tag');		
	/* Choix html5 de la balise du module */
	$moduleTag      		= $params->get('module_tag');		
	$header_class			= $params->get('header_class');
	/* Taille bootstrap defini dans l'administration. */
	$modbssize			= $params->get('bootstrap_size');
	
	list($activeasidemod, $asidemod) = getAsideModule($moduletype);
?>
	<?php /* Taille BS dans l'admin du module */ ?>
	<?php if ($modbssize != 0) : ?>
	<div class="col-xs-12 col-sm-<?php echo $modbssize; ?> col-md-<?php echo $modbssize; ?> col-lg-<?php echo $modbssize; ?> <?php echo $header_class; ?>">
	<?php else : ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $header_class; ?>">
	<?php endif; ?>
	<?php /* Fin taille BS dans l'admin du module */ ?>

	<div id="Mod<?php echo $module->id; ?>" class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> ">

	<?php /* Choix de la balise html5 */ ?>
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
	<?php /* Fin Choix de la balise html5 */ ?>

	<?php /* Titre Hn du module */ ?>
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
	<?php /* Fin titre du module */ ?>
		<a class="togglelink collapsed" role="button" data-toggle="collapse" href="#collapseElem<?php echo $module->id; ?>" aria-expanded="false" aria-controls="collapseElem<?php echo $module->id; ?>">
			<span id="label<?php echo $module->id; ?>"><?php echo JText::_( $module->title ); ?></span>
			<span class="glyphicon" aria-hidden="true"></span>
		</a>
	<?php /* Fermeture Hn du module */ ?>
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
	
			<?php /* Content du module */ ?>
			<div class="collapsed collapse" id="collapseElem<?php echo $module->id; ?>">
				<div class="modcontent">
					<?php echo $module->content; ?>
					<div class="clearfix"></div>
				</div>
			</div>

	<?php /* Fermeture balise html5 */ ?>
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
	<?php /* Fin Fermeture balise html5 */ ?>

			</div>
			<?php echo getDebugInfos($moduletype, $params, $attribs); ?>
		</div>
		<?php
}