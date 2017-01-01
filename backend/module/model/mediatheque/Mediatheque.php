<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 16/08/2015
 * Time: 12:34 AM
 */

class Mediatheque extends Connection{
    private $idMedia;
    private $titreMedia;
    private $lienMedia;
    private $id_format_media;
    private $descriptionMedia;
    private $visibleMedia;


    private $idMediaCol="id_media";
    private $titreMediaCol="titre_media";
    private $lienMediaCol="lien_media";
    private $idFormatMediaCol="id_format_media";
    private $descriptionMediaCol="description_media";
    private $visibleMediaCol="visible_media";

    private $table="mediatheque";

    public function __construct($titre=NULL,$lien=NULL,$idFormat=NULL,$description=NULL,$visible=NULL){
        $this->titreMedia=$titre;
        $this->lienMedia=$lien;
        $this->id_format_media=$idFormat;
        $this->descriptionMedia=$description;
        $this->visibleMedia=$visible;
    }

    #CREATE
    public function saveMedia(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->titreMedia}','{$this->lienMedia}','{$this->id_format_media}','{$this->descriptionMedia}','{$this->visibleMedia}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getMedia($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idMediaCol}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteMedia($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idMediaCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateMedia($id,$titre,$lien,$idFormat,$description,$visible)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->titreMediaCol}='$titre'
                  ,{$this->lienMediaCol}='$lien'
                  ,{$this->idFormatMediaCol}='$idFormat'
                  ,{$this->descriptionMediaCol}='$description'
                  ,{$this->visibleMediaCol}='$visible'
                  WHERE {$this->idMediaCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>