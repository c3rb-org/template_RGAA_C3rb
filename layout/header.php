<?php defined( '_JEXEC' ) or die; ?>
<?php 
$paramtmpl_tmplevitlnkct = "#content-lnk";

if ($paramtmpl_tmplevitlnk == 1) : ?>
<!-- lien evitement -->
	<nav role="navigation" aria-label="Accès direct">
	<ul class="list	list-unstyled nopadding nomarge">
	<?php if (!empty($paramtmpl_tmplevitlnkmenu) ): ?>
	<li>
		<a id="evitlnk_menu" class="sr-only sr-only-focusable evit-lnk" href="#Mod<?php echo $paramtmpl_tmplevitlnkmenu; ?>"><?php echo JText::_('TPL_C3RB_RGAA_EVITEMENT_MENU') ?></a>
	</li>
	<?php endif ?>
	<?php if (!empty($paramtmpl_tmplevitlnkct)): ?>
	<li>
		<a id="evitlnk_ct" class="sr-only sr-only-focusable evit-lnk" href="<?php echo $paramtmpl_tmplevitlnkct; ?>"><?php echo JText::_('TPL_C3RB_RGAA_EVITEMENT_CONTENT') ?></a>
	</li>
	<?php endif ?>
	<?php if (!empty($paramtmpl_tmplevitlnksearch) ): ?>
	<li>
		<a id="evitlnk_search" class="sr-only sr-only-focusable evit-lnk" href="#Mod<?php echo $paramtmpl_tmplevitlnksearch; ?>"><?php echo JText::_('TPL_C3RB_RGAA_EVITEMENT_RECH') ?></a>
	</li>
	<?php endif ?>
	
	<?php if (!empty($paramtmpl_tmplevitlnklogin) ): ?>
	<li>
	<?php if ($user->id) : ?>
		<a id="evitlnk_login" class="sr-only sr-only-focusable evit-lnk" href="#Mod<?php echo $paramtmpl_tmplevitlnklogin; ?>"><?php echo JText::_('TPL_C3RB_RGAA_EVITEMENT_LOGININ') ?></a>
	<?php else : ?>
		<a id="evitlnk_login" class="sr-only sr-only-focusable evit-lnk" href="#Mod<?php echo $paramtmpl_tmplevitlnklogin; ?>"><?php echo JText::_('TPL_C3RB_RGAA_EVITEMENT_LOGIN') ?></a>
	<?php endif ?>	

	</li>
	<?php endif ?>	

	</ul>
	</nav>
<?php endif; ?>
<!-- Fin lien evitement -->
<div class="row">
	<div class="tmpl-header">
		<header role="banner">
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
						<div class="pos-1">
							<jdoc:include type="modules" name="position-1" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
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
						<div class="pos-2">
							<jdoc:include type="modules" name="position-2" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
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
						<div class="pos-3">
							<jdoc:include type="modules" name="position-3" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				</div>
			<?php endif; ?>
			<!-- fin position 3 -->
			<div class="clearfix"></div>
		</header>
	</div>
</div><!-- Fin row -->

