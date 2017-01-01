<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 16/08/2015
 * Time: 12:10 AM
 */

class Press  extends Connection{
    private $idPress;
    private $titrePress;
    private $lienPress;
    private $id_support_press;
    private $datePress;

    private $idPressCol="id_press";
    private $titrePressCol="titre_press";
    private $lienPressCol="lien_press";
    private $idSupportPressCol="id_support_press";
    private $datePressCol="date_press";

    private $table="press";

    public function __construct($titre=NULL,$lien=NULL,$idsupport=NULL,$date=NULL){
        $this->titrePress=$titre;
        $this->lienPress=$lien;
        $this->id_support_press=$idsupport;
        $this->datePress=$date;
    }

    #CREATE
    public function savePress(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->titrePress}','{$this->lienPress}','{$this->id_support_press}','{$this->datePress}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getPress($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idPressCol}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deletePress($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idPressCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updatePress($id,$titre,$lien,$idsupport,$date)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->titrePressCol}='$titre'
                  ,{$this->lienPressCol}='$lien'
                  ,{$this->idSupportPressCol}='$idsupport'
                  ,{$this->datePressCol}='$date'
                  WHERE {$this->idPressCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>