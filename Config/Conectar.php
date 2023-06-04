<?php
require_once("Db.php");
class Conectar{
    protected $DbCnx;
    public function __construct(){
        $this->DbCnx= new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,
      [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]  
    );
    }
}
?>