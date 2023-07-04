<?php
$conexion=new mysqli("127.0.0.1","root","","tmarketused","3306");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
    echo "error en al conexion";
}