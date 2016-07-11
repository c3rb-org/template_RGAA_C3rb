<?php defined( '_JEXEC' ) or die; ?>
<?php
// Si on est en debug on vas chercher les elements non minifié.
if(JDEBUG) : ?>
	<!-- Si le debug on inclu les exemple botstrap -->
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/transition.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/alert.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/button.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/carousel.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/collapse.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/dropdown.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/modal.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/tooltip.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/popover.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/scrollspy.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/tab.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_bs/affix.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_tablerwd/stacktable.js" type="text/javascript" defer></script>
	<script src="<?php echo $tmplpath; ?>/js/js_uncompress/js_c3rb/app.js" type="text/javascript" defer></script>
<?php else : ?>
		<script src="<?php echo $tmplpath; ?>/js/template.min.js" type="text/javascript" defer></script>
		<script src="<?php echo $tmplpath; ?>/js/menutogleplessis.js" type="text/javascript" defer></script>
<?php endif;?>