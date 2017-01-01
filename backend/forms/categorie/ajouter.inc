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
    <form name="categorieform" action="../../actions/categorie/ajouterAction.php" method="post">
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
                        <input class="form-control" type="text" name="nomcategorie"/>
                    </td>
                </tr>
                <tr id="iddesc" class="info">
                    <td>
                        <label>Description Categorie</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="descriptioncategorie"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer categorie" onclick="valider(categorieform,'ajoutercategorie')"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>