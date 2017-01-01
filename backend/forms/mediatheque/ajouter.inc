<?php
require_once '../../module/Connection.php';
require_once '../../module/model/format/Format.php';

$format =new Format();

$listFormat = $format->getFormat();
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
<div class="container">
    <div class="well row">
<a href="../../admin/mediatheque/editer.php">
    <div class="btn btn-primary">Editer les medias</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class="container">
    <form enctype="multipart/form-data" name="mediaForm" action="../../actions/mediatheque/ajouterAction.php" method="post">
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
                    <input class="form-control" type="text" name="titremedia"/>
                </td>
            </tr>
            <tr id="idlien" class="info">
                <td>
                    <label>Lien</label>
                </td>
                <td>
                    <input type="file" name="lienmedia"/>
                </td>
            </tr>
            <tr id="iddesc" class="info">
                <td>
                    <label>Description</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="descriptionmedia"/>
                </td>
            </tr>
            <tr id="idformat" class="info">
            <td>
                <label>Format</label>
            </td>
            <td>
                <select name="idformatmedia">
                    <option value=''>choisir une fomrat</option>
                    <?php
                    while($dataFormat=$listFormat->fetch()){
                        echo("<option value='".$dataFormat["id_format"]."'>");
                        echo($dataFormat["type_format"]);
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
                    <input type="checkbox" name="visiblemedia"/>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer media" onclick="valider(mediaForm,'ajoutermedia')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>