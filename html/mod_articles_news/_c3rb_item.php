<?php
defined('_JEXEC') or die;

$item_heading = $params->get('item_heading', 'h4');
?>
<div class="<?php echo $colDef[$nbCols]; ?>">

<div class="item-articlenews">
    <?php foreach($orderInfos as $infos): ?>
    <?php
        switch($infos)
        {
            case 'image':
                if(!empty($item->imageSrc)):
                ?>
                <div class="item-articlenews-image">
                    <a href="<?php echo $item->link; ?>">
                        <img src="<?php echo $item->imageSrc; ?>" alt="" />
                        <span class="sr-only"><?php echo $item->imageCaption; ?></span>
                    </a>
                </div>
                <?php
                endif;
                break;

            case 'categorie':
                ?>
                <div class="item-articlenews-categorie"><?php echo $item->category_title; ?></div>
                <?php
                break;

            case 'title':
                ?>
                <div class="item-articlenews-title">
                    <<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
	                <?php if ($item->link !== '' && $params->get('link_titles')) : ?>
                    <a href="<?php echo $item->link; ?>">
                    <?php endif; ?>
                    <?php echo $titleMaxLen == 0 ? $item->title : JHtml::_('string.truncate', $item->title, $titleMaxLen); ?>
                    <?php if ($item->link !== '' && $params->get('link_titles')) : ?>
                    </a>
                    <?php endif; ?>
                    </<?php echo $item_heading; ?>>
                </div>
                <?php
                break;

            case 'readmore':
	            if($params->get('readmore')) :
                ?>
                <div class="item-articlenews-readmore">
                    <a href="<?php echo $item->link; ?>"><?php echo $item->linkText; ?></a>
                </div>
	            <?php
	            endif;
                break;

            case 'text':
                ?>
	            <div class="item-articlenews-text">
		            <?php if (!$params->get('intro_only')) : ?>
			            <?php echo $item->afterDisplayTitle; ?>
		            <?php endif; ?>

		            <?php echo $item->beforeDisplayContent; ?>

		            <?php if ($params->get('show_introtext', '1')) : ?>
			            <?php echo $contentMaxLen == 0 ?  $item->introtext : JHtml::_('string.truncate', $item->introtext, $contentMaxLen, true, false); ?>
		            <?php endif; ?>

		            <?php echo $item->afterDisplayContent; ?>

                </div>
                <?php
                break;

            default:
                echo '<div>Informations '.$infos.' introuvable';
                break;
        }
        ?>
    <?php endforeach; ?>
</div>

</div>