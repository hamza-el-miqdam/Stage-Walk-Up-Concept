<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 16/08/2015
 * Time: 12:24 AM
 */

class Newslettre extends Connection{
    private $idNewslettre;
    private $objetNewslettre;
    private $textNewslettre;
    private $date_envoieNewslettre;


    private $idNewslettreCol="id_newslettre";
    private $objetNewslettreCol="objet_newslettre";
    private $textNewslettreCol="text_newslettre";
    private $date_envoieNewslettreCol="date_envoie_newslettre";

    private $table="newslettre";

    public function __construct($objet=NULL,$text=NULL,$date_envoie=NULL){
        $this->objetNewslettre=$objet;
        $this->textNewslettre=$text;
        $this->date_envoieNewslettre=$date_envoie;
    }

    #CREATE
    public function saveNewslettre(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->objetNewslettre}','{$this->textNewslettre}','{$this->date_envoieNewslettre}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getNewslettre($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idNewslettreCol}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteNewslettre($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idNewslettreCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateNewslettre($id,$objet,$text,$date_envoie)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->objetNewslettreCol}='$objet'
                  ,{$this->textNewslettreCol}='$text'
                  ,{$this->date_envoieNewslettreCol}='$date_envoie'
                  WHERE {$this->idNewslettreCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>