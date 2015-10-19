<?php defined( '_JEXEC' ) or die; ?>
<div class="row"><!-- Start row -->
	<div class="tmpl-top">	
			<!-- position-4 -->
			<?php
			$nbmod =  $this->countModules('position-4');
			if ($nbmod): ?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="row">
						<div class="pos-4">
							<jdoc:include type="modules" name="position-4" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
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
						<div class="pos-5">
							<jdoc:include type="modules" name="position-5" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
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
						<div class="pos-6">
							<jdoc:include type="modules" name="position-6" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
						</div>
					</div>
				</div>
			<?php endif; ?>
			<!-- fin position-6 -->
			<div class="clearfix"></div>
	</div>
</div><!-- Fin row -->