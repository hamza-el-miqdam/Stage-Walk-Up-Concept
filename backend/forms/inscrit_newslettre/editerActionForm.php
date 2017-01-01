<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/inscrit_newslettre/Inscrit_newslettre.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new InscritNewsLettre();
        $inscrit = $model->getInscrit($id);
        $data=$inscrit->fetch();
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
            <h1>Inscrits a la newslettre</h1>
            <h3>Modification de l'inscrit <?php echo($data["email_inscrit"])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <div class="well row">
        <form name="inscritnewsForm" action="../../actions/inscrit_newslettre/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="email" value="<?php echo($data['email_inscrit'])?>"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="inscrit a la newslettre" onclick="valider(inscritnewsForm,'ajouterinscritnews')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_inscrit"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/inscrit_newslettre/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>