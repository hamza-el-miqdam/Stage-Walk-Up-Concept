<?php
require_once '../../module/Connection.php';
require_once '../../module/model/format/Format.php';

$typeFormat=(isset($_POST{"typeformat"}))?$_POST{"typeformat"}:"";
$extFormat=(isset($_POST{"extformat"}))?$_POST{"extformat"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";


if($id!=""&&$typeFormat!=""&&$extFormat!="") {
    $format = new Format();
    $resultat = $format->updateFormat($id,addslashes($typeFormat), addslashes($extFormat));
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}
?>