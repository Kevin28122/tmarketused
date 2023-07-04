<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="Views/Css/gestiones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01df7d13f5.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <a href="dashboard_admin.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">Gestión de Clientes</h1>
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
    include "controlador/eliminar_cliente.php";
    ?>
    <div class="container-fluid row"> 
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Clientes</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/insertar_cliente.php";
            ?>
            <div class="mb-3">
              <label for="nombreCliente" class="form-label">Nombre del Cliente</label>
              <input type="text" class="form-control" name="nombreCliente">
            </div>
            <div class="mb-3">
              <label for="apellidoCliente" class="form-label">Apellido del Cliente</label>
              <input type="text" class="form-control" name="apellidoCliente">
            </div>
            <div class="mb-3">
              <label for="ciudadCliente" class="form-label">Ciudad</label>
              <input type="text" class="form-control" name="ciudadCliente">
            </div>
            <div class="mb-3">
              <label for="direccionCliente" class="form-label">Dirección del Cliente</label>
              <input type="text" class="form-control" name="direccionCliente">
            </div>
            <div class="mb-3">
              <label for="emailCliente" class="form-label">Email del Cliente</label>
              <input type="email" class="form-control" name="emailCliente">
            </div>
            <div class="mb-3">
              <label for="emailCliente" class="form-label">Fecha de nacimiento </label>
              <input type="date" class="form-control" name="fec_nac_cliente">
            </div>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarGestionClientes" value="ok">Registrar</button>
            <a href="reporte_gestion_cliente.php" target="_blank" class="btn btn-primary">Generar informe PDF</a>
        </form>

          
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nombre del Cliente</th>
                      <th scope="col">Apellido del Cliente</th>
                      <th scope="col">Ciudad</th>
                      <th scope="col">Dirección del Cliente</th>
                      <th scope="col">Email del Cliente</th>
                      <th scope="col">Fecha de nacimiento</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "modelo/conexion.php";
                    $sql=$conexion->query("select * from cliente");
                    while($datos=$sql->fetch_object()){?>
                        <tr>
                            <td><?= $datos->ID_CLIENTE ?></td>
                            <td><?= $datos->NOMBRE_CLIENTE?></td>
                            <td><?= $datos->APELLIDO?></td>
                            <td><?= $datos->CIUDAD?></td>
                            <td><?= $datos->DIRECCION?></td>
                            <td><?= $datos->EMAIL_CLIENTE?></td>
                            <td><?= $datos->FECHA_NAC_CLIENTE?></td>
                            <td>
                        <a href="modificar_cliente.php?id=<?= $datos->ID_CLIENTE ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return eliminar()" href="gestion_cliente.php?id=<?= $datos->ID_CLIENTE?>" class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
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
