<?php
include 'conexion.php';

// Crear instancia de la conexión utilizando la clase Conexion1
try {
    $conexion = Conexion1::conectar();
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Validar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos enviados
    $idEstudiante = $_POST['estudiante_ID_ESTUDIANTE'];
    $evaluacion = $_POST['EVALUACION'];
    $flexibilizacion = $_POST['FLEXIBILIZACION'];
    $barraAprendizaje = $_POST['BARRA_DE_APRENDIZAJE'];
    $periodo = $_POST['PERIODO'];
    $dba = $_POST['DBA'];

    // Consulta SQL para actualizar los datos
    $sqlUpdate = "UPDATE piar 
                  SET EVALUACION = :evaluacion, 
                      FLEXIBILIZACION = :flexibilizacion, 
                      BARRA_DE_APRENDIZAJE = :barraAprendizaje, 
                      PERIODO = :periodo, 
                      DBA = :dba 
                  WHERE estudiante_ID_ESTUDIANTE = :idEstudiante";

    try {
        $stmt = $conexion->prepare($sqlUpdate);
        $stmt->bindParam(':evaluacion', $evaluacion);
        $stmt->bindParam(':flexibilizacion', $flexibilizacion);
        $stmt->bindParam(':barraAprendizaje', $barraAprendizaje);
        $stmt->bindParam(':periodo', $periodo);
        $stmt->bindParam(':dba', $dba);
        $stmt->bindParam(':idEstudiante', $idEstudiante);

        if ($stmt->execute()) {
            echo "<p>Actualización exitosa para el estudiante con ID: $idEstudiante</p>";
        } else {
            echo "<p>Error al actualizar los datos.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error al ejecutar la consulta: " . $e->getMessage() . "</p>";
    }
}

// Consulta para mostrar los datos en un formulario
$sqlPiar = "SELECT estudiante_ID_ESTUDIANTE, EVALUACION, FLEXIBILIZACION, BARRA_DE_APRENDIZAJE, PERIODO, DBA FROM piar";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar PIAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Actualizar PIAR</h1>
        
        <!-- Formulario -->
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="estudiante_ID_ESTUDIANTE" class="form-label">Seleccionar Estudiante:</label>
                <select name="estudiante_ID_ESTUDIANTE" id="estudiante_ID_ESTUDIANTE" class="form-select" required>
                    <option value="">--Selecciona un Registro--</option>
                    <?php
                    // Obtener los registros para llenar el select
                    try {
                        $stmt = $conexion->prepare($sqlPiar);
                        $stmt->execute();
                        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($resultados as $row) {
                            echo "<option value='{$row['estudiante_ID_ESTUDIANTE']}'>ID: {$row['estudiante_ID_ESTUDIANTE']}</option>";
                        }
                    } catch (PDOException $e) {
                        echo "<p class='text-danger'>Error al obtener datos: " . $e->getMessage() . "</p>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="EVALUACION" class="form-label">Nueva Evaluación:</label>
                <input type="text" name="EVALUACION" id="EVALUACION" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="FLEXIBILIZACION" class="form-label">Nueva Flexibilización:</label>
                <input type="text" name="FLEXIBILIZACION" id="FLEXIBILIZACION" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="BARRA_DE_APRENDIZAJE" class="form-label">Nueva Barra de Aprendizaje:</label>
                <input type="text" name="BARRA_DE_APRENDIZAJE" id="BARRA_DE_APRENDIZAJE" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="PERIODO" class="form-label">Nuevo Periodo:</label>
                <input type="text" name="PERIODO" id="PERIODO" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="DBA" class="form-label">Nuevo DBA:</label>
                <textarea name="DBA" id="DBA" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>