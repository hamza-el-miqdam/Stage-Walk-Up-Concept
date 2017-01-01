<?php
require_once '../../module/Connection.php';
require_once '../../module/model/mediatheque/Mediatheque.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Mediatheque();
        $listmedia = $model->getMedia();
        while($datamedia=$listmedia->fetch()) {
            if ($datamedia["id_media"] . "" == $id) {
                $lien = (string)$datamedia["lien_media"];
                break;
            }
        }
        $resultat = $model->deleteMedia($id);
		if($resultat){
			echo("Suppression réussie de la base de donnée<br/>");

            if(unlink("../../../images/".$lien)){
                echo("fichier suprimer avec succé<br/>");
            }else{
                echo("fichier non suprimer<br/>");
            }
        }else{
			echo("Echec de suppression<br/>");
		}
		
	}else{
		echo("Vous n'avais pas le droit d'acc�s � cette page !!");
		
	}
?>