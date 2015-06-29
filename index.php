<?php
defined( '_JEXEC' ) or die; 
//variables du template
include_once JPATH_THEMES.'/'.$this->template.'/logic.php'; 
?>

<!DOCTYPE html>
<html 	xmlns="http://www.w3.org/1999/xhtml"
xml:lang="<?php echo $this->language; ?>"
lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

	<head>
	<?php
	//Head du template
	include_once JPATH_THEMES.'/'.$this->template.'/layout/head.php';
	?>
	</head>

	<?php if ( $paramtmpl_html == 1) {
		echo '<div class="debughtml">';
	} ?>

	<body>
		<jdoc:include type="message" />
		<div class="container">
			<?php //Header du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/header.php';
			?>

			<?php //Header du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/top.php';
			?>

			<?php //Content du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/content.php';
			?>

			<?php //bottom du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/bottom.php';
			?>

			<?php //Footer du template
			include_once JPATH_THEMES.'/'.$this->template.'/layout/footer.php';
			?>
		</div>

		<jdoc:include type="modules" name="debug" style="none" />
		<?php //require_once 'html/bootstrap.test.full.php'; ?>
		<?php //require_once 'html/font.test.full.php'; ?>

		<!-- Elements d'aide au template -->
		<?php if ($paramtmpl_debug == 1) {
			//require_once 'html/bootstrap.test.full.php'; 
			//require_once 'html/font.test.full.php'; 	
		} 
		?>
		<?php
		//Script du template
		include_once JPATH_THEMES.'/'.$this->template.'/layout/script.php';
		?>
	</body>

</html> 
