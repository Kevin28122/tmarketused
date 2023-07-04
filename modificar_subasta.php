<?php
include "modelo/conexion.php";
$id=$_GET["id"];

$sql=$conexion->query("select * from subasta  where ID_SUBASTA=$id");

?>

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
        <a href="Index.html"><img src="Views/Img/Logo_TMarketUsed.png" alt="Logo Izquierdo" class="logo-left"></a>
        <h1 class="header-title">Modificar Subastas</h1>
    </header>
    
    <br>
    <br>


    <div class="container-fluid row"> 
        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">modificar Subasta</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"]?>">
            <?php
            include "controlador/modificar_subasta.php";
            while ($datos = $sql->fetch_object()){ ?>
            <div class="mb-3">
              <label for="productoSubasta" class="form-label">Producto de Subasta</label>
              <input type="text" class="form-control" name="productoSubasta" value="<?=$datos->PRODUCTO_SUBASTA?>">
            </div>
            <div class="mb-3">
                <label for="fechaInicioSubasta" class="form-label">Fecha de Inicio de la Subasta</label>
                <input type="date" class="form-control" name="fechaInicioSubasta" value="<?=$datos->FECHA_INICIO_SUBASTA?>">
            </div>
            <div class="mb-3">
                <label for="fechaFinSubasta" class="form-label">Fecha de Fin de la Subasta</label>
                <input type="date" class="form-control" name="fechaFinSubasta" value="<?=$datos->FECHA_FIN_SUBASTA?>">
            </div>
            <div class="mb-3">
                <label for="precioInicioSubasta" class="form-label">Precio de Inicio de la Subasta</label>
                <input type="float" class="form-control" name="precioInicioSubasta" value="<?=$datos->PRECION_INICIO_SUBASTA?>">
            </div>
        <?php }
        ?>
           
            <button type="submit" class="btn btn-primary" name="btnRegistrarGestionSubastas" value="ok">Modificar</button>
        </form>
        </body>
</html> 