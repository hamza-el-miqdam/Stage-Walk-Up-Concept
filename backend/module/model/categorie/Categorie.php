<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 15/08/2015
 * Time: 03:22 AM
 */

class Categorie  extends Connection{
    private $idCategorie;
    private $nomCategorie;
    private $descriptionCategorie;

    private $idCategorieCol="id_categorie";
    private $nomCategorieCol="nom_categorie";
    private $descriptionCategorieCol="description_categorie";

    private $table="categorie";

    public function __construct($nom=NULL,$description=NULL){
        $this->nomCategorie=$nom;
        $this->descriptionCategorie=$description;
    }

    #CREATE
    public function saveCategorie(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->nomCategorie}','{$this->descriptionCategorie}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getCategorie($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idCategorieCol}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteCategorie($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idCategorieCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateCategorie($id,$nom,$description)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->nomCategorieCol}='$nom'
                  ,{$this->descriptionCategorieCol}='$description'
                  WHERE {$this->idCategorieCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>