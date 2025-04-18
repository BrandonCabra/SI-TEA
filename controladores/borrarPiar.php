<?php
require_once 'conexion.php';
$conexion = Conexion1::conectar();

// Obtener la lista de Estudiante
try {
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener estudiantes: " . $e->getMessage());
}

// Procesar formulario para borrar PIAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos enviados desde el formulario
    $evaluacion = isset($_POST['EVALUACION']) ? $conn->real_escape_string($_POST['EVALUACION']) : '';
    $flexibilizacion = isset($_POST['FLEXIBILIZACION']) ? $conn->real_escape_string($_POST['FLEXIBILIZACION']) : '';
    $barra_aprendizaje = isset($_POST['BARRA_DE_APRENDIZAJE']) ? $conn->real_escape_string($_POST['BARRA_DE_APRENDIZAJE']) : '';
    $periodo = isset($_POST['PERIODO']) ? $conn->real_escape_string($_POST['PERIODO']) : '';
    $dba = isset($_POST['DBA']) ? $conn->real_escape_string($_POST['DBA']) : '';
    $estudiante_ID_ESTUDIANTE = isset($_POST['estudiante_ID_ESTUDIANTE']) ? $conn->real_escape_string($_POST['estudiante_ID_ESTUDIANTE']) : '';


    try {
        $conexion = Conexion1::conectar();
        // Borrar el piar de la base de datos
        

        $conexion->beginTransaction(); //

        // Borrar en la tabla general
        $sqlGeneral = "DELETE FROM piar WHERE ID_PIAR = ?";
        $stmtGeneral = $conexion->prepare($sqlGeneral);
        $stmtGeneral->execute([$ID_PIAR]);

        $conexion->commit(); //
        echo "PIAR borrado exitosamente!";
    } catch (Exception $e) {
        $conexion->rollBack();
        echo "Error al borrar el PIAR: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Estudiante</title>
</head>
<body>
    <h1>Borrar Estudiante</h1>
    <form method="post">
        <label for="ID_ESTUDIANTE">Selecciona el Estudiante:</label>
        <select name="estudiante_ID_ESTUDIANTE" id="ID_ESTUDIANTE" required>
            <option value="">--Selecciona un Estudiante--</option>
            <?php if (!empty($estudiantes)) : ?>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <option value="<?= $estudiante['estudiante_ID_ESTUDIANTE']; ?>">
                        ID: <?= $estudiante['estudiante_ID_ESTUDIANTE']; ?> - <?= $estudiante['PRIMER_NOMBRE_ESTUDIANTE']; ?> <?= $estudiante['SEGUNDO_NOMBRE_ESTUDIANTE']; ?> <?= $estudiante['PRIMER_APELLIDO_ESTUDIANTE']; ?> <?= $estudiante['SEGUNDO_APELLIDO_ESTUDIANTE']; ?>
                    </option>
                <?php endforeach; ?>
            <?php else : ?>
                <option value="">No hay Estudiantes disponibles</option>
            <?php endif; ?>
        </select>
        <br><br>

        <label for="NUMERO_DOCUMENTO_ESTUDIANTE">Número de Documento:</label>
        <input type="text" name="NUMERO_DOCUMENTO_ESTUDIANTE" id="NUMERO_DOCUMENTO_ESTUDIANTE" required>

        <button type="submit">Borrar Estudiante</button>
    </form>
</body>
</html>