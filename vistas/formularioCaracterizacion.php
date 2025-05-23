<?php
require_once '../freddy/conexion.php';
require_once '../modelos/caracterizacion.php';
$conexion = Conexion1::conectar();

// Consulta para obtener estudiantes sin caracterización
$sql = "SELECT ID_ESTUDIANTE, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE
        FROM estudiante
        WHERE ID_ESTUDIANTE NOT IN (
            SELECT ESTUDIANTE_ID_ESTUDIANTE FROM caracterizacion
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
    <title>Formulario de Caracterización</title>
    <link rel="stylesheet" href="formularios.css">
    <link rel="icon" type="image/svg+xml" href="IMAGENES/iconsitea.svg">
</head>
<body>
  <h2>Formulario de Caracterización</h2>
  <div class="contenedor">
    <form id="caracterizacionForm" action="procesarcaracterizaciones.php" method="POST"> 

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
      
        
     <label for="CODIGO_CARACTERIZACION">Código Caracterización</label>
      <input type="text" id="CODIGO_CARACTERIZACION" name="CODIGO_CARACTERIZACION" required placeholder="Ingresa el código">

      <label for="VALORACION_PEDAGOGICA">Valoración Pedagógica</label>
      <input type="text" id="VALORACION_PEDAGOGICA" name="VALORACION_PEDAGOGICA" required placeholder="Ingresa la valoración">

      <label for="DIAGNOSTICO">Diagnóstico</label>
      <input type="text" id="DIAGNOSTICO" name="DIAGNOSTICO" required placeholder="Escribe el diagnóstico">

      <label for="CORRESPONSABILIDAD">Corresponsabilidad</label>
      <input type="text" id="CORRESPONSABILIDAD" name="CORRESPONSABILIDAD" required placeholder="Describe la Corresponsabilidad">

      <label for="CONTEXTO_ACADEMICO">Contexto Académico</label>
      <input type="text" id="CONTEXTO_ACADEMICO" name="CONTEXTO_ACADEMICO" required placeholder="Detalla el contexto académico">

      <label for="RECOMENDACIONES">Recomendaciones</label>
      <input type="text" id="RECOMENDACIONES" name="RECOMENDACIONES" required placeholder="Proporciona RECOMENDACIONES">

      <label for="CONTEXTO_FAMILIAR">Contexto Familiar</label>
      <input type="text" id="CONTEXTO_FAMILIAR" name="CONTEXTO_FAMILIAR" required placeholder="Explora el contexto familiar">

      <label for="CONTEXTO_ESCOLAR">Contexto Escolar</label>
      <input type="text" id="CONTEXTO_ESCOLAR" name="CONTEXTO_ESCOLAR" required placeholder="Escribe sobre el contexto escolar">

      <label for="BARRA_DE_APRENDIZAJE">Barreras de Aprendizaje</label>
      <input type="text" id="BARRA_DE_APRENDIZAJE" name="BARRA_DE_APRENDIZAJE" required placeholder="Describe las barreras de aprendizaje">

      <button type="submit">Enviar</button>
    </form>
  </div>
  <script src=></script>
</body>
</html>