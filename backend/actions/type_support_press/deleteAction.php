<?php
require_once '../../module/Connection.php';
require_once '../../module/model/type_support_press/Type_support_press.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Type_support_press();
		$resultat = $model->deleteType_support_press($id);
		if($resultat){
			echo("Suppression r�ussie");
		}else{
			echo("Echec de suppression");
		}
		
	}else{
		echo("Vous n'avais pas le droit d'acc�s � cette page !!");
		
	}
?>