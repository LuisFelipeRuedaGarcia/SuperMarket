<?php
require_once("../Config/Conectar.php");
class Empleado extends Conectar{
    private $EmpleadoId;
    private $Nombre;
    private $Celular;
    private $Direccion;
    private $Imagen;
/*     protected $DbCnx; */

    
    public function __construct($Nombre=null, $Celular=0,$Direccion=null, $Imagen=null, $EmpleadoId=0, $DbCnx=""){
        $this->EmpleadoId=$EmpleadoId;
        $this->Nombre=$Nombre;
        $this->Celular=$Celular;
        $this->Direccion=$Direccion;
        $this->Imagen=$Imagen;
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
            $stm=$this->DbCnx->prepare("INSERT INTO Empleados(Nombre, Celular, Direccion, Imagen) VALUES (?,?,?,?)");
            $stm->execute([$this->Nombre,$this->Celular, $this->Direccion, $this->Imagen]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
    }

    public function GetAll(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Empleados");
            $stm->execute(); 
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->DbCnx->prepare("DELETE  FROM Empleados WHERE EmpleadoId = ?");
            $stm->execute([$this->EmpleadoId]);
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOne(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Empleados WHERE EmpleadoId = ?");
            $stm->execute([$this->EmpleadoId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->DbCnx->prepare("UPDATE  Empleados SET Nombre = ?, Celular= ?, Direccion = ?, Imagen = ? WHERE EmpleadoId = ?");
            $stm->execute([$this->Nombre, $this->Celular, $this->Direccion, $this->Imagen,$this->EmpleadoId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>