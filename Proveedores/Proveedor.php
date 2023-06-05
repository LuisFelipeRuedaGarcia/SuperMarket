<?php
require_once("../Config/Conectar.php");
class Proveedor extends Conectar{
    private $ProveedorId;
    private $Nombre;
    private $Telefono;
    private $Ciudad;
/*     protected $DbCnx; */

    
    public function __construct($Nombre=null, $Telefono=null, $Ciudad=null, $ProveedorId=0, $DbCnx=""){
        $this->ProveedorId=$ProveedorId;
        $this->Nombre=$Nombre;
        $this->Telefono=$Telefono;
        $this->Ciudad=$Ciudad;
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
            $stm=$this->DbCnx->prepare("INSERT INTO Proveedores(Nombre, Telefono, Ciudad) VALUES (?,?,?)");
            $stm->execute([$this->Nombre, $this->Telefono, $this->Ciudad]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
    }

    public function GetAll(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Proveedores");
            $stm->execute(); 
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->DbCnx->prepare("DELETE  FROM Proveedores WHERE ProveedorId = ?");
            $stm->execute([$this->ProveedorId]);
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOne(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Proveedores WHERE ProveedorId = ?");
            $stm->execute([$this->ProveedorId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->DbCnx->prepare("UPDATE  Proveedores SET Nombre = ?, Telefono = ?, Ciudad = ? WHERE ProveedorId = ?");
            $stm->execute([$this->Nombre, $this->Telefono, $this->Ciudad,$this->ProveedorId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>