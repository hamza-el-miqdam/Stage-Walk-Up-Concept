<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 16/08/2015
 * Time: 12:19 AM
 */

class Article extends Connection{
    private $idArticle;
    private $titreArticle;
    private $id_media_article;
    private $textArticle;
    private $visibleArticle;

    private $idArticleCol="id_article";
    private $titreArticleCol="titre_article";
    private $idMediaArticleCol="id_media_article";
    private $textArticleCol="text_article";
    private $visibleArticleCol="visible_article";

    private $table="article";

    public function __construct($titre=NULL,$idmedia=NULL,$text=NULL,$visible=NULL){
        $this->titreArticle=$titre;
        $this->textArticle=$text;
        $this->id_media_article=$idmedia;
        $this->visibleArticle=$visible;
    }


    #CREATE
    public function saveArticle(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->titreArticle}','{$this->id_media_article}','{$this->textArticle}','{$this->visibleArticle}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getArticle($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idArticleCol}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteArticle($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idArticleCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateArticle($id,$titre,$idmedia,$text,$visible)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->titreArticleCol}='$titre'
                  ,{$this->idMediaArticleCol}='$idmedia'
                  ,{$this->textArticleCol}='$text'
                  ,{$this->visibleArticleCol}='$visible'
                  WHERE {$this->idArticleCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>