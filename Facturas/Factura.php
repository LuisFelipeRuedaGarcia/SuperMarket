<?php
require_once("../Config/Conectar.php");
class Factura extends Conectar{
    private $FacturaId;
    private $EmpleadoId;
    private $ClienteId;
    private $Fecha;
/*     protected $DbCnx; */

    public function __construct($EmpleadoId=null, $ClienteId=null, $Fecha=null, $FacturaId=0, $DbCnx=""){
        $this->FacturaId=$FacturaId;
        $this->EmpleadoId=$EmpleadoId;
        $this->ClienteId=$ClienteId;
        $this->Fecha=$Fecha;
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
            $stm=$this->DbCnx->prepare("INSERT INTO Facturas(EmpleadoId, ClienteId, Fecha) VALUES (?,?,?)");
            $stm->execute([$this->EmpleadoId, $this->ClienteId, $this->Fecha]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function GetAll(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Facturas");
            $stm->execute(); 
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->DbCnx->prepare("DELETE  FROM Facturas WHERE FacturaId = ?");
            $stm->execute([$this->FacturaId]);
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOne(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Facturas WHERE FacturaId = ?");
            $stm->execute([$this->FacturaId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->DbCnx->prepare("UPDATE  Facturas SET EmpleadoId = ?, ClienteId = ?, Fecha = ? WHERE FacturaId = ?");
            $stm->execute([$this->EmpleadoId, $this->ClienteId, $this->Fecha,$this->FacturaId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>