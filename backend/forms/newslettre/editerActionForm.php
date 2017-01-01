<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/newslettre/Newslettre.php';
    require_once '../../module/model/mediatheque/Mediatheque.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Newslettre();
        $newslettre = $model->getNewslettre($id);
        $data=$newslettre->fetch();
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
            <h1>Newslettre</h1>
            <h3>Modification de la newslettre d'objet : <?php echo($data["objet_newslettre"])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form enctype="multipart/form-data" name="newslettreForm" action="../../actions/newslettre/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="objetnewslettre" value="<?php echo($data['objet_newslettre'])?>"/>
                    </td>
                </tr>
                <tr id="idtext" class="info">
                    <td>
                        <label>text</label>
                    </td>
                    <td>
                        <textarea name="textnewslettre"><?php echo($data['text_newslettre'])?></textarea>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Valider" onclick="valider(newslettreForm,'ajouternewslettre')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_newslettre"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/newslettre/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>