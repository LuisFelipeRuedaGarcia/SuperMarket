<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["Guardar"])){
    require_once("Proveedor.php");

    $Proveedor = new Proveedor();
    
    $Proveedor->Nombre = $_POST["Nombre"];
    $Proveedor->Telefono =$_POST["Telefono"];
    $Proveedor->Ciudad =$_POST["Ciudad"];
    $Proveedor->insertData();
    echo "<script>
    alert('Proveedor registrada exitosamente' );
    document.location='Proveedores.php';
    </script>
    ";
}
?>