<?php
require_once 'freddy/conexion.php';
require_once 'modelos/estudiante.php';

//Obtener la lista de estudiantes
try {
    $conexion = Conexion1::conectar();
    $sql = "SELECT ID_ESTUDIANTE, TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, SEGUNDO_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE, SEGUNDO_APELLIDO_ESTUDIANTE, FECHA_NACIMIENTO, DIRECCION_ESTUDIANTE, TELEFONO_ESTUDIANTE, CORREO_INSTITUCIONAL_ESTUDIANTE, FOTOGRAFIA_ESTUDIANTE, numero_documento_padre  FROM estudiante"; // Consulta para obtener estudiantes
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error al obtener los estudiantes: " . $e->getMessage();
}

// Procesar el formulario enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_ESTUDIANTE = $_POST['ID_ESTUDIANTE'] ?? null;
    $NUMERO_DOCUMENTO_ESTUDIANTE = $_POST['NUMERO_DOCUMENTO_ESTUDIANTE'] ?? null;
    $PRIMER_NOMBRE_ESTUDIANTE = $_POST['PRIMER_NOMBRE_ESTUDIANTE'] ?? null;
    $SEGUNDO_NOMBRE_ESTUDIANTE = $_POST['SEGUNDO_NOMBRE_ESTUDIANTE'] ?? null;
    $PRIMER_APELLIDO_ESTUDIANTE = $_POST['PRIMER_APELLIDO_ESTUDIANTE'] ?? null;
    $SEGUNDO_APELLIDO_ESTUDIANTE = $_POST['SEGUNDO_APELLIDO_ESTUDIANTE'] ?? null;
    $FECHA_NACIMIENTO = $_POST['FECHA_NACIMIENTO'] ?? null;
    $TELEFONO_ESTUDIANTE = $_POST['TELEFONO_ESTUDIANTE'] ?? null;
    $DIRECCION_ESTUDIANTE = $_POST['DIRECCION_ESTUDIANTE'] ?? null;
    $CORREO_INSTITUCIONAL_ESTUDIANTE = $_POST['CORREO_INSTITUCIONAL_ESTUDIANTE'] ?? null;
    $FOTOGRAFIA_ESTUDIANTE = $_POST['FOTOGRAFIA_ESTUDIANTE']?? null;
    $numero_documento_padre = $_POST['numero_documento_padre'] ?? null;
    $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO = $_POST['TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO'] ?? null;

    
    // validar los datos del estudiante
    if (empty($NUMERO_DOCUMENTO_ESTUDIANTE) || empty($PRIMER_NOMBRE_ESTUDIANTE) || empty($PRIMER_APELLIDO_ESTUDIANTE)) {
        die("Todos los campos son obligatorios.");
    }
    
    try {
        $conexion = Conexion1::conectar();
        //instanciar la clase estudiante
    // Crear una instancia de la clase Estudiante
    $estudiante = EstudianteFactory::crearEstudiante($ID_ESTUDIANTE, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE, $numero_documento_padre);

    // Llamar al método para actualizar el Estudiante
    $estudiante->actualizarEstudiante($conexion, $ID_ESTUDIANTE);
    echo "Estudiante actualizado exitosamente!";
    } catch (Exception $e) {
        echo "Error al actualizar el estudiante: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Estudiante</title>
    <link rel="icon" type="image/svg+xml" href="IMAGENES/iconsitea.svg">
    <link rel="stylesheet" href="formularios.css">
</head>
<body>
    <h1>Actualizar Estudiante</h1>
    
        <label for="ID_ESTUDIANTE">Selecciona el Estudiante:</label>
        <select name="ID_ESTUDIANTE" id="ID_ESTUDIANTE" required>
            <option value="">--Selecciona un Estudiante--</option>
            <?php foreach ($estudiantes as $estudiante): ?>
                <option value="<?= $estudiante['ID_ESTUDIANTE']; ?>">
                    Documento: <?= $estudiante['NUMERO_DOCUMENTO_ESTUDIANTE']; ?> <?= $estudiante['PRIMER_NOMBRE_ESTUDIANTE']; ?> <?= $estudiante['PRIMER_APELLIDO_ESTUDIANTE']?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <div class="photo-section">
      <label for="foto">Foto del Estudiante</label>
      <input type="file" id="foto" name="FOTOGRAFIA_ESTUDIANTE" accept="image/*" required>
    </div>
  <div class="contenedor">
  <br>
  <form method="post" enctype="multipart/form-data">
        <label for="TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO">Tipo de Documento Estudiante:</label>
        <select name="TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO" id="TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO">
        <option selected disabled>Seleccione...</option>
            <option value="4">TARJETA DE IDENTIDAD</option>
            <option value="5">REGISTRO CIVIL</option>
            <option value="1">CEDULA</option>
            <option value="3">PASAPORTE</option>
            <option value="2">CEDULA DE EXTRANJERÍA</option>
            <option value="6">NO PRESENTA</option>
        </select>
        <br><br>

        <label for="documento">Número de Documento Estudiante</label>
        <input type="text" id="documento" name="NUMERO_DOCUMENTO_ESTUDIANTE" required>
        <br><br>
        <label for="primer_nombre">Primer Nombre</label>
      <input type="text" id="primer_nombre" name="PRIMER_NOMBRE_ESTUDIANTE" required>
      <br><br>
      <label for="segundo_nombre">Segundo Nombre</label>
      <input type="text" id="segundo_nombre" name="SEGUNDO_NOMBRE_ESTUDIANTE">
      <br><br>
      <label for="primer_apellido">Primer Apellido</label>
      <input type="text" id="primer_apellido" name="PRIMER_APELLIDO_ESTUDIANTE" required>
      <br><br>
      <label for="segundo_apellido">Segundo Apellido</label>
      <input type="text" id="segundo_apellido" name="SEGUNDO_APELLIDO_ESTUDIANTE">
      <br><br>
      <label for="fecha_nacimiento">Fecha de Nacimiento</label>
      <input type="date" id="fecha_nacimiento" name="FECHA_NACIMIENTO" required>
      <br><br>
        <label for="TELEFONO_ESTUDIANTE">Nuevo Telefono:</label>
        <input type="text" name="TELEFONO_ESTUDIANTE" id="TELEFONO_ESTUDIANTE" required>
        <br><br>

        <label for="DIRECCION_ESTUDIANTE">Nueva Direccion del estudiante:</label>
        <input type="text" name="DIRECCION_ESTUDIANTE" id="DIRECCION_ESTUDIANTE" required>
        <br><br>

        <label for="correo_institucional">Correo Institucional</label>
      <input type="email" id="correo_institucional" name="CORREO_INSTITUCIONAL_ESTUDIANTE" required>
        <br><br>

        <label for="numero_documento_padre">Actualizar documento acudiente o padre:</label>
        <input type="number" name="numero_documento_padre" id="numero_documento_padre" required>
        <br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

