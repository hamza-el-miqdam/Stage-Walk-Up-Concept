<?php
require_once '../../module/Connection.php';
require_once '../../module/model/inscrit_newslettre/Inscrit_newslettre.php';

$emailInscrit_newslettre=(isset($_POST{"email"}))?$_POST{"email"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

if($id!=""&&$emailInscrit_newslettre!="") {
    $inscrit_newslettre = new Inscritnewslettre();
    $resultat = $inscrit_newslettre->updateIncrit($id,$emailInscrit_newslettre);
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>