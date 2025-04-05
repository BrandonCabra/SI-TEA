<?php
$host = "localhost";
$username = "root"; // Cambia este valor si tu usuario es diferente
$password = ""; // Cambia este valor si tienes una contraseña
$dbname = "si_tea";
//$port=3306;

if ($conexion = new mysqli($host, $username, $password, $dbname)) {
    echo "Conexión exitosa a la base de datos";
} else {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}
?>