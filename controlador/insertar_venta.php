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

    $sql = "INSERT INTO venta (NOMBRE_CLIENTE_VENTA	, FECHA_VENTA, HORA_VENTA, TOTAL_VENTA) 
        VALUES ('$nombreClienteVenta', '$fechaVenta', '$horaVenta', '$totalVenta')";


    if ($conexion->query($sql) == TRUE) {
        echo '<div class="alert alert-success">Los datos se insertaron correctamente</div>';
    }else {
        echo '<div class="alert alert-danger">Error al insertar los datos</div>' . $conexion->error;
    }
    }
}

$conexion->close();
?>