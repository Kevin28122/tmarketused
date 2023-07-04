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

    if (empty($_POST["nombreCliente"]) || empty($_POST["apellidoCliente"]) || empty($_POST["ciudadCliente"]) || empty($_POST["direccionCliente"])
     || empty($_POST["emailCliente"]) || empty($_POST["fec_nac_cliente"])  ) {
        echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>'; 
    } else {

        $nombreCliente = $conexion->real_escape_string($_POST["nombreCliente"]);
        $apellidoCliente = $conexion->real_escape_string($_POST["apellidoCliente"]);
        $ciudadCliente = $conexion->real_escape_string($_POST["ciudadCliente"]);
        $direccionCliente = $conexion->real_escape_string($_POST["direccionCliente"]);
        $emailCliente = $conexion->real_escape_string($_POST["emailCliente"]);
        $fec_nac_cliente = $conexion->real_escape_string($_POST["fec_nac_cliente"]);

    $sql = "INSERT INTO cliente (NOMBRE_CLIENTE, APELLIDO, CIUDAD, DIRECCION, EMAIL_CLIENTE, FECHA_NAC_CLIENTE) 
        VALUES ('$nombreCliente', '$apellidoCliente', '$ciudadCliente', '$direccionCliente',
        '$emailCliente', '$fec_nac_cliente')";


    if ($conexion->query($sql) == TRUE) {
        echo '<div class="alert alert-success">Los datos se insertaron correctamente</div>';
    }else {
        echo '<div class="alert alert-danger">Error al insertar los datos</div>' . $conexion->error;
    }
    }
}

$conexion->close();
?>