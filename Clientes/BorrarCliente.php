<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo 1;
if(isset($_GET["id"])){
    echo 2;
    require_once("Cliente.php");
    $Cliente = New Cliente();
    $Cliente->ClienteId = $_GET["id"];
    $Cliente->delete();
echo "<script>
alert('Cliente Eliminado');
document.location='Clientes.php'</script>";

}
?>