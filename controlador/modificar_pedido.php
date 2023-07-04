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

        $sql = "UPDATE pedido SET NOMBRE_PRODUCTO='$nombreProducto', FECHA_LLEGADA_PEDIDO='$fechaLlegada',
        PRECIO_TOTAL_PEDIDO='$precioTotal' WHERE ID_PEDIDO=$id";

        if ($conexion->query($sql) === TRUE) {
            header("location:gestion_pedido.php");
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }
}

$conexion->close();
?>