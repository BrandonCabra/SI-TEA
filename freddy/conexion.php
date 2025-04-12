<?php
class Conexion1
{
    private static $host = "localhost";
    private static $dbname = "sitea4";
    private static $username = "root"; 
    private static $password = ""; 

    public static function conectar()
    {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=sitea4", "root", "");
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



