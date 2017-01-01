<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 15/08/2015
 * Time: 03:48 AM
 */
class Type_support_press  extends Connection{
private $idtype_support_press;
private $nomtype_support_press;
private $desctype_support_press;

private $idtype_support_pressCol="id_type_support_press";
private $nomtype_support_pressCol="nom_type_support_press";
private $desctype_support_pressCol="desc_type_support_press";

private $table="type_support_press";

public function __construct($nom=NULL,$desc=NULL){
    $this->nomtype_support_press=$nom;
    $this->desctype_support_press=$desc;
}

#CREATE
public function saveType_support_press(){
    $sql="INSERT INTO {$this->table} VALUES('','{$this->nomtype_support_press}','{$this->desctype_support_press}')";
    $query =$this->getPDO()->query($sql);
    return $query;
}
#READ
public function getType_support_press($id=NULL){
    if($id !=null){
        $sql="SELECT * FROM {$this->table} WHERE {$this->idtype_support_pressCol}=".$id;
    }else{
        $sql="SELECT * FROM {$this->table}";
    }
    $query=$this->getPDO()->query($sql);
    return $query;
}
#DELETE
public function deleteType_support_press($id){
    $sql="DELETE FROM {$this->table} WHERE {$this->idtype_support_pressCol}=".$id;
    $query=$this->getPDO()->query($sql);
    return $query;
}
#UPDATE
public function updateType_support_press($id,$nom,$desc)
{
    $sql = "UPDATE {$this->table} SET
                  {$this->nomtype_support_pressCol}='$nom'
                  ,{$this->desctype_support_pressCol}='$desc'
                  WHERE {$this->idtype_support_pressCol}=".$id;
    $query = $this->getPDO()->query($sql);
    return $query;
}
}?>