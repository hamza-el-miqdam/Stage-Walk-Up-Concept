<?php
require_once '../../module/Connection.php';
require_once '../../module/model/support/Support.php';
require_once '../../module/model/format/Format.php';

$nomSupport=(isset($_POST{"nomsupport"}))?$_POST{"nomsupport"}:"";
$idtypeSupport=(isset($_POST{"idTypesupport"}))?$_POST{"idTypesupport"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

$iconUploaded=(isset($_POST{"iconsupport"}))?$_POST{"iconsupport"}:"";

if($nomSupport!=""&&$idtypeSupport!=""&&$id!=""){
    if(isset($_FILES["modifiericonsupport"])){
        echo('Traitement des données');

        $dossier = '../../../images/';

        $fichier = basename($_FILES['modifiericonsupport']['name']);

        $extension = strtolower(pathinfo($_FILES['modifiericonsupport']['name'],
            PATHINFO_EXTENSION));
        echo($extension);
        $format =new Format();
        $listformat = $format->getFormat();
        while($dataformat=$listformat->fetch()) {
            if ($dataformat["type_format"] . "" == "photo") {
                $extensions = (string)$dataformat["ext_format"];
                break;
            }
        }
        $pos=strrpos ( $extensions ,$extension );
        echo("verification de l'extention");
        if($pos===FALSE){
            echo("Erreur extension");
        }else{
            echo("format validér");
            echo("transporter le fichier a la mosition{$dossier}");
            if(move_uploaded_file($_FILES['modifiericonsupport']['tmp_name'],
                $dossier . md5($fichier).".".$extension))
            {
                if(unlink("../../../images/".$iconUploaded)){
                    echo("fichier suprimer avec succé<br/>");
                }else{
                    echo("fichier non suprimer<br/>");
                }
                $iconUploaded = md5($fichier).".".$extension;
                echo("<br>".$iconUploaded);
                echo 'Upload effectu� avec succ�s !';

            }
            else
            {
                echo 'Echec de l\'upload !';
            }
        }

    }else{
        echo("erreur de lien");
    }

        $support = new support();
        $resultat = $support->updateSupport($id,addslashes($nomSupport),$iconUploaded,$idtypeSupport);
        if ($resultat) {
            echo("Enregistrement réussie");
        } else {
            echo("Echec d'enregistrement");
        }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>