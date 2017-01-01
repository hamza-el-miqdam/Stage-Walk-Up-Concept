<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/support/Support.php';
    require_once '../../module/model/type_support_press/Type_support_press.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Support();
        $support = $model->getSupport($id);
        $data=$support->fetch();
        $idtype=$data["id_type_support"];
        $type =new Type_support_press();
        $listType = $type->getType_support_press();
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
            <h1>Support</h1>
            <h3>Modification de l'support <?php echo($data["nom_support"])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form enctype="multipart/form-data" name="supportForm" action="../../actions/support/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="nomsupport" value="<?php echo($data['nom_support'])?>"/>
                    </td>
                </tr>
                <tr id="idicon" class="info">
                    <td>
                        <label>Modifier Icon</label>
                    </td>
                    <td>
                        <input class="form-control" type="file" name="modifiericonsupport"/>
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
                            while($datatypeSupport=$listType->fetch()) {
                                if ($datatypeSupport["id_type_support_press"]!=$idtype) {
                                    echo("<option value='" . $datatypeSupport["id_type_support_press"] . "'>");
                                    echo($datatypeSupport["nom_type_support_press"]);
                                    echo("</option>");
                                }else{
                                    echo("<option selected value='" . $datatypeSupport["id_type_support_press"] . "'>");
                                    echo($datatypeSupport["nom_type_support_press"]);
                                    echo("</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer support" onclick="valider(supportForm,'ajoutersupport')"/>
                        <input type="hidden" name="id" value="<?php echo $data['id_support'] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                        <input type="hidden" name="iconsupport" value="<?php echo $data['icon_support'] ?>" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/support/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>