<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ventas</title>
    <link rel="stylesheet" href="Views/Css/gestiones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01df7d13f5.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <a href="dashboard_admin.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">Gestión de productos</h1>
    </header>
    
    <br>
    <br>

    <script>
        function eliminar(){
            var respuesta=confirm("estas seguro de eliminar este registro"); 
            return respuesta
        }
    </script>
     <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_producto.php";
    ?>
    <div class="container-fluid row"> 
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro Productos</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/insertar_producto.php";
            ?>
            <div class="mb-3">
              <label for="nombreProducto" class="form-label">Nombre del Producto</label>
              <input type="text" class="form-control" name="nombreProducto">
            </div>
            <div class="mb-3">
              <label for="descripcionProducto" class="form-label">Descripción del Producto</label>
              <input type="text" class="form-control" name="descripcionProducto">
            </div>
            <div class="mb-3">
              <label for="cantidadProducto" class="form-label">Cantidad del Producto</label>
              <input type="text" class="form-control" name="cantidadProducto">
            </div>
            <div class="mb-3">
              <label for="nombreComprador" class="form-label">Nombre del Comprador</label>
              <input type="text" class="form-control" name="nombreComprador">
            </div>
            <div class="mb-3">
              <label for="telefonoComprador" class="form-label">Teléfono del Comprador</label>
              <input type="int" class="form-control" name="telefonoComprador">
            </div>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarVenta" value="ok">Registrar</button>
            <a href="reporte_gestion_productos.php" target="_blank" class="btn btn-primary">Generar informe PDF</a>

        </form>

          
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nombre del Producto</th>
                      <th scope="col">Descripción del Producto</th>
                      <th scope="col">Cantidad del Producto</th>
                      <th scope="col">Nombre del Comprador</th>
                      <th scope="col">Teléfono del Comprador</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    include "modelo/conexion.php";
                    $sql=$conexion->query("select * from producto");
                    while($datos=$sql->fetch_object()){ ?>
                      <tr>
                        <td><?= $datos->ID_PRODUCTO ?></td>
                        <td><?= $datos->NOMBRE_PRODUCTO?></td>
                        <td><?= $datos->DESCRIPCION_PRODUCTO?></td>
                        <td><?= $datos->CANTIDAD_PRODUCTO?></td>
                        <td><?= $datos->NOMBRE_COMPRADOR?></td>
                        <td><?= $datos->TELEFONO_COMPRADOR?></td>
                        <td>
                        <a href="modificar_producto.php?id=<?= $datos->ID_PRODUCTO ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return eliminar()" href="gestion_producto.php?id=<?= $datos->ID_PRODUCTO?>" class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                        </td>
                      </tr>
                  <?php }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
