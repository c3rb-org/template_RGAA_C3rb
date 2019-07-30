<?php
defined('_JEXEC') or die;

// Nombre colonnes
$nbCols = 2;

// Taille max en nb caractères pour le titre si = 0 pas de limitation
$titleMaxLen = 100;

// Taille max en nb caractères pour le texte de l'article si = 0 pas de limitation
$contentMaxLen = 200;

// Ordre des infos à afficher
$orderInfos = array(
	'image',
	'categorie',
	'title',
	'text',
	'readmore'
);

// Définition des classes en fonction du nombre de colonnes
$colDef = array(
    2 => "col-xs-12 col-sm-12 col-md-6 col-lg-6",
    3 => "col-xs-12 col-sm-12 col-md-4 col-lg-4",
    4 => "col-xs-12 col-sm-12 col-md-3 col-lg-3",
    6 => "col-xs-12 col-sm-12 col-md-2 col-lg-2"
);

?>

<div class="newsflash<?php echo $moduleclass_sfx; ?>">
    <div class="row">
<?php
        foreach ($list as $item) :
               require JModuleHelper::getLayoutPath('mod_articles_news', '_c3rb_item');
        endforeach;
?>
    </div>
</div>