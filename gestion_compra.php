<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Compra  </title>
    <link rel="stylesheet" href="Views/Css/gestiones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01df7d13f5.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <a href="dashboard_empleado.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">Gestion Compra</h1>
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
    include "controlador/eliminar_compra.php";
    ?>
    <div class="container-fluid row"> 
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro Compra</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/insertar_compra.php";
            ?>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre Cliente</label>
              <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Compra del Producto</label>
                <input type="date" class="form-control" name="fecha_compra_producto">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre Producto Comprado </label>
              <input type="text" class="form-control" name="Nombre_Producto" >
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Total Compra</label>
              <input type="text" class="form-control" name="Total_compra">
            </div>
           
            <button type="submit" class="btn btn-primary" name="btnregistrar_gestioncompra" value="ok">Registrar</button>
            <a href="reporte_gestion_compra.php" target="_blank" class="btn btn-primary">Generar informe PDF</a>

          </form>

          
          <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nombre cliente</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Producto Comprado</th>
                      <th scope="col">Total Compra</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                <tbody>
                <?php
                  include "modelo/conexion.php";
                  $sql=$conexion->query("select * from compra");
                  while($datos=$sql->fetch_object()){ ?>
                  <tr>
                    <td><?= $datos->ID_COMPRA?></td>
                    <td><?= $datos->NOMBRE_CLIENTE?></td>
                    <td><?= $datos->FECHA_COMPRA_PRODUCTO?></td>
                    <td><?= $datos->NOMBRE_PRODUCTO?></td>
                    <td><?= $datos->TOTAL_COMPRA?></td>
                    <td>
                        <a href="modificar_compra.php?id=<?= $datos->ID_COMPRA ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return eliminar()" href="gestion_compra.php?id=<?= $datos->ID_COMPRA?>" class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
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