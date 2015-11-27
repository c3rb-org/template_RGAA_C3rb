<!-- /////////////////// Modele01  ////////////////////// -->
<?php
defined( '_JEXEC' ) or die;
if(JFactory::getApplication()->input->getInt('test_tpl') == 1)
{
	include_once JPATH_THEMES.'/'.$this->template.'/index2.php';
	return;
}
//variables du template
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';
?>
<!DOCTYPE html>
<html 	xmlns="http://www.w3.org/1999/xhtml"
xml:lang="<?php echo $this->language; ?>"
lang="<?php $lang = explode('-', $this->language); echo strtolower(end($lang)); ?>" dir="<?php echo $this->direction; ?>">
	<head>
	<?php include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/head.php';	?>
	</head>
	<?php if ( $paramtmpl_html == 1): ?><div class="debughtml"><?php endif; ?>

	<?php /*
		echo '<pre>';
		print_r($params);
		echo '</pre>';
	*/ ?>
	<!-- Condition avec variable -->

	<!-- Defaut customisable-->

//modele 01
	<body>
		<jdoc:include type="message" />
		<div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?>">
			<?php
			//Header du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/header.php';
			//Top du template
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
	</body>

</html>
