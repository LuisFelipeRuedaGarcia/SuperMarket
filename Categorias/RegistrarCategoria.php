<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["Guardar"])){
    require_once("Categoria.php");

    $Categoria = new Categoria(/* $_POST["Nombre"],$_POST["Descripcion"],$_POST["Imagen"] */);
/*     $Categoria->setNombre($_POST["Nombre"]);
    $Categoria->setDescripcion($_POST["Descripcion"]);
    $Categoria->setImagen($_POST["Imagen"]); */
    
    $Categoria->Nombre = $_POST["Nombre"];
    $Categoria->Descripcion =$_POST["Descripcion"];
    $Categoria->Imagen =$_POST["Imagen"];
    $Categoria->insertData();
    echo "<script>
    alert('categoría registrada exitosamente' );
    document.location='Categorias.php';
    </script>
    ";
}
?>