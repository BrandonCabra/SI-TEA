<?php
require_once '../freddy/conexion.php'; // Clase para conectar a la base de datos
require_once "../modelos/usuario.php";   // Clases adicionales necesarias

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos enviados desde el formulario
    $PRIMER_NOMBRE = $_POST['PRIMER_NOMBRE'] ?? null;
    $PRIMER_APELLIDO = $_POST['PRIMER_APELLIDO'] ?? null;
    $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $_POST['TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO'] ?? null;
    $ROL_ID_ROL = $_POST['ROL_ID_ROL'] ?? null;
    $NUMERO_DOCUMENTO = $_POST['NUMERO_DOCUMENTO'] ?? null;
    $PASSWORD = $_POST['PASSWORD'] ?? null;

    // Verificar que los campos obligatorios están presentes
    if (!$PRIMER_NOMBRE || !$PRIMER_APELLIDO || !$TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO || !$ROL_ID_ROL || !$NUMERO_DOCUMENTO || !$PASSWORD) {
        echo "Error: Todos los campos obligatorios deben estar llenos.";
        exit();
    }

    try {
        // Conectarse a la base de datos
        $conexion = Conexion1::conectar();

        // Preparar consulta para insertar los datos en la tabla 'usuario'
        $stmt = $conexion->prepare("
            INSERT INTO usuarios 
            (PRIMER_NOMBRE, PRIMER_APELLIDO, TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, ROL_ID_ROL, NUMERO_DOCUMENTO, PASSWORD) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        // Ejecutar la consulta con los valores protegidos
        $stmt->execute([
            $PRIMER_NOMBRE,
            $PRIMER_APELLIDO,
            $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO,
            $ROL_ID_ROL,
            $NUMERO_DOCUMENTO,
            PASSWORD_hash($PASSWORD, PASSWORD_BCRYPT) // Encriptar la contraseña
        ]);

        // Mostrar el mensaje de éxito antes de la redirección
        echo "<h3>Usuario creado exitosamente</h3>";
        echo "<p>Serás redirigido a la página de inicio de sesión en breve...</p>";

        // Usar header para redirigir después de 3 segundos
        header("Refresh:3; url= ../vistas/iniciodesesion2.html");
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