<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo 1;
if(isset($_GET["id"])){
    echo 2;
    require_once("Empleado.php");
    $Empleado = New Empleado();
    $Empleado->EmpleadoId = $_GET["id"];
    $Empleado->delete();
echo "<script>
alert('Empleado Eliminada');
document.location='Empleados.php'</script>";

}
?>