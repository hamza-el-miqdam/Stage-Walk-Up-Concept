<?php
require_once '../../module/Connection.php';
require_once '../../module/model/mediatheque/Mediatheque.php';

$media =new Mediatheque();

$listMedia = $media->getMedia();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>
<div class="container">
    <div class="well row">
<a href="../../admin/article/editer.php">
    <div class="btn btn-primary">Editer les articles</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class="container">
    <form enctype="multipart/form-data" name="articleForm" action="../../actions/article/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr class="danger">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idtitre" class="info">
                <td>
                    <label>Titre</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="titrearticle"/>
                </td>
            </tr>
            <tr id="idtext" class="info">
                <td>
                    <label>Contenue</label>
                </td>
                <td>
                    <textarea class="form-control" name="textarticle"></textarea>
                </td>
            </tr>
            <tr id="idmedia" class="info">
            <td>
                <label>Media</label>
            </td>
            <td>
                <select name="idmediaarticle">
                    <option value=''>choisir une image</option>
                    <?php
                    while($dataMedia=$listMedia->fetch()){
                        echo("<option value='".$dataMedia["id_media"]."'>");
                        echo($dataMedia["titre_media"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr class="info">
                <td>
                    <label>Publier ?</label>
                </td>
                <td>
                    <input type="checkbox" name="visiblearticle"/>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer article" onclick="valider(articleForm,'ajouterarticle')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>