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
        <h1 class="header-title">Gestión de venta</h1>
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
    include "controlador/eliminar_venta.php";
    ?>
    <div class="container-fluid row"> 
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Ventas</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/insertar_venta.php";
            ?>
            <div class="mb-3">
              <label for="nombreClienteVenta" class="form-label">Nombre del Cliente de la Venta</label>
              <input type="text" class="form-control" name="nombreClienteVenta">
            </div>
            <div class="mb-3">
                <label for="fechaVenta" class="form-label">Fecha de la Venta</label>
                <input type="date" class="form-control" name="fechaVenta">
            </div>
            <div class="mb-3">
                <label for="horaVenta" class="form-label">Hora de la Venta</label>
                <input type="time" class="form-control" name="horaVenta">
            </div>
            <div class="mb-3">
                <label for="totalVenta" class="form-label">Total de la Venta</label>
                <input type="float" class="form-control" name="totalVenta">
            </div>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarGestionVentas" value="ok">Registrar</button>
            <a href="reporte_gestion_venta.php" target="_blank" class="btn btn-primary">Generar informe PDF</a>

        </form>

          
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>    
                      <th scope="col">ID</th>  
                      <th scope="col">Nombre del Cliente de la Venta</th>
                      <th scope="col">Fecha de la Venta</th>
                      <th scope="col">Hora de la Venta</th>
                      <th scope="col">Total de la Venta</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "modelo/conexion.php";
                    $sql=$conexion->query("select * from venta");
                    while($datos=$sql->fetch_object()){?>
                        <tr>
                            <td><?= $datos->ID_VENTA?></td>
                            <td><?= $datos->NOMBRE_CLIENTE_VENTA?></td>
                            <td><?= $datos->FECHA_VENTA?></td>
                            <td><?= $datos->HORA_VENTA?></td>
                            <td><?= $datos->TOTAL_VENTA?></td>
                            <td>
                            <a href="modificar_venta.php?id=<?= $datos->ID_VENTA ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href="gestion_venta.php?id=<?= $datos->ID_VENTA?>" class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
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
