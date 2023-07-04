<?php
include "modelo/conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("select * from venta  where ID_VENTA=$id");

?>

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
        <a href="Index.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
        <h1 class="header-title">modificar venta</h1>
    </header>

    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">modificar Venta</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">
        <?php
        include "controlador/modificar_venta.php";
        while ($datos = $sql->fetch_object()){?>
            <div class="mb-3">
            <label for="nombreClienteVenta" class="form-label">Nombre del Cliente de la Venta</label>
            <input type="text" class="form-control" name="nombreClienteVenta" value="<?=$datos->NOMBRE_CLIENTE_VENTA?>">
            </div>
            <div class="mb-3">
                <label for="fechaVenta" class="form-label">Fecha de la Venta</label>
                <input type="date" class="form-control" name="fechaVenta" value="<?=$datos->FECHA_VENTA?>">
            </div>
            <div class="mb-3">
                <label for="horaVenta" class="form-label">Hora de la Venta</label>
                <input type="time" class="form-control" name="horaVenta" value="<?=$datos->HORA_VENTA?>">
            </div>
            <div class="mb-3">
                <label for="totalVenta" class="form-label">Total de la Venta</label>
                <input type="text" class="form-control" name="totalVenta" value="<?=$datos->TOTAL_VENTA?>">
            </div>
        <?php }
        ?>
       
        <button type="submit" class="btn btn-primary" name="btnRegistrarGestionVentas" value="ok">modificar venta</button>
    </form>
</body>
</html>   