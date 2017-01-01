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
<a href="../../admin/format/editer.php">
    <div class="btn btn-primary">Editer les formats</div></a>
<a href="../../admin/index.php">
    <div class="btn btn-danger"> Annuler</div></a>
</div></div>
<div id="form" class="container">
    <form name="formatForm" action="../../actions/format/ajouterAction.php" method="post">
        <div class="well row">
        <table class="table table-hover">
            <tr class="danger">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idtypeformat" class="info">
                <td>
                    <label>Type Format</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="typeformat"/>
                </td>
            </tr>
            <tr id="idextformat" class="info">
                <td>
                    <label>Extensions Format</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="extformat"/>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="Creer format" onclick="valider(formatForm,'ajouterformat')"/>
                </td>
            </tr>
        </table>
        </div>
    </form>
</div>
</body>
</html>