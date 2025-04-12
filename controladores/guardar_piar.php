<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$db = 'sitea'; // Nombre de tu base de datos
$user = 'root'; // Usuario de tu base de datos
$password = ''; // Contraseña de tu base de datos

$conn = new mysqli($host, $user, $password, $db);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos enviados desde el formulario
    $evaluacion = isset($_POST['EVALUACION']) ? $conn->real_escape_string($_POST['EVALUACION']) : '';
    $flexibilizacion = isset($_POST['FLEXIBILIZACION']) ? $conn->real_escape_string($_POST['FLEXIBILIZACION']) : '';
    $barra_aprendizaje = isset($_POST['BARRA_DE_APRENDIZAJE']) ? $conn->real_escape_string($_POST['BARRA_DE_APRENDIZAJE']) : '';
    $periodo = isset($_POST['PERIODO']) ? $conn->real_escape_string($_POST['PERIODO']) : '';
    $dba = isset($_POST['DBA']) ? $conn->real_escape_string($_POST['DBA']) : '';
    $estudiante_ID_ESTUDIANTE = isset($_POST['estudiante_ID_ESTUDIANTE']) ? $conn->real_escape_string($_POST['estudiante_ID_ESTUDIANTE']) : '';

    // Verificar que todos los campos estén completos
    if (!empty($evaluacion) && !empty($flexibilizacion) && !empty($barra_aprendizaje) && !empty($periodo) && !empty($dba) && !empty($estudiante_ID_ESTUDIANTE)) {
        // Insertar los datos en la tabla 'piar'
        $sql = "INSERT INTO piar (EVALUACION, FLEXIBILIZACION, BARRA_DE_APRENDIZAJE, PERIODO, DBA, estudiante_ID_ESTUDIANTE) 
                VALUES ('$evaluacion', '$flexibilizacion', '$barra_aprendizaje', '$periodo', '$dba', '$estudiante_ID_ESTUDIANTE')";

if ($conn->query($sql) === TRUE) {
    echo "Datos del PIAR guardados exitosamente, estudiante con Documento Número: $estudiante_ID_ESTUDIANTE</p>";
    header("Refresh:3; url=PIAR.HTML"); // Redirige a "tu_pagina_destino.php" después de 3 segundos
    exit;
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

    }
}

// Cerrar la conexión
$conn->close();
?>