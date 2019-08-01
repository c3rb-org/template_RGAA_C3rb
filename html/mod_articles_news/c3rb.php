<?php
defined('_JEXEC') or die;

// Nombre colonnes
$nbCols = 2;

// Affichage dans colonnes à la "pinterest", true actif, false non actif colonnage classique bootstrap
$forceCol = true;

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

function colOrganise($items, $nbCols)
{
	$res = array();
	$n                    = 0;
	$i                    = 0;

	foreach ($items as $c)
	{
		$res [$i++] [] = $c;
		if ($i >= $nbCols)
		{
			$i = 0;
		}
	}

	return $res;
}

if($forceCol == true)
{
	$list = colOrganise($list, $nbCols);
}

?>

<div class="newsflash<?php echo $moduleclass_sfx; ?>">
    <div class="row">
<?php
        if($forceCol == true)
        {
	        foreach ($list as $l)
            {
	            echo '<div class="'.$colDef[$nbCols].'">';
                foreach ($l as $item)
                {
	                require JModuleHelper::getLayoutPath('mod_articles_news', '_c3rb_item');
                }
                echo '</div>';
            }
        }
        else
        {
	        foreach ($list as $item)
	        {
		        echo '<div class="'.$colDef[$nbCols].'">';
		        require JModuleHelper::getLayoutPath('mod_articles_news', '_c3rb_item');
		        echo '</div>';

	        }
        }
?>
    </div>
</div>