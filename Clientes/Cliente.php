<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once("../Config/Conectar.php");
class Cliente extends Conectar{
    private $ClienteId;
    private $Celular;
    private $Company;
/*     protected $DbCnx; */

    public function __construct($Celular=null, $Company=null, $ClienteId=1, $DbCnx=""){
        $this->ClienteId=$ClienteId;
        $this->Celular=$Celular;
        $this->Company=$Company;
        parent::__construct($DbCnx);
    
    }
    public function  __get($property)
    {
        if(property_exists($this, $property)){
            return $this->$property;
        }
    }
    public function __set($property, $value){
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
    }

    public function insertData(){
        try {
            $stm=$this->DbCnx->prepare("INSERT INTO Clientes(Celular, Company) VALUES (?,?)");
            echo $this->Celular.$this->Company.$this->ClienteId;
            $stm->execute([$this->Celular, $this->Company]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
    }

    public function GetAll(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Clientes");
            $stm->execute(); 
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->DbCnx->prepare("DELETE  FROM Clientes WHERE ClienteId = ?");
            $stm->execute([$this->ClienteId]);
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOne(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Clientes WHERE ClienteId = ?");
            $stm->execute([$this->ClienteId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->DbCnx->prepare("UPDATE  Clientes SET Celular = ?, Company = ? WHERE ClienteId = ?");
            $stm->execute([$this->Celular, $this->Company, $this->ClienteId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>