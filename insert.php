<?php 
defined( '_JEXEC' ) or die; 
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';
?>

<!DOCTYPE html>
<html 	xmlns="http://www.w3.org/1999/xhtml"
xml:lang="<?php echo $this->language; ?>"
lang="<?php $lang = explode('-', $this->language); echo strtolower(end($lang)); ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<jdoc:include type="head" />
	</head>
	<body>
		<jdoc:include type="message" />
		<div class="container">
			<jdoc:include type="component" />
		</div>
		<jdoc:include type="modules" name="debug" style="none" />
		<?php include_once JPATH_THEMES.'/'.$this->template.'/layout/script.php'; ?>
	</body>
</html>