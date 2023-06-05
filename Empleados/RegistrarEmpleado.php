<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["Guardar"])){
    require_once("Empleado.php");
/*     echo $_POST["Nombre"].$_POST["Celular"].$_POST["Direccion"].$_POST["Imagen"]; */
    $Empleado = new Empleado(/* $_POST["Nombre"],$_POST["Celular"],$_POST["Direccion"],$_POST["Imagen"] */);
    
    $Empleado->Nombre = $_POST["Nombre"];
    $Empleado->Celular = $_POST["Celular"];
    $Empleado->Direccion =$_POST["Direccion"];
    $Empleado->Imagen =$_POST["Imagen"];
    $Empleado->insertData();
    echo "<script>
    alert('Empleado registrado exitosamente' );
    document.location='Empleados.php';
    </script>
    ";
}
?>