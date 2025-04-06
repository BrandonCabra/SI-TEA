<?php
require_once 'freddy/conexion.php';
require_once 'caracterizacion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_CARACTERIZACION = $_POST['ID_CARACTERIZACION'] ?? null;
    $CODIGO_CARACTERIZACION = $_POST['CODIGO_CARACTERIZACION'] ?? null;
    $ESTUDIANTE_ID_ESTUDIANTE = $_POST['ESTUDIANTE_ID_ESTUDIANTE'] ?? null;
    $VALORACION_PEDAGOGICA = $_POST['VALORACION_PEDAGOGICA'] ?? null;
    $DIAGNOSTICO = $_POST['DIAGNOSTICO'] ?? null;
    $CORRESPONSABILIDAD = $_POST['CORRESPONSABILIDAD'] ?? null;
    $CONTEXTO_ACADEMICO = $_POST['CONTEXTO_ACADEMICO'] ?? null;
    $RECOMENDACIONES = $_POST['RECOMENDACIONES'] ?? null;
    $CONTEXTO_FAMILIAR = $_POST['CONTEXTO_FAMILIAR'] ?? null;
    $CONTEXTO_ESCOLAR = $_POST['CONTEXTO_ESCOLAR'] ?? null;
    $BARRA_DE_APRENDIZAJE = $_POST['BARRA_DE_APRENDIZAJE'] ?? null;

    //consulta para obtener estudiantes sin carac

  
    // Guardar la caracterización en la base de datos
    try {
        $caracterizacion= crearCaracterizacion($ID_CARACTERIZACION, $CODIGO_CARACTERIZACION, $ESTUDIANTE_ID_ESTUDIANTE,$VALORACION_PEDAGOGICA, $DIAGNOSTICO, $CORRESPONSABILIDAD, $CONTEXTO_ACADEMICO, $RECOMENDACIONES, $CONTEXTO_FAMILIAR, $CONTEXTO_ESCOLAR, $BARRA_DE_APRENDIZAJE);
        $conexion = Conexion1::conectar();
        $caracterizacion->guardarCaracterizacion($conexion);


        // Aquí puedes agregar la lógica para redirigir a otra página o mostrar un mensaje de éxito

        echo "¡Caracterización registrada exitosamente!";
    } catch (PDOException $e) {
        echo "Error en la conexión a la base de datos. Intente más tarde: " . $e->getMessage();
    }
    } else {
    echo "Método de solicitud no permitido.";
}


?>