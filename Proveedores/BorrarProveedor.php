<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo 1;
if(isset($_GET["id"])){
    echo 2;
    require_once("Proveedor.php");
    $Proveedor = New Proveedor();
    $Proveedor->ProveedorId = $_GET["id"];
    $Proveedor->delete();
echo "<script>
alert('Proveedor Eliminado');
document.location='Proveedores.php'</script>";

}
?>