<?php
require_once '../../module/Connection.php';
require_once '../../module/model/type_support_press/Type_support_press.php';

$nomType_support_press=(isset($_POST{"nomtypesupport"}))?$_POST{"nomtypesupport"}:"";
$descType_support_press=(isset($_POST{"desctypesupport"}))?$_POST{"desctypesupport"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

if($nomType_support_press!=""&&$descType_support_press!=""&&$id!="") {
    $type_support_press = new Type_support_press();
    $resultat = $type_support_press->updateType_support_press($id,addslashes($nomType_support_press), addslashes($descType_support_press));
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}