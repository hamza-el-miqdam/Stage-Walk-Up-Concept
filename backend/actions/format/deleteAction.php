<?php
require_once '../../module/Connection.php';
require_once '../../module/model/format/Format.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Format();
		$resultat = $model->deleteFormat($id);
		if($resultat){
			echo("Suppression r�ussie");
		}else{
			echo("Echec de suppression");
		}
		
	}else{
		echo("Vous n'avais pas le droit d'acc�s � cette page !!");
		
	}
?>