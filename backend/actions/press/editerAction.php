<?php
require_once '../../module/Connection.php';
require_once '../../module/model/press/Press.php';
require_once '../../module/model/format/Format.php';

$titrePress=(isset($_POST{"titrepress"}))?$_POST{"titrepress"}:"";
$idsupportPress=(isset($_POST{"idsupportpress"}))?$_POST{"idsupportpress"}:"";
$datePress=(isset($_POST{"datepress"}))?$_POST{"datepress"}:"";

$fileUploaded=(isset($_POST{"lienpress"}))?$_POST{"lienpress"}:"";

$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

if($titrePress!=""&&$idsupportPress!=""&&$datePress!=""&&$id!="") {


    if(isset($_FILES["modifierlienpress"])){
        echo('Traitement des données<br/>');
        #sp�cifier le chemin vers le r�pertoir des images
        $dossier = '../../../documents/';
        #permet de r�cup�rer le nom du fichier
        $fichier = basename($_FILES['modifierlienpress']['name']);
        #permet de r�cuperer l'extension du fichier et le transformer en minuscule
        $extension = strtolower(pathinfo($_FILES['modifierlienpress']['name'],
            PATHINFO_EXTENSION));
        echo($extension."<br/>");
        $format =new Format();
        $listformat = $format->getFormat();
        while($dataformat=$listformat->fetch()) {
            if ($dataformat["type_format"] . "" == "document") {
                $extensions = (string)$dataformat["ext_format"];
                break;
            }
        }
        $pos=strrpos ( $extensions ,$extension );
        echo("verification de l'extention<br/>");
        if($pos===FALSE){
            echo("Erreur extension<br/>");
        }else{
            echo("format validér<br/>");
            echo("transporter le fichier a la mosition{$dossier}<br/>");
            if(move_uploaded_file($_FILES['modifierlienpress']['tmp_name'],
                $dossier . md5($fichier).".".$extension)) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
            {
                if(unlink("../../../documents/".$fileUploaded)){
                    echo("fichier suprimer avec succé<br/>");
                }else{
                    echo("fichier non suprimer<br/>");
                }
                $fileUploaded = md5($fichier).".".$extension;
                echo("<br>".$fileUploaded."<br/>");
                echo 'Upload effectu� avec succ�s !<br/>';

            }
            else
            {
                echo 'Echec de l\'upload !<br/>';
            }
        }

    }else{
        echo("erreur de lien<br/>");
    }
        $press = new Press();
        $resultat = $press->updatePress($id,addslashes($titrePress),$fileUploaded,$idsupportPress,$datePress);
        if ($resultat) {
            echo("Enregistrement réussie<br/>");
        } else {
            echo("Echec d'enregistrement<br/>");
        }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>