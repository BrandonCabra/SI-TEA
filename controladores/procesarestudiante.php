<?php
require_once 'freddy/conexion.php';
require_once 'estudiante.php';


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
    
    
    $estudiante = EstudianteFactory::crearEstudiante($ID_ESTUDIANTE, $TIPO_DOCUMENTO_ID_TIPO_DOCUMENTO, $NUMERO_DOCUMENTO_ESTUDIANTE, $PRIMER_NOMBRE_ESTUDIANTE, $SEGUNDO_NOMBRE_ESTUDIANTE, $PRIMER_APELLIDO_ESTUDIANTE, $SEGUNDO_APELLIDO_ESTUDIANTE, $FECHA_NACIMIENTO, $DIRECCION_ESTUDIANTE, $TELEFONO_ESTUDIANTE, $CORREO_INSTITUCIONAL_ESTUDIANTE, $FOTOGRAFIA_ESTUDIANTE, $numero_documento_padre); //
    // Validar los datos del estudiante
    

    if (empty($NUMERO_DOCUMENTO_ESTUDIANTE) || empty($PRIMER_NOMBRE_ESTUDIANTE) || empty($PRIMER_APELLIDO_ESTUDIANTE)) { 
        echo "Los campos obligatorios no pueden estar vacíos.";
        exit; 
    }

// Guardar el estudiante en la base de datos

    $conexion = Conexion1::conectar(); // 
    $resultado = $estudiante->guardarEstudiante($conexion); 
    if ($resultado) { 
        echo "Estudiante guardado exitosamente."; 
    } else {
        echo "Error al guardar el estudiante."; 
    } 
 }
 

?>
