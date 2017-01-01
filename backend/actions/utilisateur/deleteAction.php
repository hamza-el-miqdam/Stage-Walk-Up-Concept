<?php
require_once '../../module/Connection.php';
require_once '../../module/model/utilisateur/Utilisateur.php';
	$id = (isset($_GET["id"]))?$_GET["id"]:"";
	if($id!=""){
		#suppression
		$model = new Utilisateur();
		$resultat = $model->deleteUser($id);
		if($resultat){
			echo("Suppression r�ussie");
		}else{
			echo("Echec de suppression");
		}
		
	}else{
		echo("Vous n'avais pas le droit d'acc�s � cette page !!");
		
	}
?>