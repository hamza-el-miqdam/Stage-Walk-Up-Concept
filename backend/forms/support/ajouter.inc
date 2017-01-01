<?php
require_once '../../module/Connection.php';
require_once '../../module/model/type_support_press/Type_support_press.php';


$typeSupport =new Type_support_press();

$listtypeSupport = $typeSupport->getType_support_press();
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
    <a href="../../admin/support/editer.php">
    <div class="btn btn-primary">Editer les supports</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class="container">
    <form enctype="multipart/form-data" name="supportForm" action="../../actions/support/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr class="danger">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idnom" class="info">
                <td>
                    <label>Nom</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="nomsupport"/>
                </td>
            </tr>
            <tr id="idicon" class="info">
                <td>
                    <label>Icon</label>
                </td>
                <td>
                    <input class="form-control" type="file" name="iconsupport"/>
                </td>
            </tr>
            <tr id="idtype" class="info">
            <td>
                <label>Type de Support</label>
            </td>
            <td>
                <select name="idTypesupport">
                    <option value=''>choisir un type de support</option>
                    <?php
                    while($datatypeSupport=$listtypeSupport->fetch()){
                        echo("<option value='".$datatypeSupport["id_type_support_press"]."'>");
                        echo($datatypeSupport["nom_type_support_press"]);
                        echo("</option>");
                    }
                    ?>
                </select>
            </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer support" onclick="valider(supportForm,'ajoutersupport')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>