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

    $sql = "INSERT INTO subasta (PRODUCTO_SUBASTA	, FECHA_INICIO_SUBASTA, FECHA_FIN_SUBASTA, PRECION_INICIO_SUBASTA) 
        VALUES ('$productoSubasta', '$fechaInicioSubasta', '$fechaFinSubasta', '$precioInicioSubasta')";


    if ($conexion->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Los datos se insertaron correctamente</div>';
    }else {
        echo '<div class="alert alert-danger">Error al insertar los datos</div>' . $conexion->error;
    }
    }
}

$conexion->close();
?>