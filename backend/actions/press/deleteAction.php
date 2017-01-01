<?php
require_once '../../module/Connection.php';
require_once '../../module/model/press/Press.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Press();
        $listpress = $model->getPress();

        while($datapress=$listpress->fetch()) {
            if ($datapress["id_press"] . "" == $id) {
                $lien = (string)$datapress["lien_press"];
                break;
            }
        }
		$resultat = $model->deletePress($id);
		if($resultat){
			echo("Suppression réussie");

            if(unlink("../../../documents/".$lien)){
                echo("fichier suprimer avec succé<br/>");
            }else{
                echo("fichier non suprimer<br/>");
            }

		}else{
			echo("Echec de suppression");
		}
		
	}else{
		echo("Vous n'avais pas le droit d'acc�s � cette page !!");
		
	}
?>