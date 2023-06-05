<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["Guardar"])){
    require_once("Factura.php");

    $Factura = new Factura();
    
    $Factura->EmpleadoId = $_POST["EmpleadoId"];
    $Factura->ClienteId =$_POST["ClienteId"];
    $Factura->Fecha =$_POST["Fecha"];
    $Factura->insertData();
    echo "<script>
    alert('Factura registrada exitosamente' );
    document.location='Facturas.php';
    </script>
    ";
}
?>