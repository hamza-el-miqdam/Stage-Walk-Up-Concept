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
                    <h1>Utilisateur</h1>
                    <h3>Gestion des Utilisateurs</h3>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="well row">
                <a href="editer.php">
                    <div class="btn btn-primary">Editer les rangs</div></a>
                <a href="../index.php">
                    <div class="btn btn-danger">Annuler</div></a>
            </div>
        </div>
        <?php

        include_once("../../forms/utilisateur/ajouter.inc");

        ?>
    </body>
</html>