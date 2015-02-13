<?php
defined( '_JEXEC' ) or die;

// Parametre general joomla
	$app            	= JFactory::getApplication();
	$doc            	= JFactory::getDocument();							
	$user            	= JFactory::getUser();								// Info Users
	$this->language  	= $doc->language;									// Langue du template
	$this->direction 	= $doc->direction;									// Direction du template (RTL, LTR)
	$menu 				= $app->getMenu();									// Info menu
	$active 			= $app->getMenu()->getActive();						// Item actif du menu
	$params 			= $app->getTemplate(true)->params;					// Parametre du template
	$titlesite			= $app->get('sitename');
	$pageclass 			= $params->get('pageclass_sfx');					// Suffixe de class de la page
	$bssize				= $params->get('bootstrap_size');					// Taille bootstrap dans l'admin
	$headerlvl 			= $params->get('headerLevel');						// Niveau de titre du module choisi dans l'admin
	$tmplpath 			= $this->baseurl.'/templates/'.$this->template;     // adresse du template

	$config 			= new JConfig(); 
	$doc->setGenerator('');	 												// on supprime le generator content="Joomla! - Open Source Content Management" pour plus de securite
// Parametre du template
	// Basics
	$paramtmpl_tmpltitlechoice 	= $params->get('tmpltitlechoice');
	// Avance
	$paramtmpl_debug			= $params->get('tmplmodhelp');
	$paramtmpl_html				= $params->get('tmplhtmlhelp');

// Le Framework
	//Jquery joomla
	JHTML::_('jquery.framework');
	// Bootstrap joomla
	JHtml::_('bootstrap.framework'); //On charge bootstrap 
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.min.js']); // Et on le supprime du coeur (egalement pour les comp. externe)

// Les Metas du site
	// Bootstrap
	$doc->setMetaData( 'viewport', 'width=device-width, initial-scale=1' );
	//$doc->setMetaData( 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' ); // Dans ce cas on n'autorise pas le zoom sur mobile
	// Force la derniere version de IE
	$doc->setMetadata('x-ua-compatible','IE=edge,chrome=1');

// Le CSS
	// Si on est en debug on vas chercher les elements non minifie.
	if($config->debug == 1) {
		$doc->addStyleSheet( ''. $tmplpath .'/css/bootstrap.css');
		$doc->addStyleSheet( ''. $tmplpath .'/css/font-awesome.css');
		$doc->addStyleSheet( ''. $tmplpath .'/css/template.css');
	}
	//Sinon on vas chercher du minifier.
	else {
		$doc->addStyleSheet( ''. $tmplpath .'/css/template.min.css ' );	
	}
// Le Js en fond d'index

	?>


	<!DOCTYPE html>
	<html 	xmlns="http://www.w3.org/1999/xhtml"
	xml:lang="<?php echo $this->language; ?>"
	lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<jdoc:include type="head" /><!-- Balise meta et autre de la config du site joomla -->
		<!-- A FAIRE : supprimmer le caption.js genere par le jdoc:include ? -->

		<!-- Les favicons autre que la favicon.ico generale genere par le jdoc:include -->
		<link rel="apple-touch-icon" sizes="57x57" href="/templates/images/template/favicon/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/templates/images/template/favicon/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/templates/images/template/favicon/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/templates/images/template/favicon/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/templates/images/template/favicon/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/templates/images/template/favicon/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/templates/images/template/favicon/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/templates/images/template/favicon/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/templates/images/template/favicon/apple-touch-icon-180x180.png">
		<!-- <link rel="shortcut icon" href="/templates/images/template/favicon/favicon.ico"> genere par joomla  le $doc -->
		<link rel="icon" type="image/png" href="/templates/images/template/favicon/favicon-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="/templates/images/template/favicon/favicon-160x160.png" sizes="160x160">
		<link rel="icon" type="image/png" href="/templates/images/template/favicon/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="/templates/images/template/favicon/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="/templates/images/template/favicon/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="/templates/images/template/favicon/mstile-144x144.png">
		<meta name="msapplication-config" content="/templates/images/template/favicon/browserconfig.xml">
		
		<!-- Fin favicon 
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
	-->
	</head>
	<?php if ( $paramtmpl_html == 1) {
		echo '<div class="debughtml">'; 
	} ?>
	<body>
		<!-- début du template -->
		<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
		les font-awesome bug!
		<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
		test
		<div class="container">
			<div class="row">
				<header aria-label="<?php echo $titlesite; ?>" role="banner">
				<?php if ($paramtmpl_tmpltitlechoice == 1) : ?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php else : ?>
				<div class="sr-only">
				<?php endif ?>
				<h1><?php echo $titlesite; ?></h1>
				</div>
					<!-- Bloc top -->		
					<?php
					$nbmod =  $this->countModules('position-1');
					if ($nbmod): ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="row">
								<jdoc:include type="modules" name="position-1" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
							</div>
						</div>	
					<?php endif; ?> 
					<?php 				
					$nbmod =  $this->countModules('position-2');
					if ($nbmod): ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="row">
								<jdoc:include type="modules" name="position-2" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
							</div>
						</div>
					<?php endif; ?> 
					<?php 
					$nbmod =  $this->countModules('position-3');
					if ($nbmod): ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="row">
								<jdoc:include type="modules" name="position-3" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
							</div>
						</div>
					<?php endif; ?>
				<div class="clearfix"></div>
				</header>
			</div>
				<!-- Fin bloc top -->

				<!-- Calcul taille colonne centrale (gauche / centre / droite) -->
				    <?php 
				    	$colbs = 12;
    					if($this->countModules('position-4')>0)
        				$colbs = $colbs - 3;
    					if($this->countModules('position-5')>0)
        				$colbs = $colbs - 3;
        		 	?>
				<!-- Fin calcul taille colonne centrale (gauche / centre / droite) -->
		<div class="row">
				
				<!-- Col gauche -->
				<?php 
				$nbmod =  $this->countModules('position-4');
				if ($nbmod): ?>
				
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="row">
							<jdoc:include type="modules" name="position-4" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				
				<?php endif; ?>
		
				<!-- Fin Col gauche -->

				<!-- Col centre -->
		<div class="col-xs-12 col-sm-<?php echo $colbs; ?> col-md-<?php echo $colbs; ?> col-lg-<?php echo $colbs; ?>" >
			
				<?php if ($this->countModules('position-6')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-6" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?> 

				<?php if ($this->countModules('position-7')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-7" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?> 
				<?php if ($this->countModules('position-8')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-8" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?> 

				<div class="clearfix"></div>
				<main role="main">
				<!-- Le contenu principal injecte par joomla -->
				<jdoc:include type="component" />
				</main>
				<!-- Fin Le contenu principal injecte par joomla -->
				<div class="clearfix"></div>

				<?php if ($this->countModules('position-9')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-9" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?> 
				<?php if ($this->countModules('position-10')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-10" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?>
				<?php if ($this->countModules('position-11')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-11" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?>
			
		</div> 
				<!-- Fin Col centre -->

				<!-- Col de droite -->
			
				<?php 
				$nbmod =  $this->countModules('position-5');
				if ($nbmod): ?>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					
						<div class="row">
							<jdoc:include type="modules" name="position-5" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					
				</div>
				<?php endif; ?> 
				<!-- Fin Col de droite -->
				<div class="clearfix"></div>
		</div>


				<?php if ($this->countModules('position-12')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-12" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?>
				<?php if ($this->countModules('position-13')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-13" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?>
				<?php if ($this->countModules('position-14')): ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<jdoc:include type="modules" name="position-14" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				<?php endif; ?>
				<!-- Bloc bas -->
				
			</div>


<jdoc:include type="modules" name="debug" style="none" />
<?php //require_once 'html/bootstrap.test.full.php'; ?>
<?php //require_once 'html/font.test.full.php'; ?>

<!-- Elements d'aide au template -->
<?php if ($paramtmpl_debug == 1) {
	//require_once 'html/bootstrap.test.full.php'; 
	//require_once 'html/font.test.full.php'; 	
	} 
?>





<?php 
// Si on est en debug on vas chercher les elements non minifié.
if($config->debug == 1) : ?>	
	<!-- Si le debug on inclu les exemple botstrap -->
	<script src="<?php echo $tmplpath; ?>/js/bootstrap.js" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/bootstrap-accessibility.js" defer></script> <!-- https://paypal.github.io/bootstrap-accessibility-plugin/demo.html -->
	<script src="<?php echo $tmplpath; ?>/js/stacktable.js" defer></script> <!-- https://paypal.github.io/bootstrap-accessibility-plugin/demo.html -->
	<script src="<?php echo $tmplpath; ?>/js/template.js" type="text/javascript" defer></script>
<?php else : ?> 
	<script src="<?php echo $tmplpath; ?>/js/bootstrap.min.js" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/bootstrap-accessibility.min.js" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/stacktable.min.js" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/template.min.js" type="text/javascript" defer></script>
<?php endif;?>

</body>
</html>