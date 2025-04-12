<?php
require_once 'freddy/conexion.php';
$conexion = Conexion1::conectar();

// Consulta para obtener estudiantes sin caracterización
$sql = "SELECT ID_ESTUDIANTE, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE
        FROM estudiante
        WHERE ID_ESTUDIANTE IN (
            SELECT ESTUDIANTE_ID_ESTUDIANTE FROM caracterizacion
        )";

try {
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener estudiantes: " . $e->getMessage());
}


// Procesar formulario para borrar Estudiante
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
    $ID_ESTUDIANTE = $_POST['ID_ESTUDIANTE'] ?? null;
    $NUMERO_DOCUMENTO_ESTUDIANTE = $_POST['NUMERO_DOCUMENTO_ESTUDIANTE'] ?? null;
    $PRIMER_NOMBRE_ESTUDIANTE = $_POST['PRIMER_NOMBRE_ESTUDIANTE'] ?? null;
    $SEGUNDO_NOMBRE_ESTUDIANTE = $_POST['SEGUNDO_NOMBRE_ESTUDIANTE'] ?? null;
    $PRIMER_APELLIDO_ESTUDIANTE = $_POST['PRIMER_APELLIDO_ESTUDIANTE'] ?? null;
    $SEGUNDO_APELLIDO_ESTUDIANTE = $_POST['SEGUNDO_APELLIDO_ESTUDIANTE'] ?? null;

    if (empty($ESTUDIANTE_ID_ESTUDIANTE) || empty($ID_CARACTERIZACION)) {
        die("Por favor, selecciona un estudiante y su número de documento para borrar.");
    }

    

    try {
        $conexion = Conexion1::conectar();
        // Borrar el estudiante de la base de datos
        

        $conexion->beginTransaction(); //

        // Borrar en la tabla general
        $sqlCaracterizacion = "DELETE FROM caracterizacion WHERE ID_CARACTERIZACION = ?";
            $stmtCaracterizacion = $conexion->prepare($sqlCaracterizacion);
            $stmtCaracterizacion->execute([$ID_CARACTERIZACION]);

        $conexion->commit(); //
        echo "Caracterización borrada exitosamente!";
    } catch (Exception $e) {
        $conexion->rollBack();
        echo "Error al borrar la caracterización: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Caracterización</title>
</head>
<body>
    <h1>Borrar Caracterización</h1>
    <form method="post">
        <label for="ESTUDIANTE_ID_ESTUDIANTE">Selecciona el Estudiante:</label>
        <select name="ESTUDIANTE_ID_ESTUDIANTE" id="ESTUDIANTE_ID_ESTUDIANTE" required>
            <option value="">--Selecciona un Estudiante--</option>
            <?php if (!empty($estudiantes)) : ?>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <option value="<?= $estudiante['ID_ESTUDIANTE']; ?>">
                        ID: <?= $estudiante['ID_ESTUDIANTE']; ?> - <?= $estudiante['PRIMER_NOMBRE_ESTUDIANTE']; ?> <?= $estudiante['SEGUNDO_NOMBRE_ESTUDIANTE']; ?> <?= $estudiante['PRIMER_APELLIDO_ESTUDIANTE']; ?> <?= $estudiante['SEGUNDO_APELLIDO_ESTUDIANTE']; ?>
                    </option>
                <?php endforeach; ?>
            <?php else : ?>
                <option value="">No hay Estudiantes disponibles</option>
            <?php endif; ?>
        </select>
        <br><br>

        <label for="CODIGO_CARACTERIZACION">Código de Caracterización:</label>
        <input type="text" name="CODIGO_CARACTERIZACION" id="CODIGO_CARACTERIZACION" required>

        <button type="submit">Borrar Estudiante</button>
    </form>
</body>
</html>