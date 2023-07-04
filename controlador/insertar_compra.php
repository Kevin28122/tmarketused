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

    if (empty($_POST["nombre"]) || empty($_POST["fecha_compra_producto"]) || empty($_POST["Nombre_Producto"]) || empty($_POST["Total_compra"])) {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>'; 
    } else {

        $nombre = $conexion->real_escape_string($_POST["nombre"]);
        $fecha_compra_producto = $conexion->real_escape_string($_POST["fecha_compra_producto"]);
        $Nombre_Producto = $conexion->real_escape_string($_POST["Nombre_Producto"]);
        $Total_compra = $conexion->real_escape_string($_POST["Total_compra"]);

    $sql = "INSERT INTO compra (NOMBRE_CLIENTE, FECHA_COMPRA_PRODUCTO,NOMBRE_PRODUCTO, TOTAL_COMPRA ) 
        VALUES ('$nombre', '$fecha_compra_producto', '$Nombre_Producto','$Total_compra')";


    if ($conexion->query($sql) == TRUE) {
        echo '<div class="alert alert-success">Los datos se insertaron correctamente</div>';
    }else {
        echo '<div class="alert alert-danger">Error al insertar los datos</div>' . $conexion->error;
    }
    }
}

$conexion->close();
?>