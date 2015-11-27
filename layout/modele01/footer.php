<?php defined( '_JEXEC' ) or die; ?>
<div class="row">
	<div class="tmpl-footer">
	<?php if ($this->countModules('position-18')): ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="pos-18">
					<jdoc:include type="modules" name="position-18" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('position-19')): ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="pos-19">
					<jdoc:include type="modules" name="position-19" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ($this->countModules('position-20')): ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="pos-20">
					<jdoc:include type="modules" name="position-20" style="CrbXhtml" tmpltitmodforce="<?php echo $paramtmpl_tmpltitmodforce; ?>"  nbmod="<?php echo $nbmod; ?>" debug="<?php echo $paramtmpl_debug; ?>" />
				</div>
			</div>
		</div>
	<?php endif; ?>
	</div>
</div>
<!-- Bloc bas -->