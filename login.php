<?php
session_start();

// Verificar si se recibieron los datos del formulario de inicio de sesión
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conectar a la base de datos (reemplaza los valores con los de tu propia base de datos)
    $conexion = mysqli_connect('localhost', 'root', '', 'tmarketused');
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Verificar las credenciales del usuario en la base de datos
    $query = "SELECT * FROM USUARIO WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $rol = $row['rol'];

        // Almacenar el rol en la sesión
        $_SESSION['rol'] = $rol;

        // Redirigir según el rol del usuario
        if ($rol == 'admin') {
            header("Location: dashboard_admin.html");
            exit();
        }
        elseif ($rol == 'empleado') {
            header("Location: dashboard_empleado.html");
            exit(); 
        }
         else {
            echo "Rol no válido";
        }
    }   

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>