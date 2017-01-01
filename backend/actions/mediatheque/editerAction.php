<?php
require_once '../../module/Connection.php';
require_once '../../module/model/mediatheque/Mediatheque.php';
require_once '../../module/model/format/Format.php';

$titreMedia=(isset($_POST{"titremedia"}))?$_POST{"titremedia"}:"";
$idformatMedia=(isset($_POST{"idformatmedia"}))?$_POST{"idformatmedia"}:"";
$descriptionMedia=(isset($_POST{"descriptionmedia"}))?$_POST{"descriptionmedia"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";
$imageUploaded=(isset($_POST{"lienmedia"}))?$_POST{"lienmedia"}:"";
$visibleMedia = isset($_POST["visiblemedia"]) ? true : false;



if($id!=""&&$titreMedia!=""&&$idformatMedia!=""&&$descriptionMedia!="") {

        if(isset($_FILES["modifierlienmedia"])){

            echo('Traitement des données<br/>');
            #sp�cifier le chemin vers le r�pertoir des images
            $dossier = '../../../images/';
            #permet de r�cup�rer le nom du fichier
            $fichier = basename($_FILES['modifierlienmedia']['name']);
            #permet de r�cuperer l'extension du fichier et le transformer en minuscule
            $extension = strtolower(pathinfo($_FILES['modifierlienmedia']['name'],
                PATHINFO_EXTENSION));
            echo($extension."<br/>");
            $format =new Format();
            $listformat = $format->getExtensionFormmat($idformatMedia);
            $dataformat=$listformat->fetch();
            $extensions = (string)$dataformat["ext_format"];
            $pos=strrpos ( $extensions ,$extension );
            echo("verification de l'extention<br/>");
            if($pos===FALSE){
                echo("Erreur extension<br/>");
            }else{
                echo("format validér<br/>");
                echo("transporter le fichier a la mosition{$dossier} <br/>");
                if(move_uploaded_file($_FILES['modifierlienmedia']['tmp_name'],
                    $dossier . md5($fichier).".".$extension)) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
                {
                    if(unlink("../../../images/".$imageUploaded)){
                        echo("fichier suprimer avec succé<br/>");
                    }else{
                        echo("fichier non suprimer<br/>");
                    }
                    $imageUploaded = md5($fichier).".".$extension;
                    echo("<br/>".$imageUploaded."<br/>");
                    echo 'Upload effectu� avec succés !<br/>';

                }
                else
                {
                    echo 'Echec de l\'upload ! <br/>';
                }
            }

        }


    $mediatheque = new Mediatheque();
    $resultat = $mediatheque->updateMedia($id,addslashes($titreMedia),$imageUploaded,$idformatMedia,addslashes($descriptionMedia),$visibleMedia);
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>