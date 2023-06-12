<?php
require_once("../Config/Conectar.php");
class Producto extends Conectar{
    private $ProductoId;
    private $CategoriaId;
    private $PrecioUnitario;
    private $Stock;
    private $UnidadesPedidas;
    private $ProveedorId;
    private $Nombre;
    private $Descontinuado;

/*     protected $DbCnx; */

    public function __construct($ProductoId=null, $CategoriaId=null, $PrecioUnitario=null, $Stock=null, $UnidadesPedidas=null, $ProveedorId=null, $Nombre=null, $Descontinuado=0, $DbCnx=""){
        $this->ProductoId=$ProductoId;
        $this->CategoriaId=$CategoriaId;
        $this->PrecioUnitario=$PrecioUnitario;
        $this->Stock=$Stock;
        $this->UnidadesPedidas=$UnidadesPedidas;
        $this->ProveedorId=$ProveedorId;
        $this->Nombre=$Nombre;
        $this->Descontinuado=$Descontinuado;
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
            $stm=$this->DbCnx->prepare("INSERT INTO Productos( CategoriaId, PrecioUnitario, Stock, UnidadesPedidas, ProveedorId, Nombre, Descontinuado) VALUES (?,?,?,?,?,?,?)");
            $stm->execute([$this->CategoriaId, $this->PrecioUnitario, $this->Stock, $this->UnidadesPedidas, $this->ProveedorId, $this->Nombre, $this->Descontinuado]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
    }

    public function GetAll(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Productos");
            $stm->execute(); 
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->DbCnx->prepare("DELETE  FROM Productos WHERE ProductoId = ?");
            $stm->execute([$this->ProductoId]);
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOne(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Productos WHERE ProductoId = ?");
            $stm->execute([$this->ProductoId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->DbCnx->prepare("UPDATE  Productos SET CategoriaId = ?, PrecioUnitario = ?, Stock = ?, UnidadesPedidas = ?, ProveedorId = ?, Nombre = ?, Descontinuado = ? WHERE ProductoId = ?");
            $stm->execute([$this->CategoriaId, $this->PrecioUnitario, $this->Stock, $this->UnidadesPedidas, $this->ProveedorId, $this->Nombre, $this->Descontinuado, $this->ProductoId] );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>