<?php defined( '_JEXEC' ) or die; ?>
<div class="row">
		<!-- position-9 -->
		<?php
		$nbmod =  $this->countModules('position-9');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-9" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>	
		<?php endif; ?>
		<!-- fin position-9 -->
		
		<!-- position-10 -->
		<?php 				
		$nbmod =  $this->countModules('position-10');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-10" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div> 
			</div>
		<?php endif; ?> 
		<!-- fin position-10 -->
		
		<!-- position-11 -->
		<?php 
		$nbmod =  $this->countModules('position-11');
		if ($nbmod): ?> 
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
				<div class="row">
					<jdoc:include type="modules" name="position-11" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		<?php endif; ?>
		<!-- fin position-11 -->

		<div class="clearfix"></div>
</div><!-- Fin row -->