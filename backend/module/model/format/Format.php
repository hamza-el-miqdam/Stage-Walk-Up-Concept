<?php

class Format  extends Connection{

    private $idFormat;
    private $typeFormat;
    private $extFormat;

    private $idFormatCol="id_format";
    private $typeFormatCol="type_format";
    private $extFormatCol="ext_format";

    private $table="format";

    public function __construct($type=NULL,$ext=NULL){
        $this->typeFormat=$type;
        $this->extFormat=$ext;
    }

    #CREATE
    public function saveFormat(){
        $sql="INSERT INTO {$this->table} VALUES('','{$this->typeFormat}','{$this->extFormat}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getExtensionFormmat($id){
        $sql="SELECT {$this->extFormatCol} FROM {$this->table} WHERE {$this->idFormatCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    public function getFormat($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idFormatCol}=".$id;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteFormat($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idFormatCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateFormat($id,$type,$ext)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->typeFormatCol}='$type'
                  ,{$this->extFormatCol}='$ext'
                  WHERE {$this->idFormatCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}