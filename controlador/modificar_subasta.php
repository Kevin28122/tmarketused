<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tmarketused";

$conexion=new mysqli("localhost","root","","tmarketused");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["productoSubasta"]) || empty($_POST["fechaInicioSubasta"]) || empty($_POST["fechaFinSubasta"]) 
    || empty($_POST["precioInicioSubasta"])) {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>'; 
    } else {

        $productoSubasta = $conexion->real_escape_string($_POST["productoSubasta"]);
        $fechaInicioSubasta = $conexion->real_escape_string($_POST["fechaInicioSubasta"]);
        $fechaFinSubasta = $conexion->real_escape_string($_POST["fechaFinSubasta"]);
        $precioInicioSubasta = $conexion->real_escape_string($_POST["precioInicioSubasta"]);



        $sql = "UPDATE subasta SET PRODUCTO_SUBASTA='$productoSubasta', FECHA_INICIO_SUBASTA='$fechaInicioSubasta',
         FECHA_FIN_SUBASTA='$fechaFinSubasta', PRECION_INICIO_SUBASTA='$precioInicioSubasta' WHERE ID_SUBASTA=$id";

        if ($conexion->query($sql) === TRUE) {
            header("location:gestion_subasta.php");
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}

$conexion->close();
?>
