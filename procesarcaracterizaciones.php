<?php
require_once 'conexion.php';
require_once 'caracterizacion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CODIGO_CARACTERIZACION = isset($_POST['CODIGO_CARACTERIZACION']) ? $_POST['CODIGO_CARACTERIZACION'] : null;
    $VALORACION_PEDAGOGICA = isset($_POST['VALORACION_PEDAGOGICA']) ? $_POST['VALORACION_PEDAGOGICA'] : null;
    $DIAGNOSTICO = isset($_POST['DIAGNOSTICO']) ? $_POST['DIAGNOSTICO'] : null;
    $CORRESPONSABILIDAD = isset($_POST['CORRESPONSABILIDAD']) ? $_POST['CORRESPONSABILIDAD'] : null;
    $CONTEXTO_ACADEMICO = isset($_POST['CONTEXTO_ACADEMICO']) ? $_POST['CONTEXTO_ACADEMICO'] : null;
    $RECOMENDACIONES = isset($_POST['RECOMENDACIONES']) ? $_POST['RECOMENDACIONES'] : null;
    $CONTEXTO_FAMILIAR = isset($_POST['CONTEXTO_FAMILIAR']) ? $_POST['CONTEXTO_FAMILIAR'] : null;
    $CONTEXTO_ESCOLAR = isset($_POST['CONTEXTO_ESCOLAR']) ? $_POST['CONTEXTO_ESCOLAR'] : null;
    $BARRA_DE_APRENDIZAJE = isset($_POST['BARRA_DE_APRENDIZAJE']) ? $_POST['BARRA_DE_APRENDIZAJE'] : null;

    // Validar que los campos no estén vacíos
    if (empty($CODIGO_CARACTERIZACION) || empty($VALORACION_PEDAGOGICA) || empty($DIAGNOSTICO) || empty($CORRESPONSABILIDAD) || empty($CONTEXTO_ACADEMICO) || empty($RECOMENDACIONES) || empty($CONTEXTO_FAMILIAR) || empty($CONTEXTO_ESCOLAR) || empty($BARRA_DE_APRENDIZAJE)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Crear una instancia de la clase Caracterizacion
    $caracterizacion = new Caracterizacion($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE);

    // Guardar la caracterización en la base de datos
    try {
        $conexion = Conexion1::conectar();
        $stmt = $conexion->prepare("INSERT INTO caracterizacion (CODIGO_CARACTERIZACION, VALORACION_PEDAGOGICA, DIAGNOSTICO, CORRESPONSABILIDAD, CONTEXTO_ACADEMICO, RECOMENDACIONES, CONTEXTO_FAMILIAR, CONTEXTO_ESCOLAR, BARRA_DE_APRENDIZAJE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$CODIGO_CARACTERIZACION, $VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE]);
        echo "¡Caracterización registrada exitosamente!";
    } catch (PDOException $e) {
        echo "Error en la conexión a la base de datos. Intente más tarde: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no permitido.";
}




?>