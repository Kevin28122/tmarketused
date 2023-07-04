<?php
include "modelo/conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("select * from producto  where ID_PRODUCTO=$id");

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
      <h1 class="header-title">Modificar productos</h1>
    </header>
    
    <br>
    <br>


    <div class="container-fluid row"> 
        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Modificar Productos</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"]?>">
            <?php
            include "controlador/modificar_producto.php";
            while ($datos = $sql->fetch_object()){ ?>
            <div class="mb-3">
              <label for="nombreProducto" class="form-label">Nombre del Producto</label>
              <input type="text" class="form-control" name="nombreProducto" value="<?=$datos->NOMBRE_PRODUCTO?>">
            </div>
            <div class="mb-3">
              <label for="descripcionProducto" class="form-label">Descripción del Producto</label>
              <input type="text" class="form-control" name="descripcionProducto"value="<?=$datos->DESCRIPCION_PRODUCTO?>">
            </div>
            <div class="mb-3">
              <label for="cantidadProducto" class="form-label">Cantidad del Producto</label>
              <input type="text" class="form-control" name="cantidadProducto"value="<?=$datos->CANTIDAD_PRODUCTO?>">
            </div>
            <div class="mb-3">
              <label for="nombreComprador" class="form-label">Nombre del Comprador</label>
              <input type="text" class="form-control" name="nombreComprador"value="<?=$datos->NOMBRE_COMPRADOR?>">
            </div>
            <div class="mb-3">
              <label for="telefonoComprador" class="form-label">Teléfono del Comprador</label>
              <input type="text" class="form-control" name="telefonoComprador"value="<?=$datos->TELEFONO_COMPRADOR?>">
            </div>
        <?php }
        ?>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarVenta" value="ok">Modificar</button>
        </form>
    </body>
</html>   