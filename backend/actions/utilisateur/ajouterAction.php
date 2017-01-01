<?php
require_once '../../module/Connection.php';
require_once '../../module/model/utilisateur/Utilisateur.php';
require_once '../../module/model/inscrit_newslettre/Inscrit_newslettre.php';

$emailUser=(isset($_POST{"emailuser"}))?$_POST{"emailuser"}:"";
$idrangUser=(isset($_POST{"idranguser"}))?$_POST{"idranguser"}:"";
$motdepasseUser=(isset($_POST{"pwduser"}))?$_POST{"pwduser"}:"";
$dateinscUser=date("Y/m/d");
$nomUser=(isset($_POST{"nomuser"}))?$_POST{"nomuser"}:"";
$prenomUser=(isset($_POST{"prenomuser"}))?$_POST{"prenomuser"}:"";
$statutsocialUser=(isset($_POST{"statutuser"}))?$_POST{"statutuser"}:"non specifier";
$genreUser=(isset($_POST{"genreuser"}))?$_POST{"genreuser"}:"";

$newslettreUser = isset($_POST["newslettreuser"]) ? true  : false;

if ($newslettreUser){
    $inscrit =new InscritNewsLettre();
    $listinscrit = $inscrit->getInscrit();
    $existe=false;
    while($datainscrit=$listinscrit->fetch()) {
        if ($datainscrit["email_inscrit"] . "" == $emailUser) {
            $existe=true;
            break;
        }
    }
    if(!$existe) {
        $inscritnewslettre = new InscritNewsLettre($emailUser);
        $res = $inscritnewslettre->saveInscrit();
        if ($res) {
            echo("Enregistrement réussie a la newslettre");
        } else {
            echo("Echec d'enregistrement  a la newslettre");
        }
    }else{
        echo("deja inscrit a la newslettre");
    }
}

if($emailUser!=""&&$idrangUser!=""&&$motdepasseUser!=""&&$dateinscUser!=""&&$nomUser!=""&&$prenomUser!=""&&$genreUser!="") {
    echo("<br/>".$motdepasseUser."<br/>");
    $utilisateur = new utilisateur();
    $resultat = $utilisateur->getPDO()->query("INSERT INTO utilisateur VALUES('','{$emailUser}','{$idrangUser}',MD5('({$motdepasseUser}'),'{$dateinscUser}','{$nomUser}','{$prenomUser}','{$newslettreUser}','{$statutsocialUser}','{$genreUser}')");
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>