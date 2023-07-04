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

    if (empty($_POST["nombreClienteVenta"]) || empty($_POST["fechaVenta"]) || empty($_POST["horaVenta"]) 
    || empty($_POST["totalVenta"])) {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>'; 
    } else {

        $nombreClienteVenta = $conexion->real_escape_string($_POST["nombreClienteVenta"]);
        $fechaVenta = $conexion->real_escape_string($_POST["fechaVenta"]);
        $horaVenta = $conexion->real_escape_string($_POST["horaVenta"]);
        $totalVenta = $conexion->real_escape_string($_POST["totalVenta"]);



        $sql = "UPDATE venta SET NOMBRE_CLIENTE_VENTA='$nombreClienteVenta', FECHA_VENTA='$fechaVenta', HORA_VENTA='$horaVenta', TOTAL_VENTA='$totalVenta' WHERE ID_VENTA=$id";

        if ($conexion->query($sql) === TRUE) {
            header("location:gestion_venta.php");
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}

$conexion->close();
?>