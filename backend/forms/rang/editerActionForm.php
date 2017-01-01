<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/rang/Rang.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Rang();
        $rang = $model->getRang($id);
        $data=$rang->fetch();

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
            <h1>Rang</h1>
            <h3>Modification du rang <?php echo($data["titre_rang"])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form name="rangform" action="../../actions/rang/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="titrerang" value="<?php echo($data['titre_rang'])?>"/>
                    </td>
                </tr>
                <tr id="idperm" class="info">
                    <td>
                        <label>Permitions</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="permissionrang" value="<?php echo($data['permission_rang'])?>"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer rang" onclick="valider(rangform,'ajouterrang')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_rang"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/rang/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>