<?php defined( '_JEXEC' ) or die; ?>
<!-- lien evitement -->
<a class="sr-only sr-only-focusable evit-lnk" href="#content-lnk"><?php echo JText::_('TPL_RGAAC3RB_EVITEMENT_CONTENT') ?></a>
<a class="sr-only sr-only-focusable evit-lnk" href="#search-lnk"><?php echo JText::_('TPL_RGAAC3RB_EVITEMENT_RECH') ?></a>
<a class="sr-only sr-only-focusable evit-lnk" href="#menu-lnk"><?php echo JText::_('TPL_RGAAC3RB_EVITEMENT_MENU') ?></a>
<!-- Fin lien evitement -->
<div class="row">

	<header aria-label="<?php echo $titlesite; ?>" role="banner">
		<?php if ($paramtmpl_tmpltitleaff == 1) : ?><!-- Param template affichage du titre -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php else : ?>
			<div class="sr-only">
		<?php endif ?>

		<!-- Le H1 est branché sur le titre de la page, il est possible d'avoir ou non le titre du site + le titre de la page dans l'administration : ->Systeme -> configuration -> Nom du site dans les titres   -->
			<h1>
			<?php if ($paramtmpl_tmpltitchoice == 1) : ?>
				<?php echo $titlesite; ?>
			<?php else : ?>
				<?php echo $doc->title; ?>
			<?php endif	 ?>
			</h1>
			</div><!-- fin col-xs-12 col-sm-12 col-md-12 col-lg-12 /OU/ sr-only -->
		
		<!-- position 1 -->
		<?php
		$nbmod =  $this->countModules('position-1');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-1" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>	
		<?php endif; ?>
		<!-- fin position 1 -->
		
		<!-- position 2 -->
		<?php 				
		$nbmod =  $this->countModules('position-2');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-2" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div> 
			</div>
		<?php endif; ?> 
		<!-- fin position 2 -->
		
		<!-- position 3 -->
		<?php 
		$nbmod =  $this->countModules('position-3');
		if ($nbmod): ?> 
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
				<div class="row">
					<jdoc:include type="modules" name="position-3" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		<?php endif; ?>
		<!-- fin position 3 -->

		<div class="clearfix"></div>
	</header>
</div><!-- Fin row -->

