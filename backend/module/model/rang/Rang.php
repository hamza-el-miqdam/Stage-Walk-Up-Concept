<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 15/08/2015
 * Time: 03:22 AM
 */

class Rang  extends Connection{
    private $idRang;
    private $titreRang;
    private $permissionRang;

    private $idRangCol="id_rang";
    private $titreRangCol="titre_rang";
    private $permissionRangCol="permission_rang";

    private $table="rang";

        public function __construct($titre=NULL,$permission=NULL){
            $this->titreRang=$titre;
            $this->permissionRang=$permission;
        }

        #CREATE
        public function saveRang(){
            $sql="INSERT INTO {$this->table} VALUES('','{$this->titreRang}','{$this->permissionRang}')";
            $query =$this->getPDO()->query($sql);
            return $query;
        }
        #READ
        public function getRang($id=NULL){
            if($id !=null){
                $sql="SELECT * FROM {$this->table} WHERE {$this->idRangCol}=".$id;
            }else{
                $sql="SELECT * FROM {$this->table}";
            }
            $query=$this->getPDO()->query($sql);
            return $query;
        }
        #DELETE
        public function deleteRang($id){
            $sql="DELETE FROM {$this->table} WHERE {$this->idRangCol}=".$id;
            $query=$this->getPDO()->query($sql);
            return $query;
        }
        #UPDATE
        public function updateRang($id,$titre,$permission)
        {
            $sql = "UPDATE {$this->table} SET
                  {$this->titreRangCol}='$titre'
                  ,{$this->permissionRangCol}='$permission'
                  WHERE {$this->idRangCol}=".$id;
            $query = $this->getPDO()->query($sql);
            return $query;
        }
}?>