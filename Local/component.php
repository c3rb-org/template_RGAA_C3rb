<?php 
defined( '_JEXEC' ) or die; 

JHTML::_('jquery.framework');
JHtml::_('bootstrap.framework');

$doc = JFactory::getDocument();	
$tmplpath = $this->baseurl.'/templates/'.$this->template;
$this->language  	= $doc->language;
$this->direction 	= $doc->direction;	
	
if(array_key_exists($this->baseurl . '/media/jui/js/bootstrap.min.js', $doc->_scripts))
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.min.js']);
if(array_key_exists($this->baseurl . '/media/jui/js/bootstrap.js', $doc->_scripts))
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.js']);

$doc->setMetaData( 'viewport', 'width=device-width, initial-scale=1' );

$tab_sheets = $doc->_styleSheets;
$doc->_styleSheets = array();
if(JDEBUG)
	$doc->addStyleSheet( ''. $tmplpath .'/css/bootstrap.css')->addStyleSheet( ''. $tmplpath .'/css/font-awesome.css')->addStyleSheet( ''. $tmplpath .'/css/template.css');
else
	$doc->addStyleSheet( ''. $tmplpath .'/css/template.min.css' );
foreach($tab_sheets as $url => $val)
	$doc->addStyleSheet($url,$val['mime'],$val['media'],$val['attribs']);	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<jdoc:include type="head" />
</head>
<body>
	<jdoc:include type="message" />
	<div class="container">
		<jdoc:include type="component" />
	</div>
<?php 
if(JDEBUG || JString::strpos(JUri::base(),'wdev009') >= 0) : ?>	
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
	<script src="<?php echo $tmplpath; ?>/js/template.min.js" type="text/javascript"></script>
<?php endif;?>
</body>
</html>