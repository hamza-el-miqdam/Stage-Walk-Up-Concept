<?php
require_once '../../module/Connection.php';
require_once '../../module/model/press/Press.php';
require_once '../../module/model/format/Format.php';

$titrePress=(isset($_POST{"titrepress"}))?$_POST{"titrepress"}:"";
$idsupportPress=(isset($_POST{"idsupportpress"}))?$_POST{"idsupportpress"}:"";
$datePress=(isset($_POST{"datepress"}))?$_POST{"datepress"}:"";

if(isset($_FILES["lienpress"])){
    echo('Traitement des données');
    #sp�cifier le chemin vers le r�pertoir des images
    $dossier = '../../../documents/';
    #permet de r�cup�rer le nom du fichier
    $fichier = basename($_FILES['lienpress']['name']);
    #permet de r�cuperer l'extension du fichier et le transformer en minuscule
    $extension = strtolower(pathinfo($_FILES['lienpress']['name'],
        PATHINFO_EXTENSION));
    echo($extension);
    $format =new Format();
    $listformat = $format->getFormat();
    while($dataformat=$listformat->fetch()) {
        if ($dataformat["type_format"] . "" == "document") {
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
        if(move_uploaded_file($_FILES['lienpress']['tmp_name'],
            $dossier . md5($fichier).".".$extension)) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
        {
            $fileUploaded = md5($fichier).".".$extension;
            echo("<br>".$fileUploaded);
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
if($titrePress!=""&&$idsupportPress!=""&&$datePress!="") {
    $press = new Press(addslashes($titrePress),$fileUploaded,$idsupportPress,$datePress);
    $resultat = $press->savePress();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>