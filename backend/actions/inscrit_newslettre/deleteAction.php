<?php
require_once '../../module/Connection.php';
require_once '../../module/model/inscrit_newslettre/Inscrit_newslettre.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new InscritNewsLettre();
		$resultat = $model->deleteInscrit($id);
		if($resultat){
			echo("Suppression r�ussie");
		}else{
			echo("Echec de suppression");
		}
		
	}else{
		echo("Vous n'avais pas le droit d'acc�s � cette page !!");
		
	}
?>