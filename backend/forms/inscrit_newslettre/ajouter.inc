<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css"  >
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Insert title here</title>
    <script language="javascript" src="../../js/validation.js"></script>
</head>
<body>

<div id="form" class="container">
    <div class="well row">
        <form name="inscritnewsForm" action="../../actions/inscrit_newslettre/ajouterAction.php" method="post">
        <table class="table table-hover">
            <tr class="danger">
                <td colspan=2 id="bloc_erreur">
                </td>
            </tr>
            <tr id="idemail" class="info">
                <td>
                    <label>Votre Email</label>
                </td>
                <td>
                    <input class="form-control" type="text" name="email"/>
                </td>
            </tr>
            <tr class="info">
                <td colspan=2>
                    <input class="btn btn-success" type="button"  value="inscrit a la newslettre" onclick="valider(inscritnewsForm,'ajouterinscritnews')"/>
                </td>
            </tr>
        </table>
    </form></div>
</div>
</body>
</html>