<?php
require_once '../../module/Connection.php';
require_once '../../module/model/utilisateur/Utilisateur.php';
require_once '../../module/model/inscrit_newslettre/Inscrit_newslettre.php';

$emailUser=(isset($_POST{"emailuser"}))?$_POST{"emailuser"}:"";
$idrangUser=(isset($_POST{"idranguser"}))?$_POST{"idranguser"}:"";

$motedepasseUser=(isset($_POST{"modifierpwduser"}))?$_POST{"modifierpwduser"}:"";

$dateinscUser=date("Y/m/d");
$nomUser=(isset($_POST{"nomuser"}))?$_POST{"nomuser"}:"";
$prenomUser=(isset($_POST{"prenomuser"}))?$_POST{"prenomuser"}:"";
$statutsocialUser=(isset($_POST{"statutuser"}))?$_POST{"statutuser"}:"non specifier";
$genreUser=(isset($_POST{"genreuser"}))?$_POST{"genreuser"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

 $idUserCol="id_user";
 $emailUserCol="email_user";
 $mot_de_passeUserCol="mot_de_passe_user";
 $idRangUserCol="id_rang_user";
 $date_inscUserCol="date_insc_user";
 $nomUserCol="nom_user";
 $prenomUserCol="prenom_user";
 $newslettreUserCol="newslettre_user";
 $statutsocialUserCol="statut_social_user";
 $genreUserCol="genre_user";

 $table="utilisateur";



$newslettreUser = isset($_POST["newslettreuser"]) ? true  : false;
if($id!=""&&$emailUser!=""&&$idrangUser!=""&&$dateinscUser!=""&&$nomUser!=""&&$prenomUser!=""&&$newslettreUser!=""&&$genreUser!="") {

    if ($newslettreUser) {
        $inscrit = new InscritNewsLettre();
        $listinscrit = $inscrit->getInscrit();
        $existe = false;
        while ($datainscrit = $listinscrit->fetch()) {
            if ($datainscrit["email_inscrit"] . "" == $emailUser) {
                $existe = true;
                break;
            }
        }
        if (!$existe) {
            $inscritnewslettre = new InscritNewsLettre($emailUser);
            $res = $inscritnewslettre->saveInscrit();
            if ($res) {
                echo("Enregistrement réussie a la newslettre");
            } else {
                echo("Echec d'enregistrement  a la newslettre");
            }
        } else {
            echo("deja enregistrer");
        }
    } else {
        $inscrit = new InscritNewsLettre();
        $listinscrit = $inscrit->getInscrit();
        $existe = false;
        while ($datainscrit = $listinscrit->fetch()) {
            if ($datainscrit["email_inscrit"] . "" == $emailUser) {
                $existe = true;
                break;
            }
        }
        if ($existe) {
            $deleteinscrit = new InscritNewsLettre();
            $res = $deleteinscrit->deleteInscrit($id);
            if ($resultat) {
                echo("Suppression de la newsLettre réussie");
            } else {
                echo("Echec de suppression de la newslettre");
            }
        } else {
            echo("vous n'est pas inscrit dans la newslettre");
        }
    }

    $utilisateur = new utilisateur();

    $nomUserslach = addslashes($nomUser);
    $prenomUserslash = addslashes($prenomUser);
    if ($motedepasseUser != "") {
        $sql = "UPDATE {$table} SET
                  {$emailUserCol}='$emailUser'
                  ,{$idRangUserCol}='$idrangUser'
                  ,{$mot_de_passeUserCol}=MD5('$motedepasseUser')
                  ,{$date_inscUserCol}='$dateinscUser'
                  ,{$nomUserCol}='$nomUserslach'
                  ,{$prenomUserCol}='$prenomUserslash'
                  ,{$newslettreUserCol}='$newslettreUser'
                  ,{$statutsocialUserCol}='$statutsocialUser'
                  ,{$genreUserCol}='$genreUser'
                  WHERE {$idUserCol}=" . $id;
    }else{
    $sql = "UPDATE {$table} SET
                  {$emailUserCol}='$emailUser'
                  ,{$idRangUserCol}='$idrangUser'
                  ,{$date_inscUserCol}='$dateinscUser'
                  ,{$nomUserCol}='$nomUserslach'
                  ,{$prenomUserCol}='$prenomUserslash'
                  ,{$newslettreUserCol}='$newslettreUser'
                  ,{$statutsocialUserCol}='$statutsocialUser'
                  ,{$genreUserCol}='$genreUser'
                  WHERE {$idUserCol}=" . $id;
    }

    $resultat = $utilisateur->getPDO()->query($sql);
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>