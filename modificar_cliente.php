<?php
include "modelo/conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("select * from cliente  where ID_CLIENTE=$id");

?>

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
      <a href="Index.php"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">modificar Clientes</h1>
    </header>
    
    <br>
    <br>


        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">modificar Clientes</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"]?>">
            <?php
            include "controlador/modificar_cliente.php";
            while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
              <label for="nombreCliente" class="form-label">Nombre del Cliente</label>
              <input type="text" class="form-control" name="nombreCliente" value="<?=$datos->NOMBRE_CLIENTE?>">
            </div>
            <div class="mb-3">
              <label for="apellidoCliente" class="form-label">Apellido del Cliente</label>
              <input type="text" class="form-control" name="apellidoCliente" value="<?=$datos->APELLIDO?>">
            </div>
            <div class="mb-3">
              <label for="ciudadCliente" class="form-label">Ciudad</label>
              <input type="text" class="form-control" name="ciudadCliente" value="<?=$datos->CIUDAD?>">
            </div>
            <div class="mb-3">
              <label for="direccionCliente" class="form-label">Dirección del Cliente</label>
              <input type="text" class="form-control" name="direccionCliente" value="<?=$datos->DIRECCION?>">
            </div>
            <div class="mb-3">
              <label for="emailCliente" class="form-label">Email del Cliente</label>
              <input type="email" class="form-control" name="emailCliente" value="<?=$datos->EMAIL_CLIENTE?>">
            </div>
            <div class="mb-3">
              <label for="emailCliente" class="form-label">Fecha de nacimiento </label>
              <input type="date" class="form-control" name="fec_nac_cliente" value="<?=$datos->FECHA_NAC_CLIENTE?>">
            </div>
        <?php }
        ?>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarGestionClientes" value="ok">Registrar</button>
        </form>
</body>
</html>   