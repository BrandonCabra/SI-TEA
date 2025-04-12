<?php
include 'conexion.php';

// Crear instancia de la conexión utilizando la clase Conexion1
try {
    $conexion = Conexion1::conectar();
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Consulta para obtener los detalles de `piar`
$sqlPiar = "SELECT estudiante_ID_ESTUDIANTE, EVALUACION, FLEXIBILIZACION, BARRA_DE_APRENDIZAJE, PERIODO, DBA 
            FROM piar";

// Generar el reporte
echo "<h1>Reporte de PIAR</h1>";

// Función para generar tablas
function generarTablaPiar($conexion, $sql) {
    try {
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultados)) {
            echo "<table border='1'>
                    <tr>
                        <th>Identificación Estudiante</th>
                        <th>Evaluación</th>
                        <th>Flexibilización</th>
                        <th>Barra de Aprendizaje</th>
                        <th>Periodo</th>
                        <th>DBA</th>
                    </tr>";
            foreach ($resultados as $row) {
                echo "<tr>
                        <td>{$row['estudiante_ID_ESTUDIANTE']}</td>
                        <td>{$row['EVALUACION']}</td>
                        <td>{$row['FLEXIBILIZACION']}</td>
                        <td>{$row['BARRA_DE_APRENDIZAJE']}</td>
                        <td>{$row['PERIODO']}</td>
                        <td>{$row['DBA']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay datos disponibles.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error al generar la tabla: " . $e->getMessage() . "</p>";
    }
}

// Llamar a la función para mostrar el reporte
generarTablaPiar($conexion, $sqlPiar);
?>
