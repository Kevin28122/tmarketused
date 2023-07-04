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

    if (empty($_POST["nombreProducto"]) || empty($_POST["descripcionProducto"]) || empty($_POST["cantidadProducto"]) 
    || empty($_POST["nombreComprador"]) || empty($_POST["telefonoComprador"])) {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>'; 
    } else {

        $nombreProducto = $conexion->real_escape_string($_POST["nombreProducto"]);
        $descripcionProducto = $conexion->real_escape_string($_POST["descripcionProducto"]);
        $cantidadProducto = $conexion->real_escape_string($_POST["cantidadProducto"]);
        $nombreComprador = $conexion->real_escape_string($_POST["nombreComprador"]);
        $telefonoComprador = $conexion->real_escape_string($_POST["telefonoComprador"]);

    $sql = "INSERT INTO producto (NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO, CANTIDAD_PRODUCTO, NOMBRE_COMPRADOR,TELEFONO_COMPRADOR) 
        VALUES ('$nombreProducto', '$descripcionProducto', '$cantidadProducto', '$nombreComprador','$telefonoComprador')";


    if ($conexion->query($sql) == TRUE) {
        echo '<div class="alert alert-success">Los datos se insertaron correctamente</div>';
    }else {
        echo '<div class="alert alert-danger">Error al insertar los datos</div>' . $conexion->error;
    }
    }
}

$conexion->close();
?>