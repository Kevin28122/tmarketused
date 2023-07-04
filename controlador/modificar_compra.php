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

        $sql = "UPDATE compra SET NOMBRE_CLIENTE='$nombre', FECHA_COMPRA_PRODUCTO='$fecha_compra_producto',
        NOMBRE_PRODUCTO='$Nombre_Producto', TOTAL_COMPRA='$Total_compra' WHERE ID_COMPRA=$id";

        if ($conexion->query($sql) === TRUE) {
            header("location:gestion_compra.php");
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}

$conexion->close();
?>