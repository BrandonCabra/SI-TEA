<?php
require_once 'conexion.php';
require_once 'estudiantes.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_estudiante = isset($_POST['id_estudiante']) ? $_POST['id_estudiante'] : null;
    $tipo_documento = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : null;
    $numero_documento = isset($_POST['numero_documento']) ? $_POST['numero_documento'] : null;
    $primer_nombre = isset($_POST['primer_nombre']) ? $_POST['primer_nombre'] : null;
    $segundo_nombre = isset($_POST['segundo_nombre']) ? $_POST['segundo_nombre'] : null;
    $primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : null;
    $segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : null;
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $correo_institucional = isset($_POST['correo_institucional']) ? $_POST['correo_institucional'] : null;
    $foto = isset($_POST['foto']) ? $_POST['foto'] : null;
    
    // Validar que los campos no estén vacíos
    if (empty($tipo_documento) || empty($numero_documento) || empty($primer_nombre) || empty($primer_apellido) || empty($fecha_nacimiento) || empty($direccion) || empty($telefono) || empty($correo_institucional)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }
    // Crear una instancia de la clase Estudiante
    $estudiantes = new Estudiantes($id_estudiante, $tipo_documento, $numero_documento, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $direccion, $telefono, $correo_institucional, $foto);
    // Guardar el estudiante en la base de datos
    try {
        $conexion = Conexion1::conectar();
        $stmt = $conexion->prepare("INSERT INTO estudiantes (id_estudiante, tipo_documento, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, direccion, telefono, correo_institucional, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$id_estudiante, $tipo_documento, $numero_documento, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $direccion, $telefono, $correo_institucional, $foto]);
        echo "¡Estudiante registrado exitosamente!";
    } catch (PDOException $e) {
        echo "Error en la conexión a la base de datos. Intente más tarde: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no permitido.";
}



?>
