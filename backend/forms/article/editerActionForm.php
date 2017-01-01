<?php
    require_once '../../module/Connection.php';
    require_once '../../module/model/article/Article.php';
    require_once '../../module/model/mediatheque/Mediatheque.php';
    $id = (isset($_GET["id"]))?$_GET["id"]:"";

    if($id!=""){
        $model = new Article();
        $article = $model->getArticle($id);
        $data=$article->fetch();
        $idmedia=$data["id_media_article"];
        $media =new Mediatheque();
        $listMedia = $media->getMedia();
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
            <h1>Article</h1>
            <h3>Modification de l'article <?php echo($data["titre_article"])?></h3>
        </div>
    </div>
</header>



<div id="form" class="container">
    <form enctype="multipart/form-data" name="articleForm" action="../../actions/article/editerAction.php" method="post">
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
                        <input class="form-control" type="text" name="titrearticle" value="<?php echo($data["titre_article"])?>"/>
                    </td>
                </tr>
                <tr id="idtext" class="info">
                    <td>
                        <label>Contenue</label>
                    </td>
                    <td>
                        <textarea class="form-control" name="textarticle"><?php echo($data["text_article"])?></textarea>
                    </td>
                </tr>
                <tr id="idmedia" class="info">
                    <td>
                        <label>Media</label>
                    </td>
                    <td>
                        <select name="idmediaarticle">
                            <?php
                            while($dataMedia=$listMedia->fetch()){
                                if($dataMedia["id_media"]!=$idmedia){
                                echo("<option value='".$dataMedia["id_media"]."'>");
                                echo($dataMedia["titre_media"]);
                                echo("</option>");}
                                else{
                                    echo("<option selected value='".$dataMedia["id_media"]."'>");
                                    echo($dataMedia["titre_media"]);
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

                        <input type="checkbox" name="visiblearticle" checked <?php if($data["visible_article"]){echo("checked");}?> />
                    </td>
                </tr>
                <tr class="info">
                    <td colspan=2>
                        <input class="btn btn-success" type="button"  value="Valider" onclick="valider(articleForm,'ajouterarticle')"/>
                        <input type="hidden" name="id" value="<?php echo $data["id_article"] ?>" />
                        <input class="btn alert-warning" type="reset" value="Refresh"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </div>





<div class="container">
    <div class="well row">
        <a href="../../admin/article/editer.php">
            <div class="btn btn-danger">Annuler</div></a>
    </div></div>
</body>
</html>