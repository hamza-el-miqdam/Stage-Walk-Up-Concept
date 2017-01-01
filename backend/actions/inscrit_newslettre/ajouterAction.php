<?php
require_once '../../module/Connection.php';
require_once '../../module/model/inscrit_newslettre/Inscrit_newslettre.php';

$emailInscrit_newslettre=(isset($_POST{"email"}))?$_POST{"email"}:"";

if($emailInscrit_newslettre!="") {
    $inscrit_newslettre = new Inscritnewslettre($emailInscrit_newslettre);
    $resultat = $inscrit_newslettre->saveInscrit();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>