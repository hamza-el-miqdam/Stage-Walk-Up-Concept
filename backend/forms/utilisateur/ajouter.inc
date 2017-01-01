<?php
require_once '../../module/Connection.php';
require_once '../../module/model/rang/Rang.php';

$rang =new Rang();

$listRang = $rang->getRang();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css"  >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>
<div id="form" class="container">
    <form name="userform" action="../../actions/utilisateur/ajouterAction.php" method="post">
        <div class="well row">
            <table class="table table-hover">
                <tr class="danger">
                    <td colspan=2 id="bloc_erreur">
                    </td>
                </tr>
                <tr id="idgenre" class="info">
                    <td>
                        <label>Vous etes</label>
                    </td>
                    <td>
                        <select name="genreuser">
                            <option value=''>choisir</option>
                            <option value="Mm">Madame</option>
                            <option value="Melle">Mademoiselle</option>
                            <option value="Mr">Monsieur</option>
                        </select>
                    </td>
                </tr>
                <tr id="idnomuser" class="info">
                    <td>
                        <label>Nom</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="nomuser"/>
                    </td>
                </tr>
                <tr id="idprenom"  class="info">
                    <td>
                        <label>Prenom</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="prenomuser"/>
                    </td>
                </tr>

                <tr id="idemail" class="info">
                    <td>
                        <label>E-mail</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="emailuser"/>
                    </td>
                </tr>

                <tr id="idpwd" class="info">
                    <td>
                        <label>mot de passe</label>
                    </td>
                    <td>
                        <input class="form-control" type="password" name="pwduser"/>
                    </td>
                </tr>

                <tr id="idpwdt" class="info">
                    <td>
                        <label>ressaisir votre mot de passe</label>
                    </td>
                    <td>
                        <input class="form-control" type="password" name="pwdtest"/>
                    </td>
                </tr>


                <tr id="idnews" class="info">
                    <td>
                        <label>newsLettre</label>
                    </td>
                    <td>
                        <input class="form-control" type="checkbox" name="newslettreuser"/>
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
                            while($dataRang=$listRang->fetch()){
                                echo("<option value='".$dataRang["id_rang"]."'>");
                                echo($dataRang["titre_rang"]);
                                echo("</option>");
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
                        <input class="form-control" type="text" name="statutuser"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="s'inscrir" onclick="valider(userform,'ajouteruser')"/>
                        <input class="form-control" type="hidden" name="modifierpwduser" />
                        <input class="form-control" type="hidden" name="modifierpwdtest" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>