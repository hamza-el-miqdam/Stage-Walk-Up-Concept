<?php
require_once '../../module/Connection.php';
require_once '../../module/model/format/Format.php';

    $typeFormat=(isset($_POST{"typeformat"}))?$_POST{"typeformat"}:"";
    $extFormat=(isset($_POST{"extformat"}))?$_POST{"extformat"}:"";

    if($typeFormat!=""&&$extFormat!="") {
        $format = new Format(addslashes($typeFormat), addslashes($extFormat));
        $resultat = $format->saveFormat();
        if ($resultat) {
            echo("Enregistrement réussie");
        } else {
            echo("Echec d'enregistrement");
        }
    }else{
            echo("vous n'avais pas le droit d'accés à cette page");
        }
?>