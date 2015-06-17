<div class="row">
		<!-- position-4 -->
		<?php
		$nbmod =  $this->countModules('position-4');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-4" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>	
		<?php endif; ?>
		<!-- fin position-4 -->
		
		<!-- position-5 -->
		<?php 				
		$nbmod =  $this->countModules('position-5');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<jdoc:include type="modules" name="position-5" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div> 
			</div>
		<?php endif; ?> 
		<!-- fin position-5 -->
		
		<!-- position-6 -->
		<?php 
		$nbmod =  $this->countModules('position-6');
		if ($nbmod): ?> 
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
				<div class="row">
					<jdoc:include type="modules" name="position-6" style="CrbXhtml" nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		<?php endif; ?>
		<!-- fin position-6 -->

		<div class="clearfix"></div>
</div><!-- Fin row -->