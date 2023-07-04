<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Compras</title>
    <link rel="stylesheet" href="Views/Css/gestiones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01df7d13f5.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <a href="dashboard_empleado.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">Gestión de Pedidos</h1>
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
    include "controlador/eliminar_pedido.php";
    ?>
    <div class="container-fluid row"> 
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Pedidos</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/insertar_pedido.php";
            ?>
            <div class="mb-3">
              <label for="nombreProducto" class="form-label">Nombre del Producto</label>
              <input type="text" class="form-control" name="nombreProducto">
            </div>
            <div class="mb-3">
                <label for="fechaLlegada" class="form-label">Fecha de Llegada del Pedido</label>
                <input type="date" class="form-control" name="fechaLlegada">
            </div>
            <div class="mb-3">
              <label for="precioTotal" class="form-label">Precio Total del Pedido</label>
              <input type="float" class="form-control" name="precioTotal">
            </div>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarGestionCompra" value="ok">Registrar</button>
            <a href="reporte_gestion_pedido.php" target="_blank" class="btn btn-primary">Generar informe PDF</a>

        </form>

          
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                      <th scope="col">ID</th>  
                      <th scope="col">Nombre Producto</th>
                      <th scope="col">Fecha de Llegada del Pedido</th>
                      <th scope="col">Precio Total del Pedido</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "modelo/conexion.php";
                    $sql=$conexion->query("select * from pedido");
                    while($datos=$sql->fetch_object()){ ?>
                    <tr>
                        <td><?= $datos->ID_PEDIDO ?></td>
                        <td><?= $datos->NOMBRE_PRODUCTO?></td>
                        <td><?= $datos->FECHA_LLEGADA_PEDIDO?></td>
                        <td><?= $datos->PRECIO_TOTAL_PEDIDO?></td>
                    <td>
                        <a href="modificar_pedido.php?id=<?= $datos->ID_PEDIDO ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return eliminar()" href="gestion_pedido.php?id=<?= $datos->ID_PEDIDO?>" class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
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
