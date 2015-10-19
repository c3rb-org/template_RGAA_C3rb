<?php defined( '_JEXEC' ) or die; ?>
<div class="row">
	<div class="tmpl-bottom">
	<?php if ($this->countModules('position-15')): ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="pos-15">
					<jdoc:include type="modules" name="position-15" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('position-16')): ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="pos-16">
					<jdoc:include type="modules" name="position-16" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('position-17')): ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="pos-17">
					<jdoc:include type="modules" name="position-17" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		</div>
	<?php endif; ?>
	</div>
</div>