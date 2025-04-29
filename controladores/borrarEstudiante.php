<?php
require_once '../freddy/conexion.php';

// Obtener la lista de estudiantes
try {
    $conexion = Conexion1::conectar();
    $sql = "SELECT ID_ESTUDIANTE, TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, SEGUNDO_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE, SEGUNDO_APELLIDO_ESTUDIANTE, FECHA_NACIMIENTO, DIRECCION_ESTUDIANTE, TELEFONO_ESTUDIANTE, CORREO_INSTITUCIONAL_ESTUDIANTE, FOTOGRAFIA_ESTUDIANTE, numero_documento_padre  FROM estudiante"; // Consulta para obtener estudiantes
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error al obtener los estudiantes: " . $e->getMessage();
}

// Procesar formulario para borrar Estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_ESTUDIANTE = $_POST['ID_ESTUDIANTE'] ?? null;
    $NUMERO_DOCUMENTO_ESTUDIANTE = $_POST['NUMERO_DOCUMENTO_ESTUDIANTE'] ?? null;
    $PRIMER_NOMBRE_ESTUDIANTE = $_POST['PRIMER_NOMBRE_ESTUDIANTE'] ?? null;
    $SEGUNDO_NOMBRE_ESTUDIANTE = $_POST['SEGUNDO_NOMBRE_ESTUDIANTE'] ?? null;
    $PRIMER_APELLIDO_ESTUDIANTE = $_POST['PRIMER_APELLIDO_ESTUDIANTE'] ?? null;
    $SEGUNDO_APELLIDO_ESTUDIANTE = $_POST['SEGUNDO_APELLIDO_ESTUDIANTE'] ?? null;

    if (empty($ID_ESTUDIANTE) || empty($NUMERO_DOCUMENTO_ESTUDIANTE)) {
        die("Por favor, selecciona un estudiante y su número de documento para borrar.");
    }

    try {
        $conexion = Conexion1::conectar();
        // Borrar el estudiante de la base de datos
        

        $conexion->beginTransaction(); //

        // Borrar en la tabla general
        $sqlGeneral = "DELETE FROM estudiante WHERE ID_ESTUDIANTE = ?";
        $stmtGeneral = $conexion->prepare($sqlGeneral);
        $stmtGeneral->execute([$ID_ESTUDIANTE]);

        $conexion->commit(); //
        echo "¡Estudiante borrado exitosamente!";
    } catch (Exception $e) {
        $conexion->rollBack();
        echo "Error al borrar el estudiante: " . $e->getMessage();
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
        <select name="ID_ESTUDIANTE" id="ID_ESTUDIANTE" required>
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

        <label for="NUMERO_DOCUMENTO_ESTUDIANTE">Número de Documento:</label>
        <input type="text" name="NUMERO_DOCUMENTO_ESTUDIANTE" id="NUMERO_DOCUMENTO_ESTUDIANTE" required>

        <button type="submit">Borrar Estudiante</button>
    </form>
</body>
</html>