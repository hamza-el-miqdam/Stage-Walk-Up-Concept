<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css"  >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>
<div class="container">
    <div class="well row">
<a href="../../admin/newslettre/editer.php">
    <div class="btn btn-primary">Editer les newslettres</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class="container">
    <form enctype="multipart/form-data" name="newslettreForm" action="../../actions/newslettre/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr class="danger">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idobjet" class="info">
                <td>
                    <label>Objet</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="objetnewslettre"/>
                </td>
            </tr>
            <tr id="idtext" class="info">
                <td>
                    <label>text</label>
                </td>
                <td>
                    <textarea name="textnewslettre"></textarea>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer newslettre" onclick="valider(newslettreForm,'ajouternewslettre')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>

</div>
</body>
</html>