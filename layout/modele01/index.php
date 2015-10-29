	<!-- Modele01  -->
		<div class="modele01">
			<jdoc:include type="message" />
<?php /*
			<div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?>">
*/ ?>
				<?php
				//Header du template
				include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/header.php';
				//Top du template
				?>
				<div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?>"> <!-- Fin de ce div dans /modele01/index.php -->
					<?php
					include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/top.php';
					//Content du template
					include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/content.php';
					//bottom du template
					include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/bottom.php';
					//Footer du template
					include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/footer.php';
					?>
				</div>
			<jdoc:include type="modules" name="debug" style="none" />
			<?php include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/script.php'; ?>
		</div>
</html>
