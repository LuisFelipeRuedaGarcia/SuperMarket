<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["Guardar"])){
    require_once("Config.php");

    $config = new Config(/* $_POST["Nombre"],$_POST["Descripcion"],$_POST["Imagen"] */);
/*     $config->setNombre($_POST["Nombre"]);
    $config->setDescripcion($_POST["Descripcion"]);
    $config->setImagen($_POST["Imagen"]); */
    
    $config->Nombre = $_POST["Nombre"];
    $config->Descripcion =$_POST["Descripcion"];
    $config->Imagen =$_POST["Imagen"];
    $config->insertData();
    echo "<script>
    alert('categoría registrada exitosamente' );
    document.location='Categorias.php';
    </script>
    ";
}
?>