<?php
defined( '_JEXEC' ) or die;
if(JFactory::getApplication()->input->getInt('test_tpl') == 1)
{
	include_once JPATH_THEMES.'/'.$this->template.'/index2.php';
	return;
}
//variables du template
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';
if (is_object($active) && !empty($active->params)) {
$pagecss =  $active->params->get('pageclass_sfx');
}
else {
	$pagecss = '';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?><?php //Non valide w3c// $lang = explode('-', $this->language); echo strtolower(end($lang)); ?>" dir="<?php echo $this->direction; ?>">
	<head>
	<?php include_once JPATH_THEMES.'/'.$this->template.'/layout/head.php';	?>
	</head>
	<?php if ( $paramtmpl_html == 1): ?><div class="debughtml"><?php endif; ?>
	<body>
		<jdoc:include type="message" />
		<div class="container<?php if ($paramtmpl_tmplfluidmod == 1): ?>-fluid<?php endif; ?> <?php if ($paramtmpl_tmpltitmodforce == 1): ?>tmpmodhn<?php endif; ?> firstcontainer <?php echo $pagecss; ?>">
			<?php
			//Header du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/header.php';
			//Top du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/top.php';
			//Content du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/content.php';
			//bottom du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/bottom.php';
			//Footer du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/footer.php';
			?>
		</div>
		<jdoc:include type="modules" name="debug" style="none" />
		<?php include_once JPATH_THEMES.'/'.$this->template.'/layout/script.php'; ?>
		<!-- Exemple bootstrap -->
	</body>
</html>
