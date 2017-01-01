<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/utilisateur/Utilisateur.php';
    require_once '../../module/model/rang/Rang.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Utilisateur();
        $user = $model->getUser($id);
        $data=$user->fetch();
        $idrang=$data["id_rang_user"];
        $rang =new Rang();
        $listRang = $rang->getRang();
    }else{
        echo("vous n'avais pas le droit d'acceder a cette page");
    }



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <script language="javascript" src="../../js/validation.js"></script>
    <title>Insert title here</title>
</head>
<body>
<header>
    <div class="jumbotron">
        <div class="container">
            <h1>Utilisateur</h1>
            <h3>Modification du profile de <?php echo($data['genre_user'])?> <?php echo($data['nom_user'])?> <?php echo($data['prenom_user'])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form name="userform" action="../../actions/utilisateur/editerAction.php" method="post">
        <div class="well row">
            <table class="table table-hover">
                <tr class="danger">
                    <td colspan=2 id="bloc_erreur">
                    </td>
                </tr>
                <tr id="idnomuser" class="info">
                    <td>
                        <label>Nom</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="nomuser" value="<?php echo($data['nom_user'])?>"/>
                    </td>
                </tr>
                <tr id="idprenom"  class="info">
                    <td>
                        <label>Prenom</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="prenomuser" value="<?php echo($data['prenom_user'])?>" />
                    </td>
                </tr>

                <tr id="idemail" class="info">
                    <td>
                        <label>E-mail</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="emailuser" value="<?php echo($data['email_user'])?>"/>
                    </td>
                </tr>

                <tr id="idpwd" class="info">
                    <td>
                        <label>Modifier mot de passe</label>
                    </td>
                    <td>
                        <input class="form-control" type="password" name="modifierpwduser"/>
                    </td>
                </tr>

                <tr id="idpwdt" class="info">
                    <td>
                        <label>ressaisir votre mot de passe</label>
                    </td>
                    <td>
                        <input class="form-control" type="password" name="modifierpwdtest"/>
                    </td>
                </tr>


                <tr id="idnews" class="info">
                    <td>
                        <label>newsLettre</label>
                    </td>
                    <td>
                        <input class="form-control" type="checkbox" name="newslettreuser" <?php if($data["newslettre_user"]){echo('checked');}?> />
                    </td>
                </tr>
                <tr id="idrang" class="info">
                    <td>
                        <label>Rang</label>
                    </td>
                    <td>
                        <select name="idranguser">
                            <option value=''>choisir un rang</option>
                            <?php
                                while ($dataRang = $listRang->fetch()) {
                                if($dataRang["id_rang"]!=$idrang) {
                                    echo("<option value='" . $dataRang["id_rang"] . "'>");
                                    echo($dataRang["titre_rang"]);
                                    echo("</option>");
                                }else{
                                    echo("<option selected value='" . $dataRang["id_rang"] . "'>");
                                    echo($dataRang["titre_rang"]);
                                    echo("</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr id="idstatut" class="info">
                    <td>
                        <label>Statut Social (facultatif)</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="statutuser" value="<?php echo($data['statut_social_user'])?>"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Modifier" onclick="valider(userform,'ajouteruser')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_user"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                        <input type="hidden" name="genreuser" value="<?php echo($data['genre_user'])?>"/>
                        <input class="form-control" type="hidden" name="pwduser" value="<?php echo($data['mot_de_passe_user'])?>"/>
                        <input class="form-control" type="hidden" name="pwdtest" value="<?php echo($data['mot_de_passe_user'])?>"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/utilisateur/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>