<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 15/08/2015
 * Time: 11:55 PM
 */

class Support  extends Connection{
    private $idSupport;
    private $nomSupport;
    private $iconSupport;
    private $id_type_support;

    private $idSupportCol="id_support";
    private $nomSupportCol="nom_support";
    private $iconSupportCol="icon_support";
    private $idTypeSupportCol="id_type_support";

    private $table="support";

    public function __construct($nom=NULL,$icon=NULL,$idtype=NULL){
        $this->nomSupport=$nom;
        $this->iconSupport=$icon;
        $this->id_type_support=$idtype;
    }

    #CREATE
    public function saveSupport(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->nomSupport}','{$this->iconSupport}','{$this->id_type_support}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getSupport($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idSupportCol}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteSupport($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idSupportCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateSupport($id,$nom,$icon,$idtype)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->nomSupportCol}='$nom'
                  ,{$this->iconSupportCol}='$icon'
                  ,{$this->idTypeSupportCol}='$idtype'
                  WHERE {$this->idSupportCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>