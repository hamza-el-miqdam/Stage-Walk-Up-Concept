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
            <h1>Article</h1>
            <h3>Editeur des articles</h3>
        </div>
    </div>
</header>
<?php

include_once("../../forms/article/editer.inc");

?>
<div class="container">
    <div class="well row">
        <a href="editer.php">
            <div class="btn btn-success">Refresh</div></a>
        <a href="index.php">
            <div class="btn btn-primary">Gestion des articles</div></a>
        <a href="../../admin/index.php">
            <div class="btn btn-danger"> Annuler</div></a>
    </div></div>
</body>
</html>