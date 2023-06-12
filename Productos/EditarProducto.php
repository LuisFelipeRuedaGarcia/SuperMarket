<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
require_once("Producto.php");
$Producto = new Producto();
$Producto->ProductoId = $_GET['id'];

$FetchAll = $Producto -> getOne();
$Ctgr= $FetchAll[0];
echo var_dump($Ctgr);
if (isset($_POST["Editar"])){
$Producto->CategoriaId = $_POST["CategoriaId"];
$Producto->PrecioUnitario = $_POST["PrecioUnitario"];
$Producto->Stock= $_POST["Stock"];
$Producto->UnidadesPedidas= $_POST["UnidadesPedidas"];
$Producto->ProveedorId= $_POST["ProveedorId"];
$Producto->Nombre= $_POST["Nombre"];
$Producto->Descontinuado= $_POST["Descontinuado"];

echo "CategoriaId =". $Producto->CategoriaId;
echo "PrecioUnitario =". $Producto->PrecioUnitario;
echo "Stock =". $Producto->Stock;
echo "UnidadesPedidas =". $Producto->UnidadesPedidas;
echo "ProveedorId =". $Producto->ProveedorId;
echo "Nombre =". $Producto->Nombre;
echo "Descontinuado =". $Producto->Descontinuado;
$Producto->update();
/* echo "<script>alert('Actualización exitosa');
document.location='Productos.php';
</script>"; */
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Producto</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="Css/Productos.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camp Skiler.</h3>
        <img src="images/Diseño sin título.png" alt="" class="imagenPerfil">
        <h3 >Ludwing Felix</h3>
      </div>
      <div class="menus">
        <a href="home.html" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Home</h3>
        </a>
        <a href="/Productos/Productos.html" style="display: flex;gap:2px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;">Productos</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Producto a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
        <?php

        ?>
              <div class="mb-1 col-12">
                <label for="CategoriaId" class="form-label">CategoriaId</label>
                <input 
                  type="text"
                  id="CategoriaId"
                  name="CategoriaId"
                  class="form-control"  
                 value='<?=$Ctgr["CategoriaId"] ?>'
                />
              </div>


              <div class="mb-1 col-12">
                <label for="PrecioUnitario" class="form-label">PrecioUnitario</label>
                <input 
                  type="text"
                  id="PrecioUnitario"
                  name="PrecioUnitario"
                  class="form-control"  
                 value='<?=$Ctgr["PrecioUnitario"] ?>'
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Stock" class="form-label">Stock</label>
                <input 
                  type="text"
                  id="Stock"
                  name="Stock"
                  class="form-control"  
                 value='<?=$Ctgr["Stock"] ?>'
                />
              </div>

              <div class="mb-1 col-12">
                <label for="UnidadesPedidas" class="form-label">UnidadesPedidas</label>
                <input 
                  type="text"
                  id="UnidadesPedidas"
                  name="UnidadesPedidas"
                  class="form-control"  
                 value='<?=$Ctgr["UnidadesPedidas"] ?>'
                />
              </div>

              <div class="mb-1 col-12">
                <label for="ProveedorId" class="form-label">ProveedorId</label>
                <input 
                  type="text"
                  id="ProveedorId"
                  name="ProveedorId"
                  class="form-control"  
                 value='<?=$Ctgr["ProveedorId"] ?>'
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Nombre" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="Nombre"
                  name="Nombre"
                  class="form-control"  
                  value='<?=$Ctgr["Nombre"] ?>'
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Descontinuado" class="form-label">Descontinuado</label>
                <input 
                  type="text"
                  id="Descontinuado"
                  name="Descontinuado"
                  class="form-control"  
                  value='<?=$Ctgr["Descontinuado"] ?>'
                  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="Editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Productos</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>
