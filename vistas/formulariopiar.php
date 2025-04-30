<?php
require_once '../freddy/conexion.php';
require_once '../modelos/piar.php';
$conexion = Conexion1::conectar();

// Consulta para obtener estudiantes sin PIAR
$sql = "SELECT ID_ESTUDIANTE, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE
        FROM estudiante
        WHERE ID_ESTUDIANTE NOT IN (SELECT ESTUDIANTE_ID_ESTUDIANTE FROM piar
        )";

try {
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener estudiantes: " . $e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PIAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Formulario PIAR</h1>
        <form action="../controladores/guardar_piar.php" method="POST">
        
        <label for="ESTUDIANTE_ID_ESTUDIANTE">Seleccionar Estudiante:</label>
    <select name="ESTUDIANTE_ID_ESTUDIANTE" id="ESTUDIANTE_ID_ESTUDIANTE" required>
        <option value="">--Selecciona un Estudiante--</option>
        <?php foreach ($estudiantes as $estudiante): ?>
            <option value="<?= $estudiante['ID_ESTUDIANTE']; ?>">
            ID: <?= $estudiante['ID_ESTUDIANTE']; ?> Documento: <?= $estudiante['NUMERO_DOCUMENTO_ESTUDIANTE']; ?> - <?= $estudiante['PRIMER_NOMBRE_ESTUDIANTE']; ?> <?= $estudiante['PRIMER_APELLIDO_ESTUDIANTE']; ?>
            </option>
        <?php endforeach; ?>
    </select>

        <br><br>
        
        
        
        <div class="mb-3">
                <label for="CODIGO_PIAR" class="form-label">Código PIAR:</label>
                <input type="text" class="form-control" id="codigo_piar" name="CODIGO_PIAR" required>
            </div>
            <div class="mb-3">
                <label for="evaluacion" class="form-label">Evaluación:</label>
                <input type="text" class="form-control" id="evaluacion" name="EVALUACION" required>
            </div>
            <div class="mb-3">
                <label for="flexibilizacion" class="form-label">Flexibilización:</label>
                <input type="text" class="form-control" id="flexibilizacion" name="FLEXIBILIZACION" required>
            </div>
            <div class="mb-3">
                <label for="barra_aprendizaje" class="form-label">Barreras de Aprendizaje:</label>
                <input type="text" class="form-control" id="barra_aprendizaje" name="BARRA_DE_APRENDIZAJE" required>
            </div>
            <div class="mb-3">
                <label for="periodo" class="form-label">Periodo:</label>
                <input type="text" class="form-control" id="periodo" name="PERIODO" required>
            </div>
            <div class="mb-3">
                <label for="dba" class="form-label">DBA (Derecho Básico de Aprendizaje):</label>
                <textarea class="form-control" id="dba" name="DBA" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Guardar PIAR</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>