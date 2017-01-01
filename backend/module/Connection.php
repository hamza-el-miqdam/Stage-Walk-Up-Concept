<?php
/**
 * Created by PhpStorm.
 * User: Mike Down
 * Date: 15/08/2015
 * Time: 02:37 AM
 */

class Connection{

    private $host = "localhost";
    private $pwd = "";
    private $user = "root";
    private $dbname = "lmpe_marrakech";
    private $connection;

    public function __construct(){
    }
        public function getPDO()
        {
            try {
                $this->connection = new PDO("mysql:host={$this->host};dbname=".$this->dbname,$this->user,$this->pwd);
                return $this->connection;
            } catch (Exception $e) {
                echo("Exception ".$e->getMessage());
            }
        }
}?>