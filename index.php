<?php
defined( '_JEXEC' ) or die;
if(JFactory::getApplication()->input->getInt('test_tpl') == 1)
{
	include_once JPATH_THEMES.'/'.$this->template.'/index2.php';
	return;
}
//variables du template
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';

if (!is_null($active) && !is_null($active->params) && !empty($active->params->get('pageclass_sfx'))) {
$pagecss =  $active->params->get('pageclass_sfx');
}
else {
	$pagecss = '';
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
		<body <?php if (!empty($pagecss)): ?> class="<?php echo $pagecss; ?>" <?php endif ; ?>>
			<jdoc:include type="message" />
			<div class="bloc-container-header">
                <div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?> <?php if ($paramtmpl_tmpltheme != '0' ) {echo $params->get('tmpltheme');} ?> firstcontainer container-header <?php echo $pagecss; ?>">
                    <?php
                    //Header du template
                    include_once JPATH_THEMES.'/'.$this->template.'/layout/header.php';
                    ?>
                </div>
            </div>
            <div class="bloc-container-top">
                <div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?> <?php if ($paramtmpl_tmpltheme != '0' ) {echo $params->get('tmpltheme');} ?> container-top <?php echo $pagecss; ?>">
                    <?php
                    //Top du template
                    include_once JPATH_THEMES.'/'.$this->template.'/layout/top.php';
                    ?>
                </div>
            </div>
            <div class="bloc-container-content">
                <div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?> <?php if ($paramtmpl_tmpltheme != '0' ) {echo $params->get('tmpltheme');} ?> container-content <?php echo $pagecss; ?>">
                    <?php
                    //Content du template
                    include_once JPATH_THEMES.'/'.$this->template.'/layout/content.php';
                    ?>
                </div>
            </div>
            <div class="bloc-container-bottom">
                <div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?> <?php if ($paramtmpl_tmpltheme != '0' ) {echo $params->get('tmpltheme');} ?> container-bottom <?php echo $pagecss; ?>">
                    <?php
                    //bottom du template
                    include_once JPATH_THEMES.'/'.$this->template.'/layout/bottom.php';
                    ?>
                </div>
            </div>
            <div class="bloc-container-footer">
                <div class="container<?php if ($paramtmpl_tmplfluidmod == 1) {echo "-fluid";}; ?> <?php	if ($paramtmpl_tmpltitmodforce == 1) {echo "tmpmodhn";} ?> <?php if ($paramtmpl_tmpltheme != '0' ) {echo $params->get('tmpltheme');} ?> container-bottom <?php echo $pagecss; ?>">
                    <?php
                    //Footer du template
                    include_once JPATH_THEMES.'/'.$this->template.'/layout/footer.php';
                    ?>
                </div>
            </div>
			<jdoc:include type="modules" name="debug" style="none" />
			<?php include_once JPATH_THEMES.'/'.$this->template.'/layout/script.php'; ?>
		</body>
		<?php //endif ?>
</html>
