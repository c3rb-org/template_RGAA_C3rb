<?php
defined('_JEXEC') or die;

extract($displayData);

// The button.
if ($disabled != true)
{
	JHtml::_('bootstrap.tooltip');
}

$attr = '';

// Initialize some field attributes.
$attr .= !empty($class) ? ' class="form-control input-small hasTooltip field-media-input ' . $class . '"' : ' class="form-control input-small hasTooltip field-media-input"';
$attr .= !empty($size) ? ' size="' . $size . '"' : '';

// Initialize JavaScript field attributes.
$attr .= !empty($onchange) ? ' onchange="' . $onchange . '"' : '';

switch ($preview)
{
	case 'no': // Deprecated parameter value
	case 'false':
	case 'none':
		$showPreview = false;
		$showAsTooltip = false;
		break;
	case 'yes': // Deprecated parameter value
	case 'true':
	case 'show':
		$showPreview = true;
		$showAsTooltip = false;
		break;
	case 'tooltip':
	default:
		$showPreview = true;
		$showAsTooltip = true;
		break;
}

// Pre fill the contents of the popover
if ($showPreview)
{
	if ($value && file_exists(JPATH_ROOT . '/' . $value))
	{
		$src = JUri::root() . $value;
	}
	else
	{
		$src = null;
	}
}

// The URL for the modal
$url    = ($readonly ? ''
	: ($link ?: 'index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset='
		. $asset . '&amp;author=' . $authorId)
	. '&amp;fieldid='.$id.'&amp;ismoo=0&amp;folder=' . $folder);

echo JHtml::_('bootstrap.renderModal',
	'imageModal_'. $id,
	array(
		'title' => JText::_('JLIB_FORM_CHANGE_IMAGE'),
		'closeButton' => true,
        'url' => JUri::root().$url,
        'width' => 800,
        'height' => 600,
        'large' => true
	)
);

?>
<div class="input-group input-group-sm">
	<?php if ($showPreview && $showAsTooltip) : ?>
    <a href="javasccript:void(0)" class="input-group-addon" data-toggle="tooltip" data-html="true" title="<?php echo !is_null($src) ? htmlentities('<img src="'.$src.'" />') :  JText::_('JLIB_FORM_MEDIA_PREVIEW_EMPTY'); ?>">
        <span class="fa fa-eye" aria-hidden="true"></span>
    </a>
    <?php endif; ?>
    <input type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo htmlspecialchars($value, ENT_COMPAT, 'UTF-8'); ?>" readonly="readonly"<?php echo $attr; ?>/>
	<?php if ($disabled != true) : ?>
    <span class="input-group-btn">
        <button
                type="button"
                class="btn hasTooltip button-clear"
                title="<?php echo JText::_("JLIB_FORM_BUTTON_CLEAR"); ?>"
                aria-label="<?php echo JText::_("JLIB_FORM_BUTTON_CLEAR"); ?>"
                onclick="jQuery('#<?php echo $id; ?>').val('');"
        >
            <span class="icon-remove" aria-hidden="true"></span>
        </button>
        <a type="button" class="btn button-select" href="#imageModal_<?php echo $id; ?>" data-toggle="modal"><?php echo JText::_("JLIB_FORM_BUTTON_SELECT"); ?></a>
    </span>
    <?php endif; ?>
</div>

<?php if ($showPreview && !$showAsTooltip) : ?>
<?php if(!is_null($src)): ?><img src="<?php echo $src; ?>" style="height: 200px" /><?php endif; ?>
<?php endif; ?>