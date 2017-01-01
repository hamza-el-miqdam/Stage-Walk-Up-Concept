<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/format/Format.php';
    require_once '../../module/model/mediatheque/Mediatheque.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){

        $model =new Mediatheque();
        $media = $model->getMedia($id);
        $data=$media->fetch();

        $format = new Format();
        $listFormat = $format->getFormat();
        $idformat=$data["id_format_media"];

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
            <h1>Mediatheque</h1>
            <h3>Modification de <?php echo($data["titre_media"])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form enctype="multipart/form-data" name="mediaForm" action="../../actions/mediatheque/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="titremedia" value="<?php echo($data['titre_media'])?>"/>
                    </td>
                </tr>
                <tr id="idlien" class="info">
                    <td>
                        <label>Modifier Lien</label>
                    </td>
                    <td>
                        <input type="file" name="modifierlienmedia" value="non medifier"/>
                    </td>
                </tr>
                <tr id="iddesc" class="info">
                    <td>
                        <label>Description</label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="descriptionmedia" value="<?php echo($data['description_media'])?>"/>
                    </td>
                </tr>
                <tr id="idformat" class="info">
                    <td>
                        <label>Format</label>
                    </td>
                    <td>
                        <select name="idformatmedia">
                            <?php
                            while($dataFormat=$listFormat->fetch()){
                                if($dataFormat['id_format']!=$idformat){
                                echo("<option value='".$dataFormat["id_format"]."'>");
                                echo($dataFormat["type_format"]);
                                echo("</option>");
                                } else{
                                    echo("<option selected value='".$dataFormat["id_format"]."'>");
                                    echo($dataFormat["type_format"]);
                                    echo("</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="info">
                    <td>
                        <label>Publier ?</label>
                    </td>
                    <td>
                        <input type="checkbox" name="visiblemedia" <?php if($data["visible_media"]){echo("checked");}?>/>
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Creer media" onclick="valider(mediaForm,'ajoutermedia')"/>
                        <input type="hidden" name="id" value="<?php echo $data['id_media'] ?>" />
                        <input type="hidden" name="lienmedia" value="<?php echo $data['lien_media']?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/mediatheque/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>