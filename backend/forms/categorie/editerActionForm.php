<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/categorie/Categorie.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Categorie();
        $categorie = $model->getCategorie($id);
        $data=$categorie->fetch();
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
            <h1>Categorie</h1>
            <h3>Modification de la categorie <?php echo($data["nom_categorie"])?></h3>
        </div>
    </div>
</header>



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

        <a href="../../admin/categorie/editer.php">
            <div class="btn btn-primary">Editer les categories</div></a>
        <a href="../../admin/index.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
<div id="form" class="container">
    <form name="categorieform" action="../../actions/categorie/editerAction.php" method="post">
        <div class="well row">
            <table class="table table-hover">
                <tr class="danger">
                    <td colspan=2 id="bloc_erreur">
                    </td>
                </tr>
                <tr id="idnom" class="info">
                    <td>
                        <label>Nom Categorie</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="nomcategorie" value="<?php echo($data['nom_categorie'])?>"/>
                    </td>
                </tr>
                <tr id="iddesc" class="info">
                    <td>
                        <label>Description Categorie</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="descriptioncategorie" value="<?php echo($data['description_categorie'])?>"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer categorie" onclick="valider(categorieform,'ajoutercategorie')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_categorie"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>





<div class="container">
    <div class="well row">
        <a href="../../admin/categorie/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>