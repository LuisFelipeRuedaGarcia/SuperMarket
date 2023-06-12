<?php
require_once("Producto.php");
$Producto = new Producto();
$AllData = $Producto->GetAll();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="Css/Productos.css">

</head>

<body>
<?php
echo var_dump($AllData);

?>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camper Skills.</h3>
        <img src="images/Diseño sin título.png" alt="" class="PrecioUnitarioPerfil">
        <h3>Ludwing Felix</h3>
      </div>
      <div class="menus">
        <a href="/Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="Producto.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Categorías</h3>
        </a>
       


      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Producto</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#RegistrarProducto"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">CategoriaId</th>
              <th scope="col">PrecioUnitario</th>
              <th scope="col">Stock</th>
              <th scope="col">UnidadesPedidas</th>
              <th scope="col">ProveedorId</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descontinuado</th>  
              <th scope="col">EDITAR</th>
              <th scope="col">ELIMINAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <tr>


            <?php
              foreach($AllData as $key => $val){

                echo "<tr>
                <td>".
              $val["ProductoId"].
            "</td>
            <td>".$val["CategoriaId"].
            "</td>
            <td>" .$val["PrecioUnitario"].
            "</td>
            <td>" .$val["Stock"].
            "</td>
            <td>" .$val["UnidadesPedidas"].
            "</td>
            <td>" .$val["ProveedorId"].
            "</td>
            <td>".$val["Nombre"]."
            </td>
            <td>" .$val["Descontinuado"].
            "</td>
            <td>
            <a type='button' class='btn btn-warning'  name='Editar' href='EditarProducto.php?id=".
            $val["ProductoId"].
          "&req=edit'>Editar</a>
            </td>
            <td>
            <a type='button' class='btn btn-danger'  name='Eliminar' href='BorrarProducto.php?id=".
            $val["ProductoId"].
          "&req=delete'>Eliminar</a>
            </td>
            </tr>";
              }
            ?>

          </tbody>

        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Producto</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="RegistrarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="RegistrarProducto.php" method="post">

              <div class="mb-1 col-12">
                <label for="CategoriaId" class="form-label">CategoriaId</label>
                <input 
                  type="text"
                  id="CategoriaId"
                  name="CategoriaId"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="PrecioUnitario" class="form-label">PrecioUnitario</label>
                <input 
                  type="text"
                  id="PrecioUnitario"
                  name="PrecioUnitario"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Stock" class="form-label">Stock</label>
                <input 
                  type="text"
                  id="Stock"
                  name="Stock"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="UnidadesPedidas" class="form-label">UnidadesPedidas</label>
                <input 
                  type="text"
                  id="UnidadesPedidas"
                  name="UnidadesPedidas"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="ProveedorId" class="form-label">ProveedorId</label>
                <input 
                  type="text"
                  id="ProveedorId"
                  name="ProveedorId"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Nombre" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="Nombre"
                  name="Nombre"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Descontinuado" class="form-label">Descontinuado</label>
                <input 
                  type="text"
                  id="Descontinuado"
                  name="Descontinuado"
                  class="form-control"  
                />
              </div>


              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="Guardar" name="Guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>