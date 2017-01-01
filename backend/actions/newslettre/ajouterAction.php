<?php
require_once '../../module/Connection.php';
require_once '../../module/model/newslettre/Newslettre.php';

$objetNewslettre=(isset($_POST{"objetnewslettre"}))?$_POST{"objetnewslettre"}:"";
$textNewslettre=(isset($_POST{"textnewslettre"}))?$_POST{"textnewslettre"}:"";
$dateenvoieNewslettre=date("Y/m/d");

if($objetNewslettre!=""&&$textNewslettre!=""&&$dateenvoieNewslettre!="") {

    $newslettre = new newslettre(addslashes($objetNewslettre),addslashes($textNewslettre),$dateenvoieNewslettre);
    $resultat = $newslettre->saveNewslettre();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>