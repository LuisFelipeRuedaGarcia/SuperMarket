<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

echo 1;
if(isset($_GET["id"])){
    echo 2;
    require_once("Config.php");
    $config = New Config();
    $config->CategoriaId = $_GET["id"];
    $config->delete();
echo "<script>
alert('Categoria Eliminada');
document.location='Categorias.php'</script>";

}
?>