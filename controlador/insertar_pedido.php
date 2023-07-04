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

    if (empty($_POST["nombreProducto"]) || empty($_POST["fechaLlegada"]) || empty($_POST["precioTotal"])) {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>'; 
    } else {

        $nombreProducto = $conexion->real_escape_string($_POST["nombreProducto"]);
        $fechaLlegada = $conexion->real_escape_string($_POST["fechaLlegada"]);
        $precioTotal = $conexion->real_escape_string($_POST["precioTotal"]);

    $sql = "INSERT INTO pedido (NOMBRE_PRODUCTO, FECHA_LLEGADA_PEDIDO, PRECIO_TOTAL_PEDIDO ) 
        VALUES ('$nombreProducto', '$fechaLlegada', '$precioTotal')";


    if ($conexion->query($sql) == TRUE) {
        echo '<div class="alert alert-success">Los datos se insertaron correctamente</div>';
    }else {
        echo '<div class="alert alert-danger">Error al insertar los datos</div>' . $conexion->error;
    }
    }
}

$conexion->close();
?>