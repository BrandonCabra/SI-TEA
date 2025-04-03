<?php
require_once 'conexion.php';
require_once 'caracterizacion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_caracterizacion = isset($_POST['codigo_caracterizacion']) ? $_POST['codigo_caracterizacion'] : null;
    $valoracion_pedagogica = isset($_POST['valoracion_pedagogica']) ? $_POST['valoracion_pedagogica'] : null;
    $diagnostico = isset($_POST['diagnostico']) ? $_POST['diagnostico'] : null;
    $corresponsabilidad = isset($_POST['corresponsabilidad']) ? $_POST['corresponsabilidad'] : null;
    $contexto_academico = isset($_POST['contexto_academico']) ? $_POST['contexto_academico'] : null;
    $recomendaciones = isset($_POST['recomendaciones']) ? $_POST['recomendaciones'] : null;
    $contexto_familiar = isset($_POST['contexto_familiar']) ? $_POST['contexto_familiar'] : null;
    $contexto_escolar = isset($_POST['contexto_escolar']) ? $_POST['contexto_escolar'] : null;
    $barreras_aprendizaje = isset($_POST['barreras_aprendizaje']) ? $_POST['barreras_aprendizaje'] : null;

    // Validar que los campos no estén vacíos
    if (empty($codigo_caracterizacion) || empty($valoracion_pedagogica) || empty($diagnostico) || empty($corresponsabilidad) || empty($contexto_academico) || empty($recomendaciones) || empty($contexto_familiar) || empty($contexto_escolar) || empty($barreras_aprendizaje)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Crear una instancia de la clase Caracterizacion
    $caracterizacion = new Caracterizacion($codigo_caracterizacion, $valoracion_pedagogica, $diagnostico, $corresponsabilidad, $contexto_academico, $recomendaciones, $contexto_familiar, $contexto_escolar, $barreras_aprendizaje);

    // Guardar la caracterización en la base de datos
    try {
        $conexion = Conexion1::conectar();
        $stmt = $conexion->prepare("INSERT INTO caracterizaciones (codigo_caracterizacion, valoracion_pedagogica, diagnostico, corresponsabilidad, contexto_academico, recomendaciones, contexto_familiar, contexto_escolar, barreras_aprendizaje) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$codigo_caracterizacion, $valoracion_pedagogica, $diagnostico, $corresponsabilidad, $contexto_academico, $recomendaciones, $contexto_familiar, $contexto_escolar, $barreras_aprendizaje]);
        echo "¡Caracterización registrada exitosamente!";
    } catch (PDOException $e) {
        echo "Error en la conexión a la base de datos. Intente más tarde: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no permitido.";
}




?>