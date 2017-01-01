<?php
require_once '../../module/Connection.php';
require_once '../../module/model/support/Support.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Support();
        $listSupport = $model->getSupport();
        while($dataSupport=$listSupport->fetch()) {
            if ($dataSupport["id_support"] . "" == $id) {
                $lien = (string)$dataSupport["icon_support"];
                break;
            }
        }
		$resultat = $model->deleteSupport($id);
		if($resultat){
			echo("Suppression r�ussie");
            if(unlink("../../../images/".$lien)){
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