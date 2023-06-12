<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
if (isset($_POST["Guardar"])){
    require_once("Producto.php");
    $Producto = new Producto();
    $Producto->CategoriaId=$_POST["CategoriaId"];
    $Producto->PrecioUnitario =$_POST["PrecioUnitario"];
    $Producto->Stock =$_POST["Stock"];
    $Producto->UnidadesPedidas =$_POST["UnidadesPedidas"];
    $Producto->ProveedorId =$_POST["ProveedorId"];
    $Producto->Nombre =$_POST["Nombre"];
    $Producto->Descontinuado =$_POST["Descontinuado"];
    $Producto->insertData();

    echo
    "<br>CategoriaId =".$Producto->CategoriaId.
    "<br>PrecioUnitario =".$Producto->PrecioUnitario.
    "<br>Stock =".$Producto->Stock.
    "<br>UnidadesPedidas =".$Producto->UnidadesPedidas.
    "<br>ProveedorId =".$Producto->ProveedorId.
    "<br>Nombre =".$Producto->Nombre.
    "<br>Descontinuado =".$Producto->Descontinuado
    ;
/*  echo "<script>
    alert('Producto registrado exitosamente' );
    document.location='Productos.php';
    </script>
    "; */
    
}
?>