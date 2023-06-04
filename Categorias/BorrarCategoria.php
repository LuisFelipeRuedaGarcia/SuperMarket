<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo 1;
if(isset($_GET["id"])){
    echo 2;
    require_once("Categoria.php");
    $Categoria = New Categoria();
    $Categoria->CategoriaId = $_GET["id"];
    $Categoria->delete();
echo "<script>
alert('Categoria Eliminada');
document.location='Categorias.php'</script>";

}
?>