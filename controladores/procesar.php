<?php
require_once 'conexion.php'; // Clase para conectar a la base de datos
require_once 'clases.php';   // Clases adicionales necesarias

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
        exit();
    }

    try {
        // Conectarse a la base de datos
        $conexion = Conexion1::conectar();

        // Preparar consulta para insertar los datos en la tabla 'usuario'
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

        // Mostrar el mensaje de éxito antes de la redirección
        echo "<h3>Usuario creado exitosamente</h3>";
        echo "<p>Serás redirigido a la página de inicio de sesión en breve...</p>";

        // Usar header para redirigir después de 3 segundos
        header("Refresh:3; url=Inicio_Sesion.html");
        exit();
    } catch (PDOException $e) {
        // Manejo de errores en la base de datos
        echo "<h3>Error en la base de datos:</h3>";
        echo "<p>" . $e->getMessage() . "</p>";
    } finally {
        // Cerrar la conexión a la base de datos
        $conexion = null;
    }
}
?>