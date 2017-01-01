<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/type_support_press/Type_support_press.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Type_support_press();
        $type_support_press = $model->getType_support_press($id);
        $data=$type_support_press->fetch();

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
            <h1>Article</h1>
            <h3>Modification de l'type_support_press <?php echo($data['nom_type_support_press'])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form name="typesuppform" action="../../actions/type_support_press/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="nomtypesupport" value="<?php echo($data['nom_type_support_press'])?>"/>
                    </td>
                </tr>
                <tr id="iddesc" class="info">
                    <td>
                        <label>Description</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="desctypesupport" value="<?php echo($data['desc_type_support_press'])?>"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer un type de support" onclick="valider(typesuppform,'ajoutertypesupport')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_type_support_press"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/type_support_press/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>