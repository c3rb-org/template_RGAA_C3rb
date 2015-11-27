<?php defined( '_JEXEC' ) or die; ?>
<div class="row">
		<!-- position-9 -->
		<?php
		$nbmod =  $this->countModules('position-9');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="pos-9">
						<jdoc:include type="modules" name="position-9" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
					</div>
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
					<div class="pos-10">
						<jdoc:include type="modules" name="position-10" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
					</div>
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
					<div class="pos-11">
						<jdoc:include type="modules" name="position-11" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- fin position-11 -->
		<div class="clearfix"></div>

<!-- position-11a -->
		<?php
		$nbmod =  $this->countModules('position-11a');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="row">
					<div class="pos-11">
						<jdoc:include type="modules" name="position-11a" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
					</div>
				</div>
			</div>
		<?php endif; ?>
<!-- fin position-11a -->
<!-- position-11b -->
		<?php
		$nbmod =  $this->countModules('position-11b');
		if ($nbmod): ?>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="row">
					<div class="pos-11">
						<jdoc:include type="modules" name="position-11b" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
					</div>
				</div>
			</div>
		<?php endif; ?>
<!-- fin position-11b -->
</div><!-- Fin row -->