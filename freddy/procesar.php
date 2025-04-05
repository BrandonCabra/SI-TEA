<?php
require_once 'conexion.php'; // Asegúrate de que contiene la clase Conexion1
require_once 'clases.php';   // Asegúrate de que contiene las clases definidas

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos enviados desde el formulario
    $primer_nombre = $_POST['primer_nombre'] ?? null;
    $primer_apellido = $_POST['primer_apellido'] ?? null;
    $correo_institucional = $_POST['correo_institucional'] ?? null;
    $direccion_usuario = $_POST['direccion_usuario'] ?? null;
    $numero_documento = $_POST['numero_documento'] ?? null;
    $password = $_POST['password'] ?? null;

    // Verificar que los campos obligatorios están presentes
    if (!$primer_nombre || !$primer_apellido || !$correo_institucional || !$direccion_usuario || !$numero_documento || !$password) {
        echo "Error: Todos los campos obligatorios deben estar llenos.";
        exit;
    }

    try {
        // Conectarse a la base de datos
        $conexion = Conexion1::conectar();

        // Consulta preparada para insertar los datos en la tabla 'usuario'
        $stmt = $conexion->prepare("
            INSERT INTO usuario 
            (primer_nombre, primer_apellido, correo_institucional, direccion_usuario, numero_documento, password) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        // Ejecutar la consulta con los valores protegidos
        $stmt->execute([
            $primer_nombre,
            $primer_apellido,
            $correo_institucional,
            $direccion_usuario,
            $numero_documento,
            password_hash($password, PASSWORD_BCRYPT) // Encriptar la contraseña
        ]);

        // Redirigir a Inicio Sesion después de registrar al usuario
        header("Location: Inicio_Sesion.html");
        exit(); // Detener la ejecución del resto del script
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error en la base de datos: " . $e->getMessage();
    }
}
?>
