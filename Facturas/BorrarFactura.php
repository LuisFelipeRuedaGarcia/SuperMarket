<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo 1;
if(isset($_GET["id"])){
    echo 2;
    require_once("Factura.php");
    $Factura = New Factura();
    $Factura->FacturaId = $_GET["id"];
    $Factura->delete();
echo "<script>
alert('Factura Eliminada');
document.location='Facturas.php'</script>";

}
?>