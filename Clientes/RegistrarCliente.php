<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["Guardar"])){
    require_once("Cliente.php");

    $Cliente = new Cliente();    
    $Cliente->Celular = $_POST["Celular"];
    $Cliente->Company =$_POST["Company"];

    $Cliente->insertData();
    echo "<script>
    alert('categoría registrada exitosamente' );
    document.location='Clientes.php';
    </script>
    ";
}
?>