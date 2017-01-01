<?php
require_once '../../module/Connection.php';
require_once '../../module/model/article/Article.php';

$titreArticle=(isset($_POST{"titrearticle"}))?$_POST{"titrearticle"}:"";
$idmediaArticle=(isset($_POST{"idmediaarticle"}))?$_POST{"idmediaarticle"}:"";
$textArticle=(isset($_POST{"textarticle"}))?$_POST{"textarticle"}:"";
$id=(isset($_POST{"id"}))?$_POST{"id"}:"";

$visibleArticle = isset($_POST["visiblearticle"]) ? true : false;

echo($titreArticle."<br/>".$idmediaArticle."<br/>".$textArticle."<br/>".$id."<br/>".$visibleArticle);

if($id!=""&&$titreArticle!=""&&$idmediaArticle!=""&&$textArticle!="") {
    $article = new Article();
    $resultat = $article->updateArticle($id,addslashes($titreArticle),$idmediaArticle,addslashes($textArticle),$visibleArticle);
    if ($resultat) {
        echo("Enregistrement réussie");
    } else {
        echo("Echec d'enregistrement");
    }
}else{
    echo("vous n'avais pas le droit d'accés à cette page");
}?>