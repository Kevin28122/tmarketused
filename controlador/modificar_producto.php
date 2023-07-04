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


        $sql = "UPDATE producto SET NOMBRE_PRODUCTO='$nombreProducto', DESCRIPCION_PRODUCTO='$descripcionProducto',
        CANTIDAD_PRODUCTO='$cantidadProducto', NOMBRE_COMPRADOR='$nombreComprador',TELEFONO_COMPRADOR='$telefonoComprador' WHERE ID_PRODUCTO=$id";

        if ($conexion->query($sql) === TRUE) {
            header("location:gestion_producto.php");
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}

$conexion->close();
?>