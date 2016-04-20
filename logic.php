<?php defined( '_JEXEC' ) or die;

// Parametre general joomla
$app            				= JFactory::getApplication();
$doc            				= JFactory::getDocument();
$user            				= JFactory::getUser();								// Info Users
$this->language  				= $doc->language;									// Langue du template
$this->direction 				= $doc->direction;									// Direction du template (RTL, LTR)
$menu 							= $app->getMenu();									// Info menu
$active 						= $app->getMenu()->getActive();						// Item actif du menu
$params 						= $app->getTemplate(true)->params;					// Parametre du template
$titlesite						= $app->get('sitename');
$pageclass 						= $params->get('pageclass_sfx');					// Suffixe de class de la page
$bssize							= $params->get('bootstrap_size');					// Taille bootstrap dans l'admin
$headerlvl 						= $params->get('headerLevel');						// Niveau de titre du module choisi dans l'admin
$tmplpath 						= $this->baseurl.'/templates/'.$this->template;     // adresse du template

$doc->setGenerator('');	 	 														// on supprime le generator content="Joomla! - Open Source Content Management" pour plus de securite
// Parametre du template

// Basics
$paramtmpl_tmpltitleaff 		= $params->get('tmpltitleaff');
$paramtmpl_tmpltitchoice 		= $params->get('tmpltitchoice');
$paramtmpl_tmpltitmodforce 		= $params->get('tmpltitmodforce');
$paramtmpl_tmplfluidmod 		= $params->get('tmplfluidmod');
$paramtmpl_tmplevitlnk 			= $params->get('tmplevitlnk');
$paramtmpl_tmplevitlnkct 		= $params->get('tmplevitlnkct');
$paramtmpl_tmplevitlnksearch	= $params->get('tmplevitlnksearch');
$paramtmpl_tmplevitlnkmenu 		= $params->get('tmplevitlnkmenu');
$paramtmpl_tmpltheme	 		= $params->get('tmpltheme');


// Avance
$paramtmpl_debug				= $params->get('tmplmodhelp');
$paramtmpl_html					= $params->get('tmplhtmlhelp');

// Le Framework
//Jquery joomla
JHTML::_('jquery.framework');
// Bootstrap joomla
JHtml::_('bootstrap.framework'); //On charge bootstrap

// On supprime bootstrap2
if(array_key_exists($this->baseurl . '/media/jui/js/bootstrap.min.js', $doc->_scripts))
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.min.js']); // Et on le supprime du coeur (egalement pour les comp. externe)
if(array_key_exists($this->baseurl . '/media/jui/js/bootstrap.js', $doc->_scripts))
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.js']); // Et on le supprime du coeur (egalement pour les comp. externe)

// Les Metas du site
// Bootstrap
$doc->setMetaData( 'viewport', 'width=device-width, initial-scale=1' );
//$doc->setMetaData( 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' ); // Dans ce cas on n'autorise pas le zoom sur mobile

// Force la derniere version de IE
//$doc->setMetadata('x-ua-compatible','IE=edge,chrome=1'); Commente car pas valide w3c, sauf manipulation IIS remplacer par ligne90

//Ajout des css : css template toujours en premier
$tab_sheets = $doc->_styleSheets;
$doc->_styleSheets = array();
foreach($tab_sheets as $url => $val)
	$doc->addStyleSheet($url,$val['mime'],$val['media'],$val['attribs']);
if(JDEBUG)
{
	$doc->addStyleSheet( ''. $tmplpath .'/css/template.css');
	//$doc->addStyleSheet( 'http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css');
}
else
	$doc->addStyleSheet( ''. $tmplpath .'/css/template.min.css' );

?>