<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 16/08/2015
 * Time: 12:44 AM
 */

class Utilisateur  extends Connection{
    private $idUser;
    private $emailUser;
    private $id_rang_user;
    private $mot_de_passeUser;
    private $date_inscUser;
    private $nomUser;
    private $prenomUser;
    private $newslettreUser;
    private $statutsocialUser;
    private $genreUser;


    private $idUserCol="id_user";
    private $emailUserCol="email_user";
    private $mot_de_passeUserCol="mot_de_passe_user";
    private $idRangUserCol="id_rang_user";
    private $date_inscUserCol="date_insc_user";
    private $nomUserCol="nom_user";
    private $prenomUserCol="prenom_user";
    private $newslettreUserCol="newslettre_user";
    private $statutsocialUserCol="statut_social_user";
    private $genreUserCol="genre_user";

    private $table="utilisateur";

    public function __construct($email=NULL,$mot_de_passe=NULL,$idrang=NULL,$date_insc=NULL,$nom=NULL,$prenom=NULL,$newslettre=NULL,$statut=NULL,$genre=NULL){
        $this->emailUser=$email;
        $this->mot_de_passeUser=$mot_de_passe;
        $this->id_rang_user=$idrang;
        $this->date_inscUser=$date_insc;
        $this->nomUser=$nom;
        $this->prenomUser=$prenom;
        $this->newslettreUser=$newslettre;
        $this->statutsocialUser=$statut;
        $this->genreUser=$genre;
    }

    #CREATE
    public function saveUser(){
        echo("<br/>".$this->mot_de_passeUser."<br/>");
        $sql="INSERT INTO {$this->table} VALUES('','{$this->emailUser}','{$this->id_rang_user}',PASSWORD('({$this->mot_de_passeUser}'),'{$this->date_inscUser}','{$this->nomUser}','{$this->prenomUser}','{$this->newslettreUser}','{$this->statutsocialUser}','{$this->genreUser}')";
        $query =$this->getPDO()->query($sql);
        return $query;
    }
    #READ
    public function getUser($id=NULL){
        if($id !=null){
            $sql="SELECT * FROM {$this->table} WHERE {$this->idUserCol}=".$id ;
        }else{
            $sql="SELECT * FROM {$this->table}";
        }
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #DELETE
    public function deleteUser($id){
        $sql="DELETE FROM {$this->table} WHERE {$this->idUserCol}=".$id;
        $query=$this->getPDO()->query($sql);
        return $query;
    }
    #UPDATE
    public function updateUser($id,$email,$mot_de_passe,$date_insc,$idrang,$nom,$prenom,$newslettre,$statut,$genre)
    {
        $sql = "UPDATE {$this->table} SET
                  {$this->emailUserCol}='$email'
                  ,{$this->idRangUserCol}='$idrang'
                  ,{$this->mot_de_passeUserCol}='$mot_de_passe'
                  ,{$this->date_inscUserCol}='$date_insc'
                  ,{$this->nomUserCol}='$nom'
                  ,{$this->prenomUserCol}='$prenom'
                  ,{$this->newslettreUserCol}='$newslettre'
                  ,{$this->statutsocialUserCol}='$statut'
                  ,{$this->genreUserCol}='$genre'
                  WHERE {$this->idUserCol}=".$id;
        $query = $this->getPDO()->query($sql);
        return $query;
    }
}?>