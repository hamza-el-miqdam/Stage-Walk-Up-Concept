<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
    <head>
        <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" >
        <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
        <title>Insert title here</title>
    </head>
    <body>
        <header>
            <div class="jumbotron">
                <div class="container">
                    <h1>Inscrit NewsLettre</h1>
                    <h3>Gestion des Inscrit a la newslettre</h3>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="well row">
                <a href="../../admin/inscrit_newslettre/editer.php">
                    <div class="btn btn-primary">Editer la mediatheque</div></a>
                <a href="../../admin/index.php">
                    <div class="btn btn-danger"> Annuler</div></a>
            </div>
        </div>
        <?php

        include_once("../../forms/inscrit_newslettre/ajouter.inc");

        ?>
    </body>
</html>