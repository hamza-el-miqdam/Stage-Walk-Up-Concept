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
    <a href="../../admin/rang/editer.php">
        <div class="btn btn-primary">Editer les rangs</div></a>
    <a href="../../admin/index.php">
        <div class="btn btn-danger">Annuler</div></a>
</div></div>
<div id="form" class="container">
    <form name="rangform" action="../../actions/rang/ajouterAction.php" method="post">
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
                        <input class="form-control" type="text" name="titrerang"/>
                    </td>
                </tr>
                <tr id="idperm" class="info">
                    <td>
                        <label>Permitions</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="permissionrang"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer rang" onclick="valider(rangform,'ajouterrang')"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>