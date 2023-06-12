<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo 1;
if(isset($_GET["id"])){
    echo 2;
    require_once("Producto.php");
    $Producto = New Producto();
    $Producto->ProductoId = $_GET["id"];
    $Producto->delete();
echo "<script>
alert('Producto Eliminada');
document.location='Productos.php'</script>";
}
?>