<?php

include 'freddy/conexion.php';
// Crear instancia de la conexión utilizando la clase Conexion1
$conexion =Conexion1::conectar();
// Consulta para obtener los detalles de `estudiante`
$sqlEstudiante = "SELECT ID_ESTUDIANTE, NUMERO_DOCUMENTO_ESTUDIANTE, PRIMER_NOMBRE_ESTUDIANTE, PRIMER_APELLIDO_ESTUDIANTE FROM estudiante";

// GENERAR REPORTE

echo "<h1>Reporte de estudiantes</h1>";
// Función para generar tablas
function generarTablaEstudiante($conexion, $sql, $titulo) {
    echo "<h2>$titulo</h2>";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultados)) {
            echo "<table border='1'>
                    <tr>
                        <th>Identificación Estudiante</th>
                        <th>Numero Documento</th>
                        <th>Primer Nombre</th>
                        <th>Primer Apellido</th>
                    </tr>";
            foreach ($resultados as $row) {
                echo "<tr>
                        <td>{$row['ID_ESTUDIANTE']}</td>
                        <td>{$row['NUMERO_DOCUMENTO_ESTUDIANTE']}</td>
                        <td>{$row['PRIMER_NOMBRE_ESTUDIANTE']}</td>
                        <td>{$row['PRIMER_APELLIDO_ESTUDIANTE']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay datos disponibles.</p>";
        }
}

generarTablaEstudiante($conexion, $sqlEstudiante, "Reporte de Estudiantes"); 






?>
