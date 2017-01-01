<?php
require_once '../../module/Connection.php';
require_once '../../module/model/mediatheque/Mediatheque.php';
require_once '../../module/model/format/Format.php';

$titreMedia=(isset($_POST{"titremedia"}))?$_POST{"titremedia"}:"";
$idformatMedia=(isset($_POST{"idformatmedia"}))?$_POST{"idformatmedia"}:"";
$descriptionMedia=(isset($_POST{"descriptionmedia"}))?$_POST{"descriptionmedia"}:"";

$visibleMedia = isset($_POST["visiblemedia"]) ? true : false;


if($titreMedia!=""&$idformatMedia!=""&&$descriptionMedia!="") {

if(isset($_FILES["lienmedia"])){
    echo('Traitement des données');
    #sp�cifier le chemin vers le r�pertoir des images
    $dossier = '../../../images/';
    #permet de r�cup�rer le nom du fichier
    $fichier = basename($_FILES['lienmedia']['name']);
    #permet de r�cuperer l'extension du fichier et le transformer en minuscule
    $extension = strtolower(pathinfo($_FILES['lienmedia']['name'],
        PATHINFO_EXTENSION));
    echo($extension);
    $format =new Format();
    $listformat = $format->getExtensionFormmat($idformatMedia);
    $dataformat=$listformat->fetch();
    $extensions = (string)$dataformat["ext_format"];
    $pos=strrpos ( $extensions ,$extension );
    echo("verification de l'extention");
    if($pos===FALSE){
        echo("Erreur extension");
    }else{
        echo("format validér");
        echo("transporter le fichier a la mosition{$dossier}");
        if(move_uploaded_file($_FILES['lienmedia']['tmp_name'],
            $dossier . md5($fichier).".".$extension)) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
        {
            $imageUploaded = md5($fichier).".".$extension;
            echo("<br>".$imageUploaded);
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
    echo("<br>".$titreMedia."<br>".$imageUploaded."<br>".$idformatMedia."<br>".$descriptionMedia."<br>".$visibleMedia."<br>");
    $mediatheque = new Mediatheque(addslashes($titreMedia),$imageUploaded,$idformatMedia,addslashes($descriptionMedia),$visibleMedia);
    $resultat = $mediatheque->saveMedia();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>