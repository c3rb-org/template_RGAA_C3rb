<?php
defined( '_JEXEC' ) or die;

if(JFactory::getApplication()->input->getInt('test_tpl') == 1)
{
	include_once JPATH_THEMES.'/'.$this->template.'/index2.php';
	return;
}

/* Variables du template */
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';

/* Ajout classes css au body en fonction de la vue */
$pagecss = array();
if (!is_null($active) && !is_null($active->params) && !empty($active->params->get('pageclass_sfx')))
{
	$pagecss[] = $active->params->get('pageclass_sfx');
	$pageClassSfx = $active->params->get('pageclass_sfx');
}
if(JFactory::getApplication()->input->getString('view', null) != null)
{
	$pagecss[] = 'view-'.JFilterOutput::stringURLSafe(JFactory::getApplication()->input->getString('view', null));

	if(JFactory::getApplication()->input->getString('layout', null) != null)
	{
		$pagecss[] = 'layout-' .  JFilterOutput::stringURLSafe(JFactory::getApplication()->input->getString('layout', null));
	}
}

$codeLang = substr($this->language, 0, 2);

JHtml::_('bootstrap.tooltip');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $codeLang; ?>" lang="<?php echo $codeLang; ?>" dir="<?php echo $this->direction; ?>">	
	<head>
	<?php include_once JPATH_THEMES.'/'.$this->template.'/layout/head.php';	?>
	</head>

	<?php if ( $paramtmpl_html == 1): ?><div class="debughtml"><?php endif; ?>
	<?php
	 	//$lessvar_bgimgbody				= $params->get('lessvar_bgimgbody');
		//echo '<pre>';
		//print_r($lessvar_bgimgbody);
		//echo '</pre>';
	?>
	<!-- Condition avec variable -->
	<!-- Modele01  -->
	<?php //if ($params->get('tmplchoice') == 1): ?>
		<?php
			//include_once JPATH_THEMES.'/'.$this->template.'/layout/modele01/index.php';
	 	?>
	<?php //endif ?>
	<!-- Defaut customisable-->
		<?php //if ($params->get('tmplchoice') == 0): ?>
		<body class="<?php echo count($pagecss) ? implode(' ', $pagecss) : ''; ?>">
			<jdoc:include type="message" />
			<div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?> <?php if ($paramtmpl_tmpltheme != '0' ) {echo $params->get('tmpltheme');} ?> firstcontainer <?php echo $pageClassSfx; ?>">
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
		</body>
		<?php //endif ?>
</html>
