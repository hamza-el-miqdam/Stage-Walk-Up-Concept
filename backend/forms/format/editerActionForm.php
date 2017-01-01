<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/format/Format.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Format();
        $format = $model->getFormat($id);
        $data=$format->fetch();
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
            <h1>Format</h1>
            <h3>Modification de la format <?php echo($data["type_format"])?></h3>
        </div>
    </div>
</header>
<div id="form" class="container">
    <form name="formatForm" action="../../actions/format/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="typeformat" value="<?php echo($data['type_format'])?>"/>
                    </td>
                </tr>
                <tr id="idextformat" class="info">
                    <td>
                        <label>Extensions Format</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="extformat" value="<?php echo($data['ext_format'])?>"/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer format" onclick="valider(formatForm,'ajouterformat')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_format"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/format/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>