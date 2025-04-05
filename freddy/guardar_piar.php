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
    $estudiante_ID_ESTUDIANTE = isset($_POST['CODIGO_PIAR']) ? $conn->real_escape_string($_POST['CODIGO_PIAR']) : '';
    $evaluacion = isset($_POST['EVALUACION']) ? $conn->real_escape_string($_POST['EVALUACION']) : '';
    $flexibilizacion = isset($_POST['FLEXIBILIZACION']) ? $conn->real_escape_string($_POST['FLEXIBILIZACION']) : '';
    $barra_aprendizaje = isset($_POST['BARRA_DE_APRENDIZAJE']) ? $conn->real_escape_string($_POST['BARRA_DE_APRENDIZAJE']) : '';
    $periodo = isset($_POST['PERIODO']) ? $conn->real_escape_string($_POST['PERIODO']) : '';
    $dba = isset($_POST['DBA']) ? $conn->real_escape_string($_POST['DBA']) : '';

    // Verificar que todos los campos estén completos
    if (!empty($estudiante_ID_ESTUDIANTE) && !empty($evaluacion) && !empty($flexibilizacion) && !empty($barra_aprendizaje) && !empty($periodo) && !empty($dba)) {
        // Insertar los datos en la tabla 'piar'
        $sql = "INSERT INTO piar (CODIGO_PIAR, EVALUACION, FLEXIBILIZACION, BARRA_DE_APRENDIZAJE, PERIODO, DBA) 
                VALUES ('$estudiante_ID_ESTUDIANTE', '$evaluacion', '$flexibilizacion', '$barra_aprendizaje', '$periodo', '$dba')";

        if ($conn->query($sql) === TRUE) {
            echo "Datos del PIAR guardados exitosamente.";
        } else {
            echo "Error al guardar los datos: " . $conn->error;
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

// Cerrar la conexión
$conn->close();
?>