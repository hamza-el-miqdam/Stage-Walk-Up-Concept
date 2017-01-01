<?php
require_once '../../module/Connection.php';
require_once '../../module/model/rang/Rang.php';

$titreRang=(isset($_POST{"titrerang"}))?$_POST{"titrerang"}:"";
$permissionRang=(isset($_POST{"permissionrang"}))?$_POST{"permissionrang"}:"";

if($titreRang!=""&&$permissionRang!="") {
    $rang = new Rang(addslashes($titreRang), addslashes($permissionRang));
    $resultat = $rang->saveRang();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}