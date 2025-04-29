<?php
// Configuración de la conexión a la base de datos
require_once '../freddy/conexion.php';
require_once '../modelos/piar.php';

// Procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos enviados desde el formulario
    $CODIGO_PIAR = $_POST['CODIGO_PIAR'] ?? null;
    $PERIODO = $_POST['PERIODO'] ?? null;
    $EVALUACION = $_POST['EVALUACION'] ?? null;
    $DBA = $_POST['DBA'] ?? null;
    $BARRA_DE_APRENDIZAJE = $_POST['BARRA_DE_APRENDIZAJE'] ?? null;
    $FLEXIBILIZACION = $_POST['FLEXIBILIZACION'] ?? null;
    $ESTUDIANTE_ID_ESTUDIANTE = $_POST['ESTUDIANTE_ID_ESTUDIANTE'] ?? null;
    $SEGUIMIENTO_EVALUATIVO = $_POST['SEGUIMIENTO_EVALUATIVO'] ?? null;

    try {

        $piar = crearPiar($CODIGO_PIAR, $PERIODO, $EVALUACION, $DBA, $BARRA_DE_APRENDIZAJE, $FLEXIBILIZACION, $ESTUDIANTE_ID_ESTUDIANTE, $SEGUIMIENTO_EVALUATIVO);
        $conexion = Conexion1::conectar();

        $conexion->guardarPiar($piar);
        // Aquí puedes agregar la lógica para redirigir a otra página o mostrar un mensaje de éxito

        echo "¡PIAR registrado exitosamente!";
    } catch (PDOException $e) {
        echo "Error en la conexión a la base de datos. Intente más tarde: " . $e->getMessage(); 
           
    }
} else {
    echo "Método de solicitud no permitido.";
}
// Redirigir a la página de inicio o mostrar un mensaje de error
?>