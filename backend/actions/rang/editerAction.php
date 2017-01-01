<?php
require_once '../../module/Connection.php';
require_once '../../module/model/rang/Rang.php';

$titreRang=(isset($_POST{"titrerang"}))?$_POST{"titrerang"}:"";
$permissionRang=(isset($_POST{"permissionrang"}))?$_POST{"permissionrang"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

if($titreRang!=""&&$permissionRang!=""&&$id!="") {
    $rang = new Rang();
    $resultat = $rang->updateRang($id,addslashes($titreRang),addslashes($permissionRang));
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}