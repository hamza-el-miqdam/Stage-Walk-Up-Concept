<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 15/08/2015
 * Time: 02:56 AM
 */
    class InscritNewsLettre extends Connection{
        private $idInscrit;
        private $emailInscrit;

        private $idInscritCol="id_inscrit";
        private $emailInscritCol="email_inscrit";

        private $table="inscrit_newslettre";

        public function __construct($email=NULL){
            $this->emailInscrit=$email;
        }

        #CREATE
        public function saveInscrit(){
            $sql="INSERT INTO {$this->table} VALUES('','{$this->emailInscrit}')";
            $query =$this->getPDO()->query($sql);
            return $query;
        }
        #READ
        public function getInscrit($id=NULL){
            if($id !=null){
                $sql="SELECT * FROM {$this->table} WHERE {$this->idInscritCol}=".$id;
            }else{
                $sql="SELECT * FROM {$this->table}";
            }
            $query=$this->getPDO()->query($sql);
            return $query;
        }
        #DELETE
        public function deleteInscrit($id){
            $sql="DELETE FROM {$this->table} WHERE {$this->idInscritCol}=".$id;
            $query=$this->getPDO()->query($sql);
            return $query;
        }
        #UPDATE
        public function updateIncrit($id,$email){
            $sql="UPDATE {$this->table} SET
                  {$this->emailInscritCol}='$email'
                  WHERE {$this->idInscritCol}=".$id;
            $query=$this->getPDO()->query($sql);
            return $query;

        }

    }
?>