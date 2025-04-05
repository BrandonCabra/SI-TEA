<?php
require_once 'conexion.php';
require_once 'estudiante.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_CARACTERIZACION = $_POST['ID_CARACTERIZACION'] ?? null;
    $CODIGO_CARACTERIZACION = $_POST['CODIGO_CARACTERIZACION'] ?? null;
    $VALORACION_PEDAGOGICA = $_POST['VALORACION_PEDAGOGICA'] ?? null;
    $DIAGNOSTICO = $_POST['DIAGNOSTICO'] ?? null;
    $CORRESPONSABILIDAD = $_POST['CORRESPONSABILIDAD'] ?? null;
    $CONTEXTO_ACADEMICO = $_POST['CONTEXTO_ACADEMICO'] ?? null;
    $RECOMENDACIONES = $_POST['RECOMENDACIONES'] ?? null;
    $CONTEXTO_FAMILIAR = $_POST['CONTEXTO_FAMILIAR'] ?? null;
    $CONTEXTO_ESCOLAR = $_POST['CONTEXTO_ESCOLAR'] ?? null;
    $BARRA_DE_APRENDIZAJE = $_POST['BARRA_DE_APRENDIZAJE'] ?? null;

    
    // Validar que los campos no estén vacíos
    if (empty($tipo_documento) || empty($numero_documento) || empty($primer_nombre) || empty($primer_apellido) || empty($fecha_nacimiento) || empty($direccion) || empty($telefono) || empty($correo_institucional)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }
    // Crear una instancia de la clase Estudiante
    $estudiantes = new Estudiante($id_estudiante, $tipo_documento, $numero_documento, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $direccion, $telefono, $correo_institucional, $foto);
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
