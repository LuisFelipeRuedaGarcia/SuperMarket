<?php
require_once("Db.php");
class Config{
    private $CategoriaId;
    private $Nombre;
    private $Descripcion;
    private $Imagen;
    protected $DbCnx;

    
    public function __construct($Nombre=null, $Descripcion=null, $Imagen=null, $CategoriaId=0){
        $this->CategoriaId=$CategoriaId;
        $this->Nombre=$Nombre;
        $this->Descripcion=$Descripcion;
        $this->Imagen=$Imagen;
        $this->DbCnx= new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,
      [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]  
    );
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
/*     public function setCategoriaId($CategoriaId){
        $this->CategoriaId = $CategoriaId;
    }
    public function getCategoriaId(){
        return $this->CategoriaId;
    } */

    /* public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }
    public function getNombre(){
        return $this->Nombre;
    }
    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }
    public function setImagen($Imagen){
        $this->Imagen = $Imagen;
    }
    public function getImagen(){
        return $this->Imagen;
    } */
    public function insertData(){
        try {
            $stm=$this->DbCnx->prepare("INSERT INTO Categorias(Nombre, Descripcion, Imagen) VALUES (?,?,?)");
            $stm->execute([$this->Nombre, $this->Descripcion, $this->Imagen]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
    }

    public function GetAll(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Categorias");
            $stm->execute(); 
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

public function delete(){
    try {
        $stm = $this->DbCnx->prepare("DELETE  FROM Categorias WHERE CategoriaId = ?");
        $stm->execute([$this->CategoriaId]);
        
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

}

/* $config = new Config(1,2,3,4,5);
 echo $config->Nombre;
 $config->Nombre = 0;
 echo $config->Nombre;

 echo $config->CategoriaId;
 $config->CategoriaId = 0;
 echo $config->CategoriaId;
 */
?>