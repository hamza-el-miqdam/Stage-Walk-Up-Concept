<?php
require_once '../../module/Connection.php';
require_once '../../module/model/categorie/Categorie.php';

$nomCategorie=(isset($_POST{"nomcategorie"}))?$_POST{"nomcategorie"}:"";
$descriptionCategorie=(isset($_POST{"descriptioncategorie"}))?$_POST{"descriptioncategorie"}:"";

if($nomCategorie!=""&&$descriptionCategorie!="") {
    $categorie = new Categorie(addslashes($nomCategorie),addslashes($descriptionCategorie));
    $resultat = $categorie->saveCategorie();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>