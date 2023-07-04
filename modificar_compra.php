<?php
include "modelo/conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("select * from compra  where ID_COMPRA=$id");

?>

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
      <a href="Index.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
      <h1 class="header-title">modificar Compra</h1>
    </header>
    
      <br>
      <br>

    
    <div class="container-fluid row"> 
        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">modificar compra</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"]?>">
            <?php
            include "controlador/modificar_compra.php";
            while ($datos = $sql->fetch_object()){ ?>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre cliente</label>
              <input type="text" class="form-control" name="nombre" value="<?=$datos->NOMBRE_PRODUCTO?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Compra del Producto</label>
                <input type="date" class="form-control" name="fecha_compra_producto" value="<?=$datos->FECHA_COMPRA?>">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre Producto Comprado </label>
              <input type="text" class="form-control" name="Nombre_Producto" >
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Total Compra</label>
              <input type="text" class="form-control" name="Total_compra">
            </div>
        <?php }
        ?>
           
            <button type="submit" class="btn btn-primary" name="btnregistrar_gestioncompra" value="ok">Modificar</button>
        </form>
</body>
</html> 