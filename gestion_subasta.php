<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Subastas</title>
    <link rel="stylesheet" href="Views/Css/gestiones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01df7d13f5.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="dashboard_empleado.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
        <h1 class="header-title">Gestión de Subastas</h1>
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
    include "controlador/eliminar_subasta.php";
    ?>
    <div class="container-fluid row"> 
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Subastas</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/insertar_subasta.php";
            ?>
            <div class="mb-3">
              <label for="productoSubasta" class="form-label">Producto de Subasta</label>
              <input type="text" class="form-control" name="productoSubasta">
            </div>
            <div class="mb-3">
                <label for="fechaInicioSubasta" class="form-label">Fecha de Inicio de la Subasta</label>
                <input type="date" class="form-control" name="fechaInicioSubasta">
            </div>
            <div class="mb-3">
                <label for="fechaFinSubasta" class="form-label">Fecha de Fin de la Subasta</label>
                <input type="date" class="form-control" name="fechaFinSubasta">
            </div>
            <div class="mb-3">
                <label for="precioInicioSubasta" class="form-label">Precio de Inicio de la Subasta</label>
                <input type="float" class="form-control" name="precioInicioSubasta">
            </div>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarGestionSubastas" value="ok">Registrar</button>
            <a href="reporte_gestion_subasta.php" target="_blank" class="btn btn-primary">Generar informe PDF</a>

        </form>

          
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                      <th scope="col">ID</th>  
                      <th scope="col">Producto de Subasta</th>
                      <th scope="col">Fecha de Inicio de la Subasta</th>
                      <th scope="col">Fecha de Fin de la Subasta</th>
                      <th scope="col">Precio de Inicio de la Subasta</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "modelo/conexion.php";
                    $sql=$conexion->query("select * from subasta");
                    while($datos=$sql->fetch_object()){?>
                        <tr>
                            <td><?= $datos->ID_SUBASTA ?></td>
                            <td><?= $datos->PRODUCTO_SUBASTA?></td>
                            <td><?= $datos->FECHA_INICIO_SUBASTA?></td>
                            <td><?= $datos->FECHA_FIN_SUBASTA?></td>
                            <td><?= $datos->PRECION_INICIO_SUBASTA?></td>
                            <td>
                        <a href="modificar_subasta.php?id=<?= $datos->ID_SUBASTA ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return eliminar()" href="gestion_subasta.php?id=<?= $datos->ID_SUBASTA ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
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
