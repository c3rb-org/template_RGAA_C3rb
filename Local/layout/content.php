<!-- Calcul taille colonne centrale (gauche / centre / droite) -->
<?php 
$colbs = 12;
if($this->countModules('position-7')>0)
	$colbs = $colbs - 3;
if($this->countModules('position-8')>0)
	$colbs = $colbs - 3;
?>

<div class="row">
	<!-- Col gauche -->
	<?php 
	$nbmod =  $this->countModules('position-7');
	if ($nbmod): ?>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 colgche">
			<div class="row">
				<jdoc:include type="modules" name="position-7" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
			</div>
		</div>
	<?php endif; ?>
	<!-- Fin Col gauche -->
	
	<!-- Col centre -->
	<div id="content-lnk" class="col-xs-12 col-sm-<?php echo $colbs; ?> col-md-<?php echo $colbs; ?> col-lg-<?php echo $colbs; ?> colctre" >

	<?php //top du content
	include_once JPATH_THEMES.'/'.$this->template.'/layout/contenttop.php';
	?>

	<main role="main">
		<!-- Le contenu principal injecte par joomla -->
		<jdoc:include type="component" />
		<div class="clearfix"></div>
	</main>
	
	<?php //bottom du content
	include_once JPATH_THEMES.'/'.$this->template.'/layout/contentbot.php';
	?>
</div> 

<!-- Fin Col centre -->

<!-- Col de droite -->

<?php 
$nbmod =  $this->countModules('position-8');
if ($nbmod): ?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 coldrte">
	
	<div class="row">
		<jdoc:include type="modules" name="position-8" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
	</div>
	
</div>
<?php endif; ?> 
<!-- Fin Col de droite -->
<div class="clearfix"></div>
</div>