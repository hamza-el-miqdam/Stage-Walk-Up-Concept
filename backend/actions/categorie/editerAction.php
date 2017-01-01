<?php
require_once '../../module/Connection.php';
require_once '../../module/model/categorie/Categorie.php';

$nomCategorie=(isset($_POST{"nomcategorie"}))?$_POST{"nomcategorie"}:"";
$descriptionCategorie=(isset($_POST{"descriptioncategorie"}))?$_POST{"descriptioncategorie"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";


if($id!=""&&$nomCategorie!=""&&$descriptionCategorie!="") {
    $categorie = new Categorie();
    $resultat = $categorie->updateCategorie($id,addslashes($nomCategorie),addslashes($descriptionCategorie));
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>