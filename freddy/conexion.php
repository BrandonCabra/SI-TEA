<?php
class Conexion1
{
    private static $host = "localhost";
    private static $dbname = "sitea";
    private static $username = "root"; // Cambia este valor si tu usuario es diferente
    private static $password = ""; // Cambia este valor si tienes una contraseña

    public static function conectar()
    {
        try {
            $conexion = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}

// Probar la conexión
try {
    $conexion = Conexion1::conectar();
    echo "¡Conexión exitosa!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>



