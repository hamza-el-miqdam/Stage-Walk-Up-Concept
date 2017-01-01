<?php
require_once '../../module/Connection.php';
require_once '../../module/model/support/Support.php';

$support =new Support();

$listSupport = $support->getSupport();
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
<a href="../../admin/press/editer.php">
    <div class="btn btn-primary">Editer les presss</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class="container">
    <form enctype="multipart/form-data" name="pressForm" action="../../actions/press/ajouterAction.php" method="post">
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
                    <input class="form-control" type="text" name="titrepress"/>
                </td>
            </tr>
            <tr id="idlien" class="info">
                <td>
                    <label>Document</label>
                </td>
                <td>
                    <input type="file" name="lienpress"/>
                </td>
            </tr>
            <tr id="iddate" class="info">
                <td>
                    <label>Date d'apparition</label>
                </td>
                <td>
                    <input type="date" name="datepress" value="2015-01-15">
                </td>
            </tr>
            <tr id="idsupport" class="info">
            <td>
                <label>Support</label>
            </td>
            <td>
                <select name="idsupportpress">
                    <option value=''>choisir un support</option>
                    <?php
                    while($dataSupport=$listSupport->fetch()){
                        echo("<option value='".$dataSupport["id_support"]."'>");
                        echo($dataSupport["nom_support"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer press" onclick="valider(pressForm,'ajouterpress')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>