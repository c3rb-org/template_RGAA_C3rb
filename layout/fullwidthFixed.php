<?php defined( '_JEXEC' ) or die; ?>
<?php if($this->countModules('position-fullwidthFixed')>0):?>
<div class="full-width">
  <div class="container <?php echo $pageClassSfx; ?>">
  	<jdoc:include type="modules" name="position-fullwidthFixed" style="CrbXhtml" />
  </div>
</div>
<?php endif;?>