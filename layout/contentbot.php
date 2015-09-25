<?php defined( '_JEXEC' ) or die; ?>
<div class="row">
		<!-- position-12 -->
		<?php
		$nbmod =  $this->countModules('position-12');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-12" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		<?php endif; ?>
		<!-- fin position-12 -->
		<!-- position-13 -->
		<?php
		$nbmod =  $this->countModules('position-13');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-13" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		<?php endif; ?>
		<!-- fin position-13 -->
		<!-- position-14 -->
		<?php
		$nbmod =  $this->countModules('position-14');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-14" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		<?php endif; ?>
		<!-- fin position-14 -->
		<div class="clearfix"></div>
</div><!-- Fin row -->