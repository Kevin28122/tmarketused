<?php
include "modelo/conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("select * from pedido  where ID_PEDIDO=$id");

?>

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
      <a href="Index.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">Modificar Pedidos</h1>
    </header>
    
    <br>
    <br>
    
    <div class="container-fluid row"> 
        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Modificar  Pedido</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"]?>">
            <?php
            include "controlador/modificar_pedido.php";
            while ($datos = $sql->fetch_object()){ ?>
            <div class="mb-3">
              <label for="nombreProducto" class="form-label">Nombre del Producto</label>
              <input type="text" class="form-control" name="nombreProducto" value="<?=$datos->NOMBRE_PRODUCTO?>">
            </div>
            <div class="mb-3">
                <label for="fechaLlegada" class="form-label">Fecha de Llegada del Pedido</label>
                <input type="date" class="form-control" name="fechaLlegada" value="<?=$datos->FECHA_LLEGADA_PEDIDO?>">
            </div>
            <div class="mb-3">
              <label for="precioTotal" class="form-label">Precio Total del Pedido</label>
              <input type="float" class="form-control" name="precioTotal" value="<?=$datos->PRECIO_TOTAL_PEDIDO?>">
            </div>
        <?php }
        ?>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarGestionCompra" value="ok">Modificar</button>
        </form>
    </body>
</html> 
