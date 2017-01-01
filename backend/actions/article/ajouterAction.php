<?php
require_once '../../module/Connection.php';//import
require_once '../../module/model/article/Article.php';

$titreArticle=(isset($_POST{"titrearticle"}))?$_POST{"titrearticle"}:"";
$idmediaArticle=(isset($_POST{"idmediaarticle"}))?$_POST{"idmediaarticle"}:"";
$textArticle=(isset($_POST{"textarticle"}))?$_POST{"textarticle"}:"";

$visibleArticle = isset($_POST["visiblearticle"]) ? true : false;

if($titreArticle!=""&&$idmediaArticle!=""&&$textArticle!="") {
    $article = new Article(addslashes($titreArticle),$idmediaArticle,addslashes($textArticle),$visibleArticle);
    $resultat = $article->saveArticle();
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avez pas le droit d'accés à cette page");
}?>