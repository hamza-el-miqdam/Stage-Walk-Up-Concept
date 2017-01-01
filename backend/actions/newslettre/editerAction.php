<?php
require_once '../../module/Connection.php';
require_once '../../module/model/newslettre/Newslettre.php';

$objetNewslettre=(isset($_POST{"objetnewslettre"}))?$_POST{"objetnewslettre"}:"";
$textNewslettre=(isset($_POST{"textnewslettre"}))?$_POST{"textnewslettre"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

$dateenvoieNewslettre=date("Y/m/d");

if($objetNewslettre!=""&&$textNewslettre!=""&&$id!="") {

    $newslettre = new newslettre();
    $resultat = $newslettre->updateNewslettre($id,addslashes($objetNewslettre),addslashes($textNewslettre),$dateenvoieNewslettre);
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>