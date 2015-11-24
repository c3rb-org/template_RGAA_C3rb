<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * Based on BEEZ3 error.php file.
*/
defined('_JEXEC') or die;

// Get params
$app         = JFactory::getApplication();
$params      = $app->getTemplate(true)->params;

// Get language and direction
$doc             = JFactory::getDocument();
$this->language  = $doc->language;
$this->direction = $doc->direction;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.min.css" type="text/css" />
</head>
	<body>
		<div id="all" style="background: url(<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/template/administrator/packerror.png)  no-repeat fixed center bottom / 100% auto transparent; padding-bottom: 350px;" >
			<div id="back">
				<div class="container-fluid" id="contentarea2" >
					<!-- On récupère la navigation du site -->
					<div class=" text-center" id="nav">
						<?php //$module = JModuleHelper::getModule('menu'); ?>
						<?php //echo JModuleHelper::renderModule($module); ?>
					</div>
					<div style="margin-top:35px" class="col-sm-6 col-sm-offset-3 moduletable">
					<a class="btn btn-default full" href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
					</div>
					<div class="col-sm-6 col-sm-offset-3 moduletable" id="wrapper2">
						<div id="errorboxbody">
							<h2 class="text-center" style="margin-top: 25px">
								<?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?>
							</h2>
							<h3 class="text-center"><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h3>
							<div class="alert alert-danger text-center" style="margin:50px 0"> 	
								<h4 class="nomarge">#<?php echo $this->error->getCode(); ?>&nbsp;<?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></h4>
							</div>

							<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
							<ul style="margin-bottom: 40px">
								<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
								<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
								<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
								<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
							</ul>

							<?php if (JModuleHelper::getModule('search')) : ?>
							<div class="well wellerror text-center	">
								<div id="searchbox">
										<p>
										<?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?>
									</p>
									<?php $module = JModuleHelper::getModule('search'); ?>
									<?php echo JModuleHelper::renderModule($module); ?>
								</div><!-- end searchbox -->
								</div>
							<?php endif; ?>
							<br />
						</div><!-- end errorboxbody -->
					</div><!-- end wrapper2 -->
				</div><!-- end contentarea2 -->
				<?php if ($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</div><!--end back -->
		</div><!--end all -->
		<div id="footer-outer">
			<div id="footer-sub">
				<div id="footer">
				</div><!-- end footer -->
			 </div><!-- end footer-sub -->
		</div><!-- end footer-outer-->
	</body>
</html>