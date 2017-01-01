<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/press/Press.php';
    require_once '../../module/model/support/Support.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Press();
        $press = $model->getPress($id);
        $data=$press->fetch();
        $idsupport=$data["id_support_press"];
        $support =new Support();
        $listSupport = $support->getSupport();
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
            <h1>Presse</h1>
            <h3>Modification de la presse <?php echo($data["titre_press"])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form enctype="multipart/form-data" name="pressForm" action="../../actions/press/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="titrepress" value="<?php echo($data['titre_press'])?>"/>
                    </td>
                </tr>
                <tr id="idlien" class="info">
                    <td>
                        <label>Modifier Document</label>
                    </td>
                    <td>
                        <input type="file" name="modifierlienpress"/>
                    </td>
                </tr>
                <tr id="iddate" class="info">
                    <td>
                        <label>Date d'apparition</label>
                    </td>
                    <td>
                        <input type="date" name="datepress" value="<?php echo($data['date_press'])?>" >
                    </td>
                </tr>
                <tr id="idsupport" class="info">
                    <td>
                        <label>Support</label>
                    </td>
                    <td>
                        <select name="idsupportpress">
                            <?php
                            while($dataSupport=$listSupport->fetch()) {
                                if ($dataSupport["id_support"]!=$idsupport) {
                                    echo("<option value='" . $dataSupport["id_support"] . "'>");
                                    echo($dataSupport["nom_support"]);
                                    echo("</option>");
                                }else{
                                    echo("<option selected value='" . $dataSupport["id_support"] . "'>");
                                    echo($dataSupport["nom_support"]);
                                    echo("</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Valider" onclick="valider(pressForm,'ajouterpress')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_press"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                        <input type="hidden" name="lienpress" value="<?php echo($data['lien_press'])?>"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/press/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>